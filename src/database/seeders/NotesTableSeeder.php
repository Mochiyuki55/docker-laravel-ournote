<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // DBを使用することを宣言する
use App\Models\Note; // シード値を入れる対象のモデルを使用することを宣言する


class NotesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'user_id' => '1',
            'title' => 'マイグレーションファイルを作成',
            'content' => 'php artisan make:migration CreateNotesTable',
        ];
        $note = new Note; // 入れ物を作って
        $note->fill($param)->save(); // 中身を入れて保存

        $param = [
            'user_id' => '1',
            'title' => 'マイグレーション',
            'content' => 'php artisan migrate',
        ];
        $note = new Note; // 入れ物を作って
        $note->fill($param)->save(); // 中身を入れて保存

        $param = [
            'user_id' => '1',
            'title' => 'シーダーを設定',
            'content' => 'php artisan make:seeder NotesTableSeeder',
        ];
        $note = new Note; // 入れ物を作って
        $note->fill($param)->save(); // 中身を入れて保存

        $param = [
            'user_id' => '1',
            'title' => 'シーダーを登録',
            'content' => 'php artisan db:seed',
        ];
        $note = new Note; // 入れ物を作って
        $note->fill($param)->save(); // 中身を入れて保存

    }
}
