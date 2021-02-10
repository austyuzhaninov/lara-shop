<?php

namespace App\Http\Controllers;

use App\Http\Requests\AboutRequest;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{

    public function about() {
        return view('about');
    }

    public function about_check(AboutRequest $request) {

        // $validatedData = $request->validated();

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
