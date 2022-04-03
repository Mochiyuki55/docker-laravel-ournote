@extends('layouts.app')

@section('title','Our Notesへようこそ！')
@section('content')

    <!-- ログイン画面 -->
    <div class="row justify-content-center">
        <div class="col">
            <div class="text-center">
                <p class="mb-4">Our Notesは、ユーザ毎にメモを登録、検索、更新、削除できるサービスです。</p>
            </div>

            <div class="row">

                <div class="col-md-8 text-center">
                    <div class="mt-3">
                        <a class="btn btn-success btn-lg" href="{{ route('register') }}">ユーザー登録画面へ</a>
                    </div>
                    <div class="my-4">
                        <p>下図のように、オリジナルのメモ帳を作成できます。</p>
                        <img class="img-fluid img-thumbnail" src="{{asset('storage/sample.png')}}" alt="サンプル画像">
                    </div>
                </div>

                <div class="col-md-4">

                    <div class="card">
                        <div class="card-header">ログイン</div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="row mb-3">
                                    <label for="email" class="">メールアドレス</label>

                                    <div class="">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password" class="">パスワード</label>

                                    <div class="">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                次回から自動ログインする
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <button type="submit" class="btn btn-primary">
                                        ログイン
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            パスワードを忘れてしまった場合はこちら
                                        </a>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--  -->
@endsection
