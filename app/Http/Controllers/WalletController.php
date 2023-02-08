<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Usersell;
use App\Models\Wallet;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    public function index_buy(){
        return view('bank');
    }

    public function deposit(Request $req){
        $wal = Wallet::find(auth()->user()->id);

        $wal->amount = $wal->amount + $req->amount;
        $wal->save();

        return redirect(route('panel_buy'))->with('success','مبلغ به کیف پول واریز شد');
    }
    public function make_buy($id){
        $quiz = Question::findOrFail($id);
        $wal_buy = Wallet::find(auth()->user()->id);
        $wal_sell = Wallet::find($quiz->user_id);
        $usersell = new Usersell();
        /*چک میکنیم که قبلا سوال را نخریده باشد*/
        if (Usersell::where('user_id',auth()->user()->id) != null){
            $sells = Usersell::where('user_id',auth()->user()->id)->get();

            foreach ($sells as $sell){
                if ($sell->question_id == $quiz->id){
                    return redirect('/buy/'.$quiz->id)->with('success','سوال قبلا خریداری شده برای دانلود فایل سوال به پنل خود بروید!!');
                }
            }
        }
        /*اگر سوال را نخریده و موجودی کیف پول بیشتر یا مساوی قیمت سوال باشد خرید را انجام میدهد*/
        if ($wal_buy->amount >= $quiz->price){
            $wal_sell->amount = $wal_sell->amount + ($quiz->price*0.9);
            $wal_buy->amount = $wal_buy->amount - $quiz->price;

            $usersell->user_id = auth()->user()->id;
            $usersell->question_id = $quiz->id;

            $wal_buy->save();
            $wal_sell->save();
            $usersell->save();

            return redirect('panel_buy')->with('success','سوال با موفقیت خریداری شد برای دانلود فایل وارد پنل خود شوید!!');
        }
        else{
            return redirect('bank')->with('success','حساب خود را شارژ کنید');
        }
    }

    public function index_sell(){
        return view('bank_info',[
            'amount' => Wallet::find(auth()->user()->id),
        ]);
    }

    public function withdraw(Request $req){
        $wal = Wallet::find(auth()->user()->id);

        if ($req->amount > $wal->amount){
            return redirect(route('bank_info'))->with('success','موجودی شما کمتر از مبلغ وارد شده است!!');
        }

        if ($req->amount < 50000){
            return redirect(route('bank_info'))->with('success','مبلغ وارد شده کمتر از 50000 مباشد');
        }

        if ($wal->amount >= 50000){
            $wal->amount = $wal->amount - $req->amount;

            $wal->save();

            return redirect(route('panel_sell'))->with('success','مبلغ به حساب '. $req->card. ' واریز شد');
        }
    }
}
