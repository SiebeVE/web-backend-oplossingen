<?php
/**
 * Created by PhpStorm.
 * User: Siebe
 * Date: 26/01/2016
 * Time: 17:42
 */

namespace App\Repositories;


use App\Todo;
use App\User;

class TodoRepository
{
    /**
     * Get all of the todos for a given user
     *
     * @param User $user
     * @param bool $done
     * @return Collection
     */
    public function forUser(User $user, $done)
    {
        return Todo::where('user_id', $user->id)
          ->where('done', $done)
          ->orderBy('created_at', 'asc')
          ->get();
    }
}