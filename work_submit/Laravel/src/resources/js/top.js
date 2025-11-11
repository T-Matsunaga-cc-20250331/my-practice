document.addEventListener('DOMContentLoaded', () => {
    const tabs = document.querySelectorAll('.tab_label');
    const contents = document.querySelectorAll('.tab-content-container');

    const tabToContent = {
        'mens-tab': 'content-1',
        'ladies-tab': 'content-2',
        'kids-tab': 'content-3'
    };

    const checkedInput = document.querySelector('input[name="tab_item"]:checked');
    if (checkedInput) {
        const label = document.querySelector(`label[for="${checkedInput.id}"]`);
        const contentId = tabToContent[checkedInput.id];
        const content = document.getElementById(contentId);

        if (label) label.classList.add('active');
        if (content) content.style.display = 'block';
    }

    tabs.forEach(tab => {
        tab.addEventListener('click', () => {
            
            tabs.forEach(t => t.classList.remove('active'));
            contents.forEach(c => c.style.display = 'none');

            
            tab.classList.add('active');

            // 対応するコンテンツを表示
            const inputId = tab.getAttribute('for');
            const contentId = tabToContent[inputId];
            const targetContent = document.getElementById(contentId);
            if (targetContent) {
                targetContent.style.display = 'block';
            }
        });
    });
});