<?php

namespace App\Http\Controllers;

use App\Repositories\TodoRepository;
use App\Todo;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

class TodoController extends Controller
{
    /**
     * The todo repository instance
     *
     * @var TodoRepository
     */
    protected $todos;

    /**
     * TodoController constructor.
     *
     * @param TodoRepository $todos
     */
    public function __construct(TodoRepository $todos)
    {
        $this->middleware('auth');

        $this->todos = $todos;
    }

    /**
     * Display a list of all of the user's todos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        return view('todo.index', [
            'todos' => $this->todos->forUser($request->user(), false),
            'todosDone' => $this->todos->forUser($request->user(), true),
        ]);
    }

    /**
     * Display form to add new todo
     *
     * @param Request $request
     * @return Response
     */
    public function add(Request $request)
    {
        return view('todo.add');
    }

    /**
     * Save new todos in database
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|min:3',
        ]);

        $request->user()->todos()->create([
            'name' => $request->name,
        ]);

        $request->session()->flash("success", "Het item ".$request->name." is succesvol toegevoegd.");
        return redirect('/todo');
    }

    /**
     * Destroy the given todo
     *
     * @param Request $request
     * @param Todo $todo
     * @return Response
     * @throws \Exception
     */
    public function destroy(Request $request, Todo $todo)
    {
        try
        {
            $this->authorize('destroy', $todo);
            $todo->delete();

            return redirect('/todo');
        }
        catch(Exception $exep)
        {
            return redirect('/todo/error');
        }
    }

    public function toggle(Request $request, Todo $todo)
    {
        $this->authorize('toggle', $todo);

        $todo->toggle();

        if($todo->done)
        {
            $messageRow = "done";
        }
        else
        {
            $messageRow = "to-do";
        }

        $request->session()->flash("success", "Het item ".$todo->name." is succesvol verplaatst naar je ".$messageRow." lijst.");
        return redirect('/todo');
    }
}
