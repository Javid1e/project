<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function nav_search($value,$key){
        $quiz = Question::where($value,$key)->get();
        $user = 0;

        if (auth()->user()){
            $user = User::findOrFail(auth()->user()->id);
        }
        return view('search',[
            'quiz' => $quiz,
            'user' => $user,
        ]);
    }

    public function input_search(Request $req){
        return redirect('/title/'.$req->search);
    }


}
