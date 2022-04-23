@extends('layouts.login')

@section('content')

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
            @endforeach


        </table>




@endsection