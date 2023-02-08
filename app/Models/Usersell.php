<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usersell extends Model
{
    use HasFactory;

    protected $primaryKey = 'user_id';

    /*public function users()
    {
        return $this->belongsToMany('App\Models\User');
    }

    public function questions()
    {
        return $this->belongsToMany('App\Models\Question');
    }*/
}
