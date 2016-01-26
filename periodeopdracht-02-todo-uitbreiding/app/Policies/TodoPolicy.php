<?php

namespace App\Policies;

use App\Todo;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TodoPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the given user is authorized to delete todos
     *
     * @param User $user
     * @param Todo_ $todo
     * @return bool
     */
    public function destroy(User $user, Todo $todo)
    {
        return $user->id === $todo->user_id;
    }

    /**
     * Determine if given user is authorized to change done status of todos
     *
     * @param User $user
     * @param Todo_ $todo
     * @return bool
     */
    public function toggle(User $user, Todo $todo)
    {
        return $user->id === $todo->user_id;
    }
}
