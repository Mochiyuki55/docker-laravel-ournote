@extends('layouts.master')

@section('title','Your Note')
@section('main')



    <hr>
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
                <th>ID:</th>
                <th>Title</th>
                <th>Updated</th>
                <th></th>
            </tr>
            @foreach($items as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->title}}</td>
                <td>{{$item->getUpdated()}}</td>
                <td><a class="btn btn-primary" href="/notes/mynote/edit?id={{$item->id}}">編集</a>
                <a class="btn btn-secondary" href="/notes/mynote/delete?id={{$item->id}}">削除</a></td>
            </tr>
            @endforeach


        </table>
    </div>

@endsection
