@extends('layout')

@section('title')
    Статьи
@endsection

@section('content')
    <div class="my-3 p-3 bg-white rounded shadow-sm">
        <h1>{{$article->head}}</h1>
        <p>{{$article->text}}</p>
        Автор: {{ $user->name }} <br>
        Дата: {{$article->created_at}}
    </div>

    <div class="my-3 p-3 bg-white rounded shadow-sm">
        <h4>Оставьте комментарий</h4>
        @if($errors->any())
            <div class="alesrt alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="post" action="{{ route('commentStore', ['id' => $article->id]) }}">
            @csrf
            <input type="text" name="name" id="name" class="form-control" placeholder="Имя"><br>
            <textarea type="text" name="text" id="text" class="form-control" placeholder="Текст комментария" style="height:150px;"></textarea><br>
            <input class="btn btn-primary" type="submit" value="Отправить"><br><br>
        </form>
    </div>

    @if($comments)
        @foreach($comments as $comment)
            <div class="my-3 p-3 bg-white rounded shadow-sm">
                <h4>{{$comment->name}}</h4>
                {{$comment->text}} <br>
                {{$comment->created_at}}
            </div>
        @endforeach
    @endif
@endsection

