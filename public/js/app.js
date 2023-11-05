// 選択された分量を保持する変数
var selectedQuantity = 0;

// ボックスをクリックしたときの処理
function selectQuantity(portion) {
    selectedQuantity = portion;
    updateQuantityStyle(selectedQuantity);
    updateMealAmountField(selectedQuantity);
}

// 選択された分量に応じてボックスのスタイルを更新する関数
function updateQuantityStyle(selectedQuantity) {
    const quantityOptions = document.querySelectorAll('.quantity-option');

    quantityOptions.forEach((option, index) => {
        if (index === selectedQuantity - 1) {
            option.style.backgroundColor = '#CCCC99';
        } else {
            option.style.backgroundColor = 'lightblue';
        }
    });

    // 選択された食事の分量をフォームに設定
    document.getElementById('selected_meal_amount').value = selectedQuantity + '/4';
}

// ページ読み込み時に初期スタイルを設定
window.onload = () => {
    selectQuantity(1);
};

// ボックスをクリックしたときに更新
const quantityOptions = document.querySelectorAll('.quantity-option');

quantityOptions.forEach((option, index) => {
    option.addEventListener('click', () => {
        selectQuantity(index + 1);
    });
});
