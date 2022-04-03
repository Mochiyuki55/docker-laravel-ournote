<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note; // notesテーブルをモデル化した、Noteモデルを使う

class NotesController extends Controller
{
    // ホーム画面（ログイン機能含む）表示処理
    public function index(Request $request){
        $msg = '';
        return view('notes.welcome', ['msg' => $msg]);
    }

    // 個人ノートの表示画面
    public function mynote(Request $request){
        // ユーザー情報を取得
        // ユーザーのIDと一致するメモを取得する
        $items = Note::all();
        return view('notes.mynote',['items' => $items]);
    }

    // 個人ノートの検索処理
    public function search(Request $request){

        // タイトルが検索ワードと一致するメモを全て取得する
        $item = Note::where('title',$request->input)->first();
        $param = [
            'item' => $item,
            'input' => $request->input,
        ];
        return view('notes.find', $param);
    }

    // 個人ノートのメモ追加画面
    public function add(Request $request){
        return view('notes.add');
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
        return redirect('/notes/mynote');

    }

    // 個人ノートのメモ編集画面
    public function edit(Request $request){
        $note = Note::find($request->id); // edit?id= で入力された値と合致するレコードを取得する
        return view('notes.edit', ['note' => $note]);
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
        return redirect('/notes/mynote');

    }

    // 個人ノートのメモ削除確認画面
    public function delete(Request $request){
        $note = Note::find($request->id);
        return view('notes.delete',['note' => $note]);
    }
    // 個人ノートのメモ削除処理
    public function remove(Request $request){
        Note::find($request->id)->delete();
        return redirect('/notes/mynote');
    }
}
