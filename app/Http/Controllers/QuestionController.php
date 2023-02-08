<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Question;
use App\Models\User;
use App\Models\Usersell;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class QuestionController extends Controller
{
    public function index(){
        $quiz = Question::all();
        return view('welcome',[
            'quiz' => $quiz
        ]);
    }

    public function show_private($id){
        $quiz = Question::findOrFail($id);

        return view('questions.showquiz', ["quiz" => $quiz]);
    }

    public function show_public($id){
        $quiz = Question::findOrFail($id);
        $user = 0;
        $comments = Comment::where('question_id',$id)->get();

        if (auth()->user()){
            $user = User::findOrFail(auth()->user()->id);
        }

        return view('show', [
            "quiz" => $quiz,
            'user' => $user,
            'comments' => $comments
        ]);
    }

    public function confirm_buy($id){
        $quiz = Question::findOrFail($id);
        $wal_buy = Wallet::find(auth()->user()->id);

        return view('buy',[
            'amount_buy' => $wal_buy->amount,
            'quiz' => $quiz
        ]);
    }

    public function show_panel_buy(){
        /*گرفتن لیست سوالات خریداری شده*/
        $quizs = [];
        if (Usersell::where('user_id',auth()->user()->id) != null){
            $quiz = Usersell::where('user_id',auth()->user()->id)->get();
            for ($i = 0;$i < count($quiz);$i++){
                $quizs[$i] = Question::find($quiz[$i]->question_id);
            }
        }

        return view('panel_buy',[
            'amount' => Wallet::find(auth()->user()->id),
            'quizs' => $quizs
        ]);
    }

    public function show_panel_sell(){
        $quizs = User::find(auth()->user()->id)->questions()->get();

        return view('panel_sell',[
            'quizs' => $quizs
        ]);
    }

    public function create_quiz(){
        return view('questions.createquiz');
    }

    public function store_quiz(Request $req){
        Validator::make($req->all(), [
            'title' => 'required|max:255',
            'price' => 'digits_between:4,9|',
            'file1' => 'required|mimes:zip,rar,pdf,docx,pptx',
            'file2' => 'image'
        ])->validate();

        $quiz = new Question();

        if($req->file()) {
            $fileName1 = time().'_'.$req->file1->getClientOriginalName();
            $filePath1 = $req->file('file1')->storeAs('uploads', $fileName1, 'public');
            $quiz->file1_path = '/storage/' . $filePath1;

            $fileName2 = time().'_'.$req->file2->getClientOriginalName();
            $filePath2 = $req->file('file2')->storeAs('uploads', $fileName2, 'public');
            $quiz->file2_path = '/storage/' . $filePath2;

            $quiz->user_id = auth()->user()->id;
            $quiz->title = request('title');
            $quiz->grade = request('grade');
            $quiz->base = request('base');
            $quiz->discipline = request('discipline');
            $quiz->level = request('level');
            $quiz->turn = request('turn');
            $quiz->price = request('price');
            $quiz->description = request('description');

            $quiz->save();

            return redirect(route('panel_sell'))->with('success','سوال با موفقیت افزوده شد!!');
        }
    }

    public function edit_quiz($id){
        $quiz = Question::findOrFail($id);

        return view('questions.editquiz', ["quiz" => $quiz]);
    }

    public function update_quiz(Request $req, $id){
        $quiz = Question::findOrFail($id);

        if($req->file()) {
            $fileName1 = time().'_'.$req->file1->getClientOriginalName();
            $filePath1 = $req->file('file1')->storeAs('uploads', $fileName1, 'public');
            $quiz->file1_path = '/storage/' . $filePath1;

            $fileName2 = time().'_'.$req->file2->getClientOriginalName();
            $filePath2 = $req->file('file2')->storeAs('uploads', $fileName2, 'public');
            $quiz->file2_path = '/storage/' . $filePath2;

            $quiz->title = request('title');
            $quiz->grade = request('grade');
            $quiz->base = request('base');
            $quiz->discipline = request('discipline');
            $quiz->level = request('level');
            $quiz->turn = request('turn');
            $quiz->price = request('price');
            $quiz->description = request('description');

            $quiz->save();

            return redirect(route('panel_sell'))->with('success','ویرایش اطلاعات با موفقیت انجام شد!!');
        }
    }

    public function destroy_quiz($id){
        $quiz = Question::findOrFail($id);
        $quiz->delete();
        return redirect(route('panel_sell'))->with('success','سوال با موفقیت حذف شد');
    }
}
