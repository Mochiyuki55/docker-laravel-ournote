@extends('layouts.app')

@section('title','退会確認画面')
@section('content')

    <div class="text-center">
        <p>退会してもよろしいですか？</p>

    </div>

    <div class="row text-center">
        <form class="form" action="/signout" method="post">
            @csrf
            <input type="hidden" name="id" value="{{$user->id}}">

            <div class="mt-4">
                <p>ユーザー名：{{$user->name}}</p>
                <p>メールアドレス：{{$user->email}}</p>
            </div>

            <div class="mt-5">
                <input class="btn btn-danger" type="submit" name="" value="退会">
                <a class="btn btn-secondary" href="/home">戻る</a>
            </div>
        </form>
    </div>

@endsection
