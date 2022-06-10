<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    use HasFactory;

    public function userrole()
    {
        return $this->hasMany(User::class);
    }
    public function user_type()
    {
        return $this->hasMany(User_type::class);
    }
}