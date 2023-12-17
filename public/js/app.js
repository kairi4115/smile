// 初期の選択された食事の分量
let selectedQuantity = 0;

//選択された食事の分量を更新する関数
function selectQuantity(quantity) {
    selectedQuantity = quantity;
    updateQuantityStyle(selectedQuantity);
}

// 選択された分量に応じてスタイルを変更する
function updateQuantityStyle(selectedQuantity) {
    const quantityOptions = document.querySelectorAll('.quantity-option');

    quantityOptions.forEach((option, index) => {
        if (index === selectedQuantity - 1) {
            option.style.backgroundColor = '#cccc99';
        }else
        option.style.backgroundColor = 'lightblue'
    });

    // 選択された食事の分量をフォームに設定
    document.getElementById('selected_meal_amount').value = selectedQuantity + '/4';

}
// ページ読み込み時に初期スタイルを設定
window.onload = () => {
    selectQuantity(1);
} 

// ボックスをクリックしたときに更新
const quantityOptions = document.querySelectorAll('.quantity-option');

quantityOptions.forEach((option,index) => {
    option.addEventListener('click', () => { 
     selectQuantity(index + 1);
    });
    });
