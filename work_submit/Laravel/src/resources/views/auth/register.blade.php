<html>
    <head>
        <title>新規会員登録</title>
        <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
    </head>
  <body>
    <div id="container">
        <p >会員登録</p>
        @if ($errors->any())
            <div style="color: red; padding: 10px; border: 1px solid red; margin-bottom: 15px;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="post" action="{{ route('confirm') }}">
            @csrf
            <div>           
                <label for="name">氏名</label><br>
                <input type="text" value="{{ old('name') }}" name="name" id="name" required maxlength="255">
            </div>
            <label for="email">メールアドレス</label>
            <div></div>
            <input id="email" type="email" value="{{ old('email') }}" name="email" required>
            <div></div>
            <label for="password_hash">パスワード</label>
            <div></div>
            <input id="password_hash" type="password" name="password_hash" required>
            <div></div>
            <input type="submit">
        </form>
    </div>
  </body>
</html>