<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="トップページ" />
    <title></title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="public/favicon.ico" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->
</head>

<body>
    <header>
        <div id = "head">
            <h1><a href="/top"><img src="{{ asset('images/atlas.png') }}" width="150px" height="auto" alt="ロゴ"></a></h1>

            <div class="accordion-container">
                <h4 class="accordion-title">
                    <img src="{{ Auth::user()->images }}" width="50px" height="auto" alt="アイコン">
                    {{Auth::user()->username}}さん
                </h4>

                <div class="accordion-content">
                    <ul>
                        <li><a href="/top">HOME</a></li>
                        <li><a href="/profile">プロフィール編集</a></li>
                        <li><a href="/logout">ログアウト</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>



    <div id="row">
        <div id="container">
            @yield('content')
        </div >
        <div id="side-bar">
            <div id="confirm">
                <p>{{Auth::user()->username}}さんの</p>
                <div>
                <p>フォロー数</p>
                <p>{{ Auth::user()->follows()->count() }}名</p>
                </div>
                <p class="btn"><a href="/follow-list">フォローリスト</a></p>
                <div>
                <p>フォロワー数</p>
                <p>{{ Auth::user()->followers()->count() }}名</p>
                </div>
                <p class="btn"><a href="/follower-list">フォロワーリスト</a></p>
            </div>
            <button><p class="btn"><a href="/search">ユーザー検索</a></p></button>
        </div>
    </div>
    <footer>
    </footer>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="{{ asset('js/script.js') }}"></script>
    <script src="JavaScriptファイルのURL"></script>
</body>
</html>
