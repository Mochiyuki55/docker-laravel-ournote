@extends('layouts.master')

@section('title','Our Notes')
@section('main')
    <p>当サイトは登録されたメンバーが記録したメモを共有するサービスです。<br>
    下記のメンバーリストから、メモを閲覧したいメンバーを選択してください。</p>

    <div class="row my-3">
        <a class="btn btn-lg btn-success" href="/notes/mynote">自分のメモの管理</a>
    </div>

    <div class="row">
        <table class="table">
            <tr>
                <th>ID:</th>
                <th>Member Name</th>
                <th>Updated</th>
                <th></th>
            </tr>
            <tr>
                <td>1</td>
                <td>aaaa</td>
                <td> <?php echo date('Y/m/d'); ?> </td>
                <td><a class="btn btn-primary" href="/notes/membernote?id=1">メモを見る</a></td>
            </tr>
            <tr>
                <td>2</td>
                <td>bbbb</td>
                <td> <?php echo date('Y/m/d'); ?> </td>
                <td><a class="btn btn-primary" href="/notes/membernote?id=2">メモを見る</a></td>
            </tr>
            <tr>
                <td>3</td>
                <td>cccc</td>
                <td> <?php echo date('Y/m/d'); ?> </td>
                <td><a class="btn btn-primary" href="/notes/membernote?id=3">メモを見る</a></td>
            </tr>
            <tr>
                <td>4</td>
                <td>dddd</td>
                <td> <?php echo date('Y/m/d'); ?> </td>
                <td><a class="btn btn-primary" href="/notes/membernote?id=4">メモを見る</a></td>
            </tr>

        </table>
    </div>

@endsection
