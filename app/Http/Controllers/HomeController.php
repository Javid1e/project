<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $wal = new Wallet();
        if(!(Wallet::find(auth()->user()->id))){

            $wal->user_id = auth()->user()->id;
            $wal->amount = 0;

            $wal->save();
        }
        return view('home');
    }
}
