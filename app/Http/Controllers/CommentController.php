<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Usersell;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function create_comment(Request $req,$id){
        /*سوالاتی که با این ایدی هست میده بعد از بین اونا کاربری که ایدیش با اونی که وارد شده میدهد*/
        $sell = Usersell::where('question_id',$id)->where('user_id',auth()->user()->id)->get();
        /*اگر همچین موردی باشه پس ینی سوال را خریده است*/
        if (count($sell) > 0){
            $comm = new Comment();
            $comm->name = $req->name;
            $comm->comment = $req->comment;
            $comm->question_id = $id;

            $comm->save();

            return redirect('/question/'.$id)->with('success','نظر شما با موفقیت ثبت شد');
        }else{
            return redirect('/question/'.$id)->with('success','شما نمیتوانید نظر بدهید چون سوال را خریداری نکردید!!');
        }
    }
}
