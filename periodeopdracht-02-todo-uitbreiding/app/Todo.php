<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Todo extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable
     *
     * @var array
     */
    protected $fillable = ['name', 'done'];

    /**
     * The attributes that should be mutated to dates
     *
     * @var array
     */
    protected $dates = ["deleted_at"];

    /**
     * Get the user that owns the task.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function toggle()
    {
        $this->update(['done' => !($this->done)]);
    }
}
