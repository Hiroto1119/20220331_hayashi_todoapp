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
            'new_content' => 'required|min:3|max:20'
        ], [
            'new_content.required' => '必須項目です！',
            'new_content.min' => ':min 文字以上入力してください。'
            // 'new_content.max' => ':max 文字以下で入力しください。'
        ]);
        // bladeファイルで定義すべき↑

        $post = new Todo();
        $post->content = $request->new_content;
        $post->save();

        return redirect('/');
    }

    public function update(Request $request)
    {
        $request->validate([
            'content' => 'required|min:3|max:20'
        ], [
            'content.required' => '必須項目です！',
            'content.min' => ':min 文字以上入力してください。'
            // 'content.max' => ':max 文字以下で入力しください。'
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
