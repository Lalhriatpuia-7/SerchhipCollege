<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Facades\Voyager;

class Role extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function role()
    {

        return $this->hasMany(User::class);
    }
    public function permissions()
    {
        return $this->belongsToMany(Voyager::modelClass('Permission'));
    }
}