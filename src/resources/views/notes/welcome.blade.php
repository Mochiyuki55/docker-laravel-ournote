@extends('layouts.master')

@section('title','Our Notes')
@section('main')
    <p>Our Notesは、メモをユーザ毎にCRUD処理できるサービスです。</p>
    <div class="row">
        @if (Route::has('login'))
            <div class="">
                @auth

                @else
                    <a href="{{ route('login') }}" class="btn btn-primary">ログイン画面へ</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-success">ユーザー登録画面へ</a>
                    @endif
                @endauth
            </div>
        @endif
    </div>

    <div class="row mt-3">
        サービスの使い方
    </div>
@endsection
