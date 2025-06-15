import './bootstrap';

// CSRFトークン
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
  }
});

//一覧からラーメン詳細を取得
$(document).on('click', '.btn-detail', function () {

console.log('ボタンクリック！');
    const ramenId = $(this).data('id');
console.log('取得したID:', ramenId);
    // Ajax通信で詳細データ取得
    $.ajax({
        url: `/ramens/${ramenId}`,  // コントローラでルート定義しておく
        method: 'GET',
        dataType: 'json',
        success: function (data) {
console.log('通信成功:', data);
            // データをモーダルに挿入
            $('#modal-shop_name').text(data.shop_name);
            $('#modal-date').text(data.ate_on);
            $('#modal-prefecture').text(data.prefecture_name);
            $('#modal-review').text(data.review);
            $('#modal-recommend').text(data.is_recomended ? 'おすすめ！' : 'ふつう');
            $('#modal-url').attr('href', data.shop_url).text(data.shop_url);

            // 画像は <img id="modal-image" /> を用意しておく
            $('#modal-image').attr('src', data.image_path);

            // モーダル表示
            $('#ramenDetailModal').modal('show');
console.log('モーダル表示実行');
        },
        error: function (xhr) {
            console.error('エラー:', xhr);
            alert('詳細情報の取得に失敗しました。');
        }
    });
});
