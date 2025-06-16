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

    //モーダル表示の際に前回の値をリセット
    $('#modal-recommend').text('').hide(); 

    // Ajax通信で詳細データ取得
    $.ajax({
        url: `/ramens/${ramenId}`,  // コントローラでルート定義しておく
        method: 'GET',
        dataType: 'json',
        success: function (data) {
console.log('通信成功:', data);
            // データをモーダルに挿入
            $('#modal-shop_name').text(data.shop_name);
            $('#modal-prefecture').text(data.prefecture);
            $('#modal-review').text(data.review);
            $('#modal-url').attr('href', data.shop_url).text(data.shop_url);

            // 日付整形
            const dateObj = new Date(data.date);
            const formattedDate = dateObj.toLocaleDateString('ja-JP');

            // モーダルへの出力
            $('#modal-date').text(formattedDate);


            // 画像は <img id="modal-image" /> を用意しておく
            if (!data.image_path) {
            // 画像が null または空文字ならデフォルト画像を表示
            $('#modal-image').attr('src', '/storage/appimages/no-image.png');
            } else {
            $('#modal-image').attr('src', '/storage/images/' + data.image_path);
            }

            //おすすめはnullは非表示
            if (data.is_recomended===true) {
            $('#modal-recommend').text('おすすめ！').show();
            $('#modal-recommend-wrapper').show(); // 表示する
            } else {
            $('#modal-recommend-wrapper').hide(); 
            $('#modal-recommend').hide();// 非表示にする
            }

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
