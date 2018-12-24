<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TodoList extends Model
{
    protected $fillable = ['title', 'description', 'user_id'];
    protected $hidden = ['tasks',];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
