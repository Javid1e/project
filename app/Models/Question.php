<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = ['title' , 'grade' , 'base' , 'discipline' , 'level' , 'turn' , 'price' , 'description' , 'file1_path' , 'file2_path'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /*public function usersells()
    {
        return $this->belongsToMany('App\Models\Usersell');
    }*/
}
