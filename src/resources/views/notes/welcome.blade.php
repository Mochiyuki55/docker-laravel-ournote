@extends('layouts.master')

@section('title','Our Notes')
@section('main')
    <p>Our Notesは、メモをユーザ毎にCRUD処理できるサービスです。</p>

    @if($msg !== '')
    <div class="alert alert-danger">
        <p>{{$msg}}</p>
    </div>
    @endif

    <form class="" action="/notes/welcome" method="post">
        @csrf
        <p>mail: <input type="text" name="email" value=""> </p>
        <p>pass: <input type="password" name="password" value=""> </p>
        <p><input class="btn btn-primary" type="submit" name="" value="ログイン"> </p>

    </form>

    <div class="row">
        @if (Route::has('login'))
            <div class="">
                @auth

                @else
                    <a href="{{ route('login') }}" class="btn btn-primary">ログイン</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-success">ユーザー登録</a>
                    @endif
                @endauth
            </div>
        @endif
    </div>

    <div class="row mt-3">
        サービスの使い方
    </div>
@endsection
