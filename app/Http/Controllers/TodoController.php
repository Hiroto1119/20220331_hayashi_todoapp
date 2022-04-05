<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        return view('index', ['todos' => $todos]);
    }

    public function create(Request $request)
    {

        $request->validate([
            'content' => 'required|min:3'
        ], [
            'content.required' => '必須項目です！',
            'content.min' => ':min 文字以上入力してください。'
        ]);
        // bladeファイルで定義すべき↑

        $post = new Todo();
        $post->content = $request->content;
        $post->save();

        return redirect('/');
    }

    public function update(Request $request)
    {
        $request->validate([
            'content' => 'required|min:3'
        ], [
            'content.required' => '必須項目です！',
            'content.min' => ':min 文字以上入力してください。'
        ]);

        $form = $request->all();
        unset($form['_token']);

        $update = Todo::find($request->id);
        $update->content = $request->content;
        $update->save();

        return redirect('/');
    }

    public function delete(Request $request)
    {
        $delete = Todo::find($request->id);
        $delete->delete();

        return redirect('/');
    }
}
