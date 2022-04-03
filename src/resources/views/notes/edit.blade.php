@extends('layouts.master')

@section('title','Our Notes　|　メモ編集')
@section('main')
    <p>メモを編集し、更新してください。</p>

    <div class="row">
        <form class="form" action="/notes/mynote/edit" method="post">
            @csrf
            <!-- 選択したnoteのidをpostする -->
            <input type="hidden" name="id" value="{{$note->id}}">
            <!-- ユーザーのidをuser_idとしてpostする -->
            <input type="hidden" name="user_id" value="1">

            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Title</label>
              <input type="text" name="title" class="form-control" id="exampleFormControlInput1"
              value="{{$note->title}}">
            </div>
            <div class="mb-3">
              <label for="exampleFormControlTextarea1" class="form-label">Content</label>

              <textarea class="form-control" name="content" id="exampleFormControlTextarea1" rows="10"
              value="">{{$note->content}}</textarea>
            </div>
            <input class="btn btn-success" type="submit" name="" value="更新">
            <a class="btn btn-secondary" href="/notes/mynote">戻る</a>
        </form>
    </div>

@endsection
