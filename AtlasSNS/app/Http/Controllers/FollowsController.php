<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Auth;
use Validator;
use Illuminate\Http\Request;

class FollowsController extends Controller
{
    // フォロワー投稿リスト表示
    public function showFollowerPosts()
    {
        // $posts = Post::query()->whereIn('user_id', Auth::user()->followers()->pluck('followed_id'))->latest()->get();
        // $posts = Post::query()
        //     ->whereIn('user_id', Auth::user()->isFollowed->pluck('followed_id', $user_id))
        //     ->get();
        // dd($posts);
        $posts = Post::all();
        dd($posts);

        $list = \DB::table('posts')->get();
        // (auth()->user()->isFollowed($user->id));



        return view('follows.followerList',['list'=>$list,'posts'=> $posts]);
    }

    // フォロー投稿リスト表示
    public function showFollowPosts()
    {
        $posts = Post::all();
        $list = \DB::table('posts')->get();
        return view('follows.followList',['list'=>$list,'posts'=> $posts]);
    }



}
