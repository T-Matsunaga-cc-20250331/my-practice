document.addEventListener('DOMContentLoaded', () => {

    const tabs = document.querySelectorAll('.tab_label');
    const contents = document.querySelectorAll('.tab-content-container');
    const searchButton = document.getElementById('search-button');
    const searchKeywordInput = document.getElementById('search-keyword');

    // タブIDとコンテンツIDの対応関係
    const tabToContent = {
        'mens-tab': 'content-1',
        'ladies-tab': 'content-2',
        'kids-tab': 'content-3'
    };
    
    // --- ユーティリティ関数 ---

    const renderItems = (items) => {
        if (!items || items.length === 0) {
            return '<p>該当する商品が見つかりませんでした。</p>';
        }
        // 価格を適切な形式（例: 3,000円）に整形するユーティリティ関数を追加
        const formatPrice = (price) => {
            return price.toLocaleString('ja-JP', { style: 'currency', currency: 'JPY' });
        };
        
        return items.map(item => `
            <div class="item-card" style="border: 1px solid #eee; padding: 10px; margin-bottom: 10px; border-radius: 4px;">
                <h3 style="margin-top: 0; font-size: 1.1em;">${item.name}</h3>
                <p style="margin-bottom: 5px;"><strong>価格:</strong> ${formatPrice(item.price)}</p>
                <p style="margin-bottom: 5px;"><strong>在庫:</strong> ${item.stock_quantity > 0 ? item.stock_quantity : '在庫なし'}</p>
                <p style="font-size: 0.9em; color: #555;">${item.description}</p>
            </div>
        `).join('');
    };

    // --- API呼び出し関数 ---
    //api/products/search エンドポイントを呼び出す
    const fetchRealApi = async (categoryKey, keyword) => {
        // クエリパラメータを構築
        const params = new URLSearchParams({
            category: categoryKey,
            keyword: keyword
        });
        
        // APIエンドポイントにリクエストを送信
        const url = `/api/products/search?${params.toString()}`;

        const response = await fetch(url);
        
        if (!response.ok) {
            // サーバーエラーの場合
            throw new Error(`サーバーエラー: ${response.status} ${response.statusText}`);
        }

        // サーバーからのJSON応答を解析して返す
        return response.json(); 
    };

    // --- 検索実行処理 ---
    const executeSearch = async (tabId) => {
        const keyword = searchKeywordInput.value.trim();
        const contentId = tabToContent[tabId];
        const targetContent = document.getElementById(contentId);
        
        targetContent.innerHTML = '<p>検索中...</p>'; 

        try {
            // **API関数を呼び出す**
            const results = await fetchRealApi(tabId, keyword);
            
            // 取得した結果を元に画面をレンダリング
            targetContent.innerHTML = renderItems(results);
        } catch (error) {
            targetContent.innerHTML = `<p style="color: red;">商品データの取得に失敗しました。エラー: ${error.message}</p>`;
            console.error('Search error:', error);
        }
    };

    // --- タブ切り替えとコンテンツロードの制御関数 ---
    const initOrSwitchTab = async (tabId) => {
        // すべてのタブとコンテンツをリセット
        tabs.forEach(t => t.classList.remove('active'));
        contents.forEach(c => c.style.display = 'none');
        
        // アクティブなラベルをハイライト
        const label = document.querySelector(`label[for="${tabId}"]`);
        if (label) label.classList.add('active');
        
        // コンテンツを表示
        const contentId = tabToContent[tabId];
        const targetContent = document.getElementById(contentId);
        if (targetContent) targetContent.style.display = 'block';

        // タブ切り替え時に、現在のキーワードで検索を実行
        await executeSearch(tabId);
    };

    // --- イベントリスナー設定 ---

    // 1. 初期表示の実行 (チェックされたタブで初期検索を実行)
    const checkedInput = document.querySelector('input[name="tab_item"]:checked');
    if (checkedInput) {
        initOrSwitchTab(checkedInput.id);
    }

    // 2. タブクリックイベント (ロジックを initOrSwitchTab に集約)
    tabs.forEach(tab => {
        tab.addEventListener('click', () => {
            const inputId = tab.getAttribute('for');
            initOrSwitchTab(inputId); // タブ切り替えと検索実行
        });
    });

    // 3. 検索ボタンクリックイベント
    if (searchButton) {
        searchButton.addEventListener('click', (e) => {
            e.preventDefault(); 
            
            // 現在アクティブなタブを取得し、そのカテゴリで検索を実行
            const activeTabLabel = document.querySelector('.tab_label.active');
            if (activeTabLabel) {
                const activeTabId = activeTabLabel.getAttribute('for');
                executeSearch(activeTabId); // 現在のタブでの検索実行
            }
        });
    }
});