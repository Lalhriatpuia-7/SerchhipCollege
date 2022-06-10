<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_type extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function User_type()
    {
        return $this->belongsTo(Category::class);
    }
    public function User()
    {
        return $this->hasMany(User::class);
    }
    public function userrole()
    {
        return $this->belongsTo(UserRole::class);
    }
}