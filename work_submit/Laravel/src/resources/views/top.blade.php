<html>
    <head>
        <title>No Name</title>
        <link href="{{ asset('css/top.css') }}" rel="stylesheet">
        <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
    </head>
    <body>
        <div class="end-section">
            <ul class="header_ul">
            @auth {{-- ユーザーがログインしている場合 --}}
                
                @if(isset($is_admin) && $is_admin)
                    <li><a href="{{ route('admin.index') }}">管理画面</a></li>
                @endif
                <li >
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit">ログアウト</button>
                    </form>
                </li>
            @else {{-- ユーザーがログインしていない場合 --}}
                 
                <li><a href="{{ route('login') }}">ログイン</a></li>
                <li><a href="{{ route('register') }}">会員登録</a></li>
            @endauth
            </ul>  
        </div>
        <header>
            <div>
                <input id="mens-tab" class="tab-input" type="radio" name="tab_item" checked>
                <label class="tab_label" for="mens-tab" id="mens-label">メンズ</label>
                <input id="ladies-tab" class="tab-input" type="radio" name="tab_item">
                <label class="tab_label" for="ladies-tab" id="ladies-label">レディース</label>
                <input id="kids-tab" class="tab-input" type="radio" name="tab_item">
                <label class="tab_label" for="kids-tab" id="kids-label">キッズ</label>
            </div>
        </header>
            <!-- メンズ -->
            <div id="content-1" class="tab-content-container">
                <a>メンズ</a>
            </div>
            <!-- レディース -->
            <div id="content-2" class="tab-content-container">
                <a>レディース</a>        
            </div>
            <!-- キッズ -->
            <div id="content-3" class="tab-content-container">
                <a>キッズ</a> 
            </div>

    <script type="text/javascript" src="{{ asset('js/top.js') }}"></script>
</body>
</html>
