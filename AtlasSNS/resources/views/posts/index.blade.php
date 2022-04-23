@extends('layouts.login')

@section('content')

<link rel="stylesheet" href="{{ asset('css/style.css') }} ">

<!-- 投稿フォーム -->
<div class="container">
        <h2 class="page-header">新しく投稿をする</h2>
        {!! Form::open(['url' => 'post/create']) !!}
        <div class="form-group">
            {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => '投稿内容を入力してください']) !!}
        </div>
        <button type="submit" class="btn btn-success pull-right">つぶやく</button>
        {!! Form::close() !!}
</div>
<!--  -->


        <h2 class="page-header">投稿一覧</h2>
        <table class='table table-hover'>
            <tr>
                <th>投稿No</th>
                <th>投稿内容</th>
                <th>投稿日時</th>
            </tr>
            @foreach ($list as $list)
            <tr>
                <td>{{ $list->id }}</td>
                <td>{{ $list->post }}</td>
                <td>{{ $list->created_at }}</td>
                <td><a class="js-modal-open" post="{{ $list->post }}" post_id="{{ $list->id }}" href="">編集</a></td>
                <td><a class="btn btn-danger" href="/post/{{$list->id}}/delete" onclick="return confirm('この投稿を削除します。よろしいでしょうか？')">削除</a></td>
            </tr>
            @endforeach
        </table>



<!-- 編集モーダル -->
    <div class="js-modal">
        <div class="modal__bg js-modal-close"></div>
        <div class="modal__content">
            <form action="/update" method="post">
                <input type="text" class="post" name="post">

                <!-- 隠しデータ -->
                <input type="hidden" class="post_id" name="post_id">

                <input type="submit" value="更新">
                {{csrf_field()}}
            </form>
        </div>
    </div>


@endsection