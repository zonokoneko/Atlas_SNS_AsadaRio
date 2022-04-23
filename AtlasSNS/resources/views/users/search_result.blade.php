@extends('layouts.login')


@section('content')
<div class="search-form">
  <div>
    <form action="/search_result" method="get">
      <input type="search" placeholder="ユーザー名" name="search" >
      <button>
        <i class="fas fa-search fa-2x"></i>
      </button>
    </form>
  </div>
  <div class="search_word">
    <p>検索ワード：{{$keyword}}</p>
  </div>
</div>


<div>
  <table class="user_table">
    @foreach($users as $users)
    <tr>
      <td><img src="{{asset('storage/images/'.$users->images)}}"></td>
      <td>{{$users->username}}</td>
      <td></td>
    </tr>
    @endforeach
  </table>
</div>

@endsection