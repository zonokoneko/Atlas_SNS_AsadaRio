<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\User;



class UsersController extends Controller
{
    //
    public function profile(){

        $users = Auth::user();

        return view('users.profile',[
            'users' => $users,
        ]);
    }

    //ユーザー検索
    public function search(Request $request){
        //ユーザー全部引っ張ってくる
        $users = User::get();
        //検索フォームに入力があったら検索
        if($request -> search){
            //search.blade>検索フォーム>name属性“search”をキーワードにする
            $keyword = $request -> search;
            //users変数を「User::get()」から定義し直す
            $users=User::where('username','LIKE',"%{$keyword}%")->get();
            //
        }

        //検索キーワード表示
        $keyword = $request -> search;
        return view('users.search',
        ['users' => $users ,'keyword' => $keyword]);
    }



    // ログアウトしてログインページに戻る
    public function logout(Request $request){
        Auth::logout();
        return redirect('login');
    }

    // フォロー
    public function follow(User $user)
    {
        $follower = auth()->user();
        // フォローしているか
        $is_following = $follower->isFollowing($user->id);
        if(!$is_following) {
            // フォローしていなければフォローする
            $follower->follow($user->id);
            return back();
        }
    }

    // フォロー解除
    public function unfollow(User $user)
    {
        $follower = auth()->user();
        // フォローしているか
        $is_following = $follower->isFollowing($user->id);
        if($is_following) {
            // フォローしていればフォローを解除する
            $follower->unfollow($user->id);
            return back();
        }
    }

    //フォローカウント
    // public function countFollows(){
    // $userId = Auth::user()->id;
    // $count_follows = \DB::connection('username')
    //     ->table('follows')
    //     ->where('user_id', '=', $userId)
    //     ->count();

    //     return view('layouts.login', [
    //         'count_follows' => $count_follows
    //     ]);
    // }

    public function show(User $user, Tweet $tweet, Follower $follower)
    {
        $login_user = auth()->user();
        $is_following = $login_user->isFollowing($user->id);
        $is_followed = $login_user->isFollowed($user->id);
        $timelines = $tweet->getUserTimeLine($user->id);
        $tweet_count = $tweet->getTweetCount($user->id);
        $follow_count = $follower->getFollowCount($user->id);
        $follower_count = $follower->getFollowerCount($user->id);

        return view('top', [
            'user'           => $user,
            'is_following'   => $is_following,
            'is_followed'    => $is_followed,
            'timelines'      => $timelines,
            'tweet_count'    => $tweet_count,
            'follow_count'   => $follow_count,
            'follower_count' => $follower_count
        ]);
    }





    //プロフィール編集別版
    public function profileUpdate(Request $request ,User $user)
    {
        //Usersテーブルからpassword持ってくる
        $user = Auth::user()->password;
        //inputのpassword
        $password = $request->password;

        // $request->user()->fill([
        //     'password' => Hash::make($request->newPassword)
        // ])->save();

        // パスワードをハッシュ化
        $hash_password = Hash::make($password);

        // if (Hash::check($user, $hash_password)) {

        //     //画像ある時ない時if

        // } else {
        //     //リダイレクトでプロフィール戻す
        //     return redirect('/profile')
        //     ->with('massage','パスワード一致しない');
        // }


        //profile_imageがあった時
        if(!empty($request->profile_image)){
            $image = $request -> file('profile_image');
            dd($image);
            $path = $image -> store('public/images');
            $filepath = str_replace('public/images','',$path);

        $user = Auth::user()
        -> where('id', $request -> id);

        $user->id = $request->user()->id;
        $user->username = $request->user()->username;
        // $user->fill($request->all())->save();

        $user->mail = $request->user()->email;

        $user = User::find($id);

        // $user->fill($user)->save();

        }

        return redirect('/profile')
        ->with('massage','更新完了');

    }






};