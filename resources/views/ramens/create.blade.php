@extends('layouts.app')

@section('content')
<div class="container mt-5 w-100" style="max-width: 650px;">
  <h2 class="text-center mb-4">ラーメン登録</h2>
    <!--エラー表示-->
         @if(session('error'))
        <div class="alert alert-danger">
        {{ session('error') }}
        </div>
        @endif
  {{-- フォーム開始 --}}
  <form action="{{ route('ramens.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    {{-- 店名 --}}
    <div class="mb-3">
      <label for="shop_name" class="form-label">店名</label>
      <input type="text" class="form-control" id="shop_name" name="shop_name" placeholder="（例）天下一品" autocomplete="off">
        @error('shop_name')
        <div class="text-danger">{{ $message }}</div>
        @enderror 
    </div>

<div class="row mb-3">
    {{-- 食べた日 --}}
    <div class="col-md-6">
      <label for="ate_on" class="form-label">日付</label>
      <input type="date" class="form-control" id="ate_on" name="ate_on">
       @error('ate_on')
        <div class="text-danger">{{ $message }}</div>
        @enderror 
    </div>

    {{-- 都道府県セレクト --}}
    <div class="col-md-6">
      <label for="prefecture_name" class="form-label">都道府県</label>
      <select class="form-select" id="prefecture_name" name="prefecture_name">
        <option value="" selected disabled>都道府県を選択</option>
        @foreach ([
          '北海道','青森県','岩手県','宮城県','秋田県','山形県','福島県',
          '茨城県','栃木県','群馬県','埼玉県','千葉県','東京都','神奈川県',
          '新潟県','富山県','石川県','福井県','山梨県','長野県',
          '岐阜県','静岡県','愛知県','三重県',
          '滋賀県','京都府','大阪府','兵庫県','奈良県','和歌山県',
          '鳥取県','島根県','岡山県','広島県','山口県',
          '徳島県','香川県','愛媛県','高知県',
          '福岡県','佐賀県','長崎県','熊本県','大分県','宮崎県','鹿児島県','沖縄県'
        ] as $pref)
          <option value="{{ $pref }}">{{ $pref }}</option>
        @endforeach
      </select>
      @error('prefecture_name')
        <div class="text-danger">{{ $message }}</div>
      @enderror 
    </div>
  </div>
    {{-- 画像 --}}
    <div class="mb-3">
      <label for="image" class="form-label">画像</label>
      <input class="form-control" type="file" id="image" name="image" accept="image/*">
       @error('image')
        <div class="text-danger">{{ $message }}</div>
       @enderror 
    </div>

    {{-- レビュー --}}
    <div class="mb-3">
      <label for="review" class="form-label">レビュー</label>
      <textarea class="form-control" id="review" name="review" rows="3"></textarea>
       @error('review')
        <div class="text-danger">{{ $message }}</div>
       @enderror 
    </div>

     {{-- お店のURL --}}
    <div class="mb-3">
      <label for="shop_name" class="form-label">お店のHP</label>
      <input type="text" class="form-control" id="shop_url" name="shop_url" placeholder="（例）http://">
        @error('shop_url')
        <div class="text-danger">{{ $message }}</div>
        @enderror 
      </div>

    {{-- おすすめチェック --}}
    <div class="form-check mb-4 d-flex justify-content-center align-items-center">
      <input type="hidden" name="is_recommended" value="0">
      <input class="form-check-input" type="checkbox" id="is_recommended" name="is_recommended" value="1">
      <label class="form-check-label" for="is_recommended">おすすめにする</label>
       @error('is_recommended')
        <div class="text-danger">{{ $message }}</div>
       @enderror 
    </div>

    {{-- 送信ボタン --}}
    <div class="text-center">
      <button type="submit" class="btn btn-primary">登録する</button>
    </div>
  </form>
</div>
@endsection
