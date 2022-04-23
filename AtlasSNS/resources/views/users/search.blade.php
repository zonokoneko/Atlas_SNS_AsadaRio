@extends('layouts.login')

@section('content')

    <form action="/search" method="get">
        {{ csrf_field() }}
        <input type="text" name="search" value="">
        <input type="submit" value="検索">
    </form>

    @if ($keyword)
    <div class="search_word">
        <p>検索ワード：{{$keyword}}</p>
    </div>
    @endif

    @foreach ($users as $user)
        <td><img src="{{ $user->images }}"></td>
        <td>{{ $user->username }}</td>


        @if (auth()->user()->isFollowed($user->id))
            <div class="px-2">
                <span class="px-1 bg-secondary text-light">フォローされています</span>
            </div>
        @endif

        <div class="d-flex justify-content-end flex-grow-1">
            @if (auth()->user()->isFollowing($user->id))
                <form action="{{ route('unfollow', ['user' => $user->id]) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button type="submit" class="btn btn-danger">フォロー解除</button>
                </form>

            @else
                <form action="{{ route('follow', ['user' => $user->id]) }}" method="POST">
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-primary">フォローする</button>
                </form>
            @endif
        </div>
    @endforeach
@endsection


