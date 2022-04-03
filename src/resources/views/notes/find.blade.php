@extends('layouts.app')

@section('title','検索結果')
@section('content')

    <p>メモの検索結果です 。<br>
    検索ワード：{{$input}}</p>
    <a class="btn btn-secondary" href="/home">戻る</a>
    @if(!$items)
        <div class="alert alert-danger">
            <p class="mb-0">該当するメモがありません。</p>
        </div>
    @endif

    <div class="row">
        <table class="table">
            <tr>
                <th>Title</th>
                <th>Content</th>
                <th></th>
            </tr>

            @if($items)
            @foreach($items as $item)
            <tr>
                <td>{{$item->title}}</td>
                <td>{{$item->content}}</td>
                <td><a class="btn btn-primary" href="/notes/mynote/edit?id={{$item->id}}">編集</a>
                <a class="btn btn-secondary" href="/notes/mynote/delete?id={{$item->id}}">削除</a></td>
            </tr>
            @endforeach
            @endif

        </table>
    </div>

@endsection
