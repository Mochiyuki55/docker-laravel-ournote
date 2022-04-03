<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note; // notesテーブルをモデル化した、Noteモデルを使う
use Illuminate\Support\Facades\Auth;

class NotesController extends Controller
{
    // ホーム画面（ログイン機能含む）表示処理
    public function index(Request $request){
        $msg = '';
        return view('auth.login', ['msg' => $msg]);
    }

    // 個人ノートの表示画面
    public function mynote(Request $request){
        // ユーザー情報を取得
        $user = Auth::user();
        // ユーザーのIDと一致するメモを取得する
        $items = Note::where('user_id',$user->id)->get();
        return view('notes.mynote',['items' => $items, 'user' => $user]);
    }

    // 個人ノートの検索処理
    public function search(Request $request){

        // タイトルが検索ワードと部分一致するメモを全て取得する
        $items = Note::where('title','LIKE','%'.$request->input.'%')->get();
        $param = [
            'items' => $items,
            'input' => $request->input,
        ];
        return view('notes.find', $param);
    }

    // 個人ノートのメモ追加画面
    public function add(Request $request){
        // ユーザー情報を取得
        $user = Auth::user();
        return view('notes.add',['user' => $user]);
    }
    // 個人ノートのメモ追加処理
    public function create(Request $request){
        // バリデーションの実行（Noteモデルのルールに従う）
        $this->validate($request, Note::$rules);

        // 保存作業
        $note = new Note;
        $form = $request->all(); // リクエストした情報を使用する
        unset($form['_token']); // フォームに追加される非表示フィールド「_token」は削除しておく
        $note->fill($form)->save(); // インスタンスに値を設定して保存
        return redirect('/home');

    }

    // 個人ノートのメモ編集画面
    public function edit(Request $request){
        // ユーザー情報を取得
        $user = Auth::user();
        $note = Note::find($request->id); // edit?id= で入力された値と合致するレコードを取得する
        return view('notes.edit', ['note' => $note, 'user' => $user]);
    }
    // 個人ノートのメモ編集処理
    public function update(Request $request){
        // バリデーションの実行
        $this->validate($request, Note::$rules);
        // 保存作業
        $note = Note::find($request->id); // POSTされたidと合致するレコードを取得する

        // 値を用意する
        $form = $request->all(); // リクエストした情報を使用する
        unset($form['_token']); // フォームに追加される非表示フィールド「_token」は削除しておく
        $note->fill($form)->save();
        return redirect('/home');

    }

    // 個人ノートのメモ削除確認画面
    public function delete(Request $request){
        // ユーザー情報を取得
        $user = Auth::user();
        $note = Note::find($request->id);
        return view('notes.delete',['note' => $note, 'user' => $user]);
    }
    // 個人ノートのメモ削除処理
    public function remove(Request $request){
        Note::find($request->id)->delete();
        return redirect('/home');
    }
}
