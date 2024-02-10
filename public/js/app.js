
/* child.create */

//画像のプレビューを行う関数
function previewImage(input) {
  var labelImagePreview = document.getElementById('label-image-preview');
  var additionalText = document.getElementById('additional-text');

// 選択されたファイル要素を取得
  var file = input.files[0];
  var reader = new FileReader();

// ファイルの読み込みが完了したときの処理
reader.onloadend = function () {

    // プレビュー用の画像要素にファイルの内容をセット
    labelImagePreview.src = reader.result;

    // 画像プレビューのスタイルを設定
    labelImagePreview.style.display = "inline-block";
    labelImagePreview.style.width = "100%";
    labelImagePreview.style.height = "100%";
    labelImagePreview.style.borderRadius ="50%";
    additionalText.style.display = "none";
}

// ファイルが存在する場合はファイルを読み込む
if (file) {
    reader.readAsDataURL(file);
}else {
    // ファイルが存在しない場合非表示にする
    labelImagePreview.style.display="none";
    additionalText.style.display = "inline-block";
}

}

/* food.create */

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


    