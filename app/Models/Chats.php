<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chats extends Model
{
    use HasFactory;

    public function sentMessages()
    {
        return $this->hasMany(Messages::class, 'id');

    }
    public function participants()
    {
        return $this->hasMany(User::class);

    }
}
