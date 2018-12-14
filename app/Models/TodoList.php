<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class TodoList extends Model
{
    protected $fillable = ['title', 'description', 'used_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
