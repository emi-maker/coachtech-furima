<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>coachtech-furima</title>

    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/common.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    @yield('css')
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <a class="header__logo" href="/">
                <img src="{{ asset('img/COACHTECHヘッダーロゴ.png') }}" alt="ロゴ">
            </a>
            <form class="header__search" action="/" method="GET">
                <input class="header__search-input" type="text" name="keyword" value="{{ request('keyword') }}"
                    placeholder="何かお探しですか？">
            </form>

            @guest
            <a href="/login">ログイン</a>
            @endguest

            @auth
            <form method="POST" action="/logout" style="display:inline;">
                @csrf
                <button type="submit" class="logout-link">ログアウト</button>
            </form>
            @endauth

            <a href="/mypage">マイページ</a>
            <a href="/sell" class="header__sell-button">出品</a>
        </div>
    </header>

    @yield('content')
</body>

</html>