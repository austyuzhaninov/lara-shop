<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\User;
use App\Models\Comment;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{

    public function index()
    {
        $articles = new Article();
        return view('article', ['articles' => $articles->all()->sortDesc()]);
    }

    public function show($id)
    {
        $article = Article::find($id);
        $user = User::find($article->user_id);
        $comments = Comment::select('id','name','text','created_at')->where('article_id',$article->id)->get();

        return view('article-show',[
            'article' => $article,
            'user' => $user,
            'comments' => $comments
        ]);
    }

    public function add(ArticleRequest $request) {

        // TODO вынести заполнение
        // Заполняем модель
        $article = new Article();
        $article->head = $request->input('head');
        $article->text = $request->input('text');
        $article->user_id = Auth::id() ? : null;

        //Сохраняем инфу в базу
        $article->save();

        return redirect()->route('article');
    }
}
