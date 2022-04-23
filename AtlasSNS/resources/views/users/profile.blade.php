@extends('layouts.login')

@section('content')

<div class="profile-edit">
    <form action="/profile-update" method="post" enctype="multipart/form-data">
        @csrf
        <div>
        <label>username</label>
            <input name="username" type="text" value="{{ $users -> username }}" autocomplete="off">
        </div>

        <div>
        <label>mail address</label>
            <input name="email" type="email" value="{{ $users -> mail }}"autocomplete="off">
        </div>

        <div>
                    <label>password</label>
            <input name="password" type="password" placeholder="" autocomplete="off">
        </div>

        <div>
        <label>password confirm</label>
            <input name="password_confirmation" type="password" placeholder="新しいパスワード再入力" autocomplete="off">
        </div>

        <div>
        <label>bio</label>
            <textarea class="textarea" name="bio" style="resize :none;" value="{{ $users -> bio }}" autocomplete="off"></textarea>
        </div>

        <div>
        <label>icon image</label>
            <input type="file" name="profile_image" accept="image/*">
        </div>


        <input type="file" name="avatar">


        <input type="hidden" name="id" name="id">
        <input type="submit" value="更新">
    </form>
</div>

@endsection