<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function create(Request $request)
    {

        $request->validate([
            'content' => 'required|min:3'
        ]);

        $post = new Todo();
        $post->content = $request->content;
        $post->save();

        return redirect('/');
    }

    public function update()
    {
        return view('index');
    }

    public function delete()
    {
        return view('index');
    }
}
