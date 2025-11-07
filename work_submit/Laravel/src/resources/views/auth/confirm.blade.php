<html>
  <head>
    <title>登録情報確認</title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
  </head>
  <body>
    <div>
        <p>以下の内容で登録します。お間違いないですか？</p>
            <div >
                <label for="name">氏名</label>
                <div>{{ $data['name'] ?? '' }}</div>
            </div>
            <label for="email">メールアドレス</label>
            <br>
            <div>{{ $data['email']?? '' }}</div>
            <br>
            <form method="post" action="{{ route('complete') }}">
                @csrf
                <input type="hidden" name="name" value="{{ $data['name'] ?? '' }}">
                <input type="hidden" name="email" value="{{ $data['email'] ?? '' }}">
                <input type="submit" value="登録">
            </form>
        <div>
            <a href="{{ route('register') }}">戻る</a>
        </div>  
    </div>
  </body>
</html>
