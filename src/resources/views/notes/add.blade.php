@extends('layouts.app')

@section('title','新規登録画面')
@section('content')

    <div class="text-center">
        <p>ノートに追加したいメモを入力し、登録してください。</p>

    </div>

    <div class="row">
        <form class="form" action="/notes/mynote/add" method="post">
            @csrf
            <input type="hidden" name="user_id" value="{{$user->id}}">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Title</label>
              <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>
            <div class="mb-3">
              <label for="exampleFormControlTextarea1" class="form-label">Content</label>
              <textarea class="form-control" name="content" id="exampleFormControlTextarea1" rows="10"></textarea>
            </div>
            <input class="btn btn-success" type="submit" name="" value="登録">
            <a class="btn btn-secondary" href="/home">戻る</a>
        </form>
    </div>

@endsection
