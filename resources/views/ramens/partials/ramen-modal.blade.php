<!-- モーダル -->
<div class="modal fade" id="ramenDetailModal" tabindex="-1" aria-labelledby="ramenModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- ヘッダー -->
      <div class="modal-header d-flex justify-content-between align-items-center">
        <h5 class="modal-title" id="ramenModalLabel"><strong><span id="modal-shop_name"></span></strong></h5>
        <div id="modal-recommend-wrapper"><span id="modal-recommend" class="badge bg-danger"></span></div>
      </div>

      <!-- 本文 -->
      <div class="modal-body">
        <p><img id="modal-image" style="width: 100%; height: 300px; object-fit: cover; object-position:center;"></p>
        <p><span id="modal-date" class="me-3"></span>|<span id="modal-prefecture"class="ms-3"></span></p>
        
        <p><span id="modal-review"></span></p>
        
        <p><strong><i class="bi bi-house"></i>：</strong> <a id="modal-url"></a></p>  
    </div>

      <!-- フッター -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">閉じる</button>
      </div>

    </div>
  </div>
</div>
