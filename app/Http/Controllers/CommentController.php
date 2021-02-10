<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\User;
use App\Models\Comment;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    public function add(CommentRequest $request) {

        dd($request);
        // Заполняем модель
        $comment = new Comment();
        $comment->article_id = $request->input('name');
        $comment->name = $request->input('name');
        $comment->text = $request->input('text');

        //Сохраняем инфу в базу
        $comment->save();

        return redirect()->route('article');
    }
}
