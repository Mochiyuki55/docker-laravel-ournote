@extends('layouts.app')

@section('title','削除確認画面')
@section('content')

    <div class="text-center">
        <p>こちらのメモを削除しますか？</p>
    </div>

    <div class="row">
        <form class="form" action="/notes/mynote/delete" method="post">
            @csrf

            <!-- 選択したnoteのidをpostする -->
            <input type="hidden" name="id" value="{{$note->id}}">
            <!-- ユーザーのidをuser_idとしてpostする -->
            <input type="hidden" name="user_id" value="{{$user->id}}">

            <table class="table table-borderless">
                <tr>
                    <th>Title</th>
                    <td>{{$note->title}}</td>
                </tr>
                <tr>
                    <th>Content</th>
                    <td>{{$note->content}}</td>
                </tr>
            </table>

            <input class="btn btn-danger" type="submit" name="" value="削除">
            <a class="btn btn-secondary" href="/home">戻る</a>
        </form>

    </div>

@endsection
