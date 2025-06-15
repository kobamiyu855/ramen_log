@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">新着ラーメン</h2>
     <div class="mt-4 d-flex justify-content-end">
    {{ $ramens->links() }}
    </div>
    @if (session('success'))
    <div class="alert alert-success alert-dismissible" role="alert">
        {{ session('success') }}
    </div>
    @endif
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
      <div class="modal-header">
        <h5 class="modal-title" id="ramenModalLabel">ラーメン詳細</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
      </div>

      <!-- 本文 -->
      <div class="modal-body">
        <p><strong>店名：</strong> <span id="modal-shop_name"></span></p>
        <img id="modal-image" style="width: 200px; height: 150px; object-fit: cover; object-position:center;"></p>
        <p><strong>日付：</strong> <span id="modal-date"></span></p>
        <p><strong>住所：</strong> <span id="modal-prefecture"></span></p>
        <p><strong>感想：</strong> <span id="modal-review"></span></p>
        <p><strong>おすすめ：</strong> <span id="modal-recommend"></span></p>
        <p><strong>URL：</strong> <span id="modal-url"></span></p>  
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
