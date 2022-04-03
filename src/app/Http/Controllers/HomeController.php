<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note; // notesテーブルをモデル化した、Noteモデルを使う
use Illuminate\Support\Facades\Auth;

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
        // ユーザー情報を取得
        $user = Auth::user();
        // ユーザーのIDと一致するメモを取得する
        $items = Note::where('user_id',$user->id)->get();
        return view('home',['items' => $items, 'user' => $user]);
    }
}
