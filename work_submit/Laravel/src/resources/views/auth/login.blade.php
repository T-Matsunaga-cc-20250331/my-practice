
<html>
  <head>
    <title>ログイン</title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
  </head>
  <body>
    <div>
        <p >ログイン</p>
        <form method="POST" action="{{ route('login') }}">
            <label for="email">メールアドレス</label>
            <br>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required>
            <br>
            <label for="password_hash">パスワード</label>
            <br>
            <input id="password_hash" type="password" name="password_hash" required>
            <br>
            <input type="submit" value="ログイン">
        </form>
        <a href="{{ route('register') }}">会員登録がまだの方はコチラ</a>
    </div>
  </body>
</html>