<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // usersテーブルとのリレーション（従テーブル側）
    public function user() {
        return $this->belongsTo('App\User');
    }

    public function getUserTimeLine(Int $user_id)
    {
        return $this->where('user_id', $user_id)->orderBy('created_at', 'DESC')->paginate(50);
    }

    public function getTweetCount(Int $user_id)
    {
        return $this->where('user_id', $user_id)->count();
    }
}
