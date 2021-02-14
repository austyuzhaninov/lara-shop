@extends('layout')

@section('title')
    Статьи
@endsection

@section('content')

    @guest
        Печатать статью могут только авторизированные пользователи. <a href="/login">Авторизуйтесь</a>
    @else
        <div class="my-3 p-3 bg-white rounded shadow-sm">
            @if($errors->any())
                <div class="alesrt alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="post" action="article/add">
                @csrf
                <input type="text" name="head" id="head" class="form-control" placeholder="Заголовок статьи"><br>
                <textarea type="text" name="text" id="text" class="form-control" placeholder="Текст статьи" style="height:150px;"></textarea><br>
                <input class="btn btn-primary" type="submit" value="Отправить"><br><br>
            </form>
        </div>
    @endguest
    <h3 class="text">Статьи</h3>
    <div class="my-3 p-3 bg-white rounded shadow-sm">
        @foreach($articles as $article)
            <div class="d-flex flex-row-reverse">
                #{{$article->id}}
            </div>
            <div class="d-flex text-muted pt-3">
                <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"></rect><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>
                <p class="pb-3 mb-0 small lh-sm border-bottom">
                    <strong class="d-block text-gray-dark"> Arseniy {{$article->user_id}}</strong>
                    <strong><a href="{{ route('articleShow', ['id' => $article->id]) }}">{{$article->head}}</a></strong><br>
                    {{$article->text}}
                </p>
            </div>
        @endforeach
    </div>
@endsection

