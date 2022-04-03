@extends('layouts.master')

@section('title','Your Note　|　メモを検索')
@section('main')

    <p>メモの検索結果です 。 <a href="/notes/mynote/">戻る</a> </p>
    <p>検索ワード：{{$input}}</p>
    @if(!$item)
        <div class="alert alert-danger">
            <p>該当するメモがありません。</p>
        </div>
    @endif

    <div class="row">
        <table class="table">
            <tr>
                <th>ID:</th>
                <th>Title</th>
                <th>Updated</th>
                <th></th>
            </tr>

            @if($item)
            <tr>
                <td>{{$item->title}}</td>
                <td>{{$item->getUpdated()}}</td>
                <td><a class="btn btn-primary" href="/notes/mynote/edit?id={{$item->id}}">編集</a>
                <a class="btn btn-secondary" href="/notes/mynote/delete?id={{$item->id}}">削除</a></td>
            </tr>
            @endif

        </table>
    </div>

@endsection
