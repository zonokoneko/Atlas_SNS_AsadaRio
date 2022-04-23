<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Auth;
use Validator;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    //
    // public function index(){
    //     return view('posts.index');
    // }

    public function index(){
    // 全ての投稿を取得
    $posts = Post::all();

    return view('posts.index',[
        'posts'=> $posts
    ]);
}

    // 投稿リスト表示
    public function showPosts()
    {
        $list = \DB::table('posts')->get();
        return view('posts.index',['list'=>$list]);
    }

    // public function posts()
    // {
    //     $list = \DB::table('posts')->get();
    //     return view('posts.index',['list'=>$list]);
    // }

    //投稿フォーム
    public function createForm()
    {
        return view('posts.createForm');
    }

    //つぶやきの登録
    public function create(Request $request)
    {
        $new_post = $request->input('newPost');
        $user_id = Auth::id();

        \DB::table('posts')->insert([
            'post' => $new_post,
            'user_id' => $user_id
        ]);

        return redirect('top');
    }

    // つぶやきの編集
    public function update(Request $request)
    {
        $post = \DB::table('posts')
            ->where('id', $request->post_id)
            ->update(['post'=>$request->post]);

        return redirect('/top');
    }


    // つぶやきの削除
    public function delete($id)
    {
        \DB::table('posts')
            ->where('id', $id)
            ->delete();

        return redirect('top');
    }

}

