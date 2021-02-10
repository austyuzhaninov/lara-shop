<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function home() {
        $products = new Product();
        return view('home', ['products' => $products->all()]);
    }

    public function about() {
        return view('about');
    }

    public function about_check(Request $request) {

        //Валидация
        $val = $request->validate([
            'email'=>'required|min:6|max:100',
            'name'=>'required|min:2|max:100',
            'message'=>'required|min:10|max:600',
        ]);

        // Заполняем модель
        $about = new About();
        $about->name = $request->input('name');
        $about->phone = $request->input('phone');
        $about->email = $request->input('email');
        $about->message = $request->input('message');

        //Сохраняем инфу в базу
        $about->save();

        return redirect()->route('about');
    }
}
