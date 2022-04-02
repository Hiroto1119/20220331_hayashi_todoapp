<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    public function index()
    {
        // $todos = Todo::all();
        // $data = ['todos' => $todos];
        // return view('index', compact('todos'));
        // return view('index');
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

        // $request->validate([
        //     'content' => 'required|min:3'
        // ], [
        //     'content.required' => '必須項目です！',
        //     'content.min' => ':min 文字以上入力してください。'
        // ]);

        // $post = new Todo();
        // $post->content = $request->content;
        // $post->save();

        // findを使う
        // idで検索するときはfind、それ以外（名前など）はwhereで検索

        $form = $request->all();
        unset($form['_token']);
        Todo::find('id', $request->id)->update($form);

        return redirect('/');
    }

    public function delete()
    {
        return view('index');
    }
}
