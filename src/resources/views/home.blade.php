@extends('layouts.app')
@section('title','Your Note')
@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">{{ __('Dashboard') }}</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                {{ __('You are logged in!') }}
            </div>
        </div>
    </div>
</div>

<p>好きなメモを記録してください。<br>
このページでは、自分のメモのCRUD処理が可能です。</p>

<div class="row my-3">
    <div class="col-md-6">
        <a class="btn btn-primary" href="/notes/mynote/add">自分のメモを追加する</a>
    </div>

    <div class="col-md-6">
        <form class="form" action="/notes/mynote" method="post">
            @csrf
            <input class="form-controll" type="text" name="input" value="">
            <input class="btn btn-secondary" type="submit" name="" value="自分のメモを検索">
        </form>
    </div>

</div>

<div class="row">
    <table class="table">
        <tr>
            <th>Title</th>
            <th>Updated</th>
            <th></th>
        </tr>
        @foreach($items as $item)
        <tr>
            <td>{{$item->title}}</td>
            <td>{{$item->getUpdated()}}</td>
            <td><a class="btn btn-primary" href="/notes/mynote/edit?id={{$item->id}}">編集</a>
            <a class="btn btn-secondary" href="/notes/mynote/delete?id={{$item->id}}">削除</a></td>
        </tr>
        @endforeach


    </table>
</div>

<!-- <a class="" href="/logout"
onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
Logout1</a> -->

@endsection
