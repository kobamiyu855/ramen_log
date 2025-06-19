@extends('layouts.app')

@section('content')
<div class="container mt-4">
   <div class="d-flex align-items-center justify-content-between mb-3">
  <div>
    <h2 class="mb-0">新着ラーメン</h2>
  </div>
  <div>
    @if (session('success'))
    <div id="success-alert" class="alert alert-success alert-dismissible fade show mb-0" role="alert">
      {{ session('success') }}
    </div>
    @endif
  </div>
  <div>
    {{ $ramens->links() }}
  </div>
</div>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach ($ramens as $ramen)
        <div class="col">
            <div class="card h-100">
                {{-- 画像 --}}
                @if ($ramen->image_path)
                    <img src="{{ asset('storage/images/' . $ramen->image_path) }}" class="card-img-top" style="height: 200px; object-fit: cover;" alt="ラーメン画像">
                @else
                    <img src="{{ asset('storage/appimages/no-image.png') }}" class="card-img-top" style="height: 200px; object-fit: cover;" alt="No Image">
                @endif

                {{-- テキスト情報 --}}
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $ramen->shop_name }}  
                    @if ($ramen->is_recommended)
                        <span class="badge bg-danger">おすすめ！</span>
                    @endif</h5>
                    <p class="card-text">{{ Str::limit($ramen->review, 80) }}</p>
                    <p class="card-text">
                        <small class="text-muted">
                            {{ $ramen->ate_on->format('Y年n月j日') }}｜{{ $ramen->prefecture_name }}
                        </small>
                    </p>

                  

                   <div class="mt-auto text-end d-flex justify-content-end gap-2">
   <button class="btn btn-sm btn-light btn-detail" data-id="{{ $ramen->id }}">詳細</button>

</div>

                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="mt-4">
    {{ $ramens->links() }}
    </div>

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



</div>
@endsection
