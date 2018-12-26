<?php

namespace App\Models;

use App\Models\TodoList;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $fillable = [
        'name','phone' ,'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function todoList()
    {
        return $this->hasMany(TodoList::class);
    }
}
