@extends('layouts.app')

@section('content')
<div class="container mt-5 w-100" style="max-width: 650px;">
    <h3>ラーメン情報の編集</h3>
     <!--エラー表示-->
         @if(session('error'))
        <div class="alert alert-danger">
        {{ session('error') }}
        </div>
        @endif

    <form method="POST" action="{{ route('ramens.update', $ramen->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- 店名 --}}
        <div class="mb-3">
            <label for="shop_name" class="form-label">店名</label>
            <input type="text" name="shop_name" class="form-control" value="{{ old('shop_name', $ramen->shop_name) }}">
            @error('shop_name')
            <div class="text-danger">{{ $message }}</div>
            @enderror         
        </div>
<div class="row mb-3">
        {{-- 食べた日 --}}
        <div class="col-md-6">
            <label for="ate_on" class="form-label">食べた日</label>
            <input type="date" name="ate_on" class="form-control" value="{{ old('ate_on', $ramen->ate_on->format('Y-m-d')) }}">
            @error('ate_on')
            <div class="text-danger">{{ $message }}</div>
            @enderror 
        </div>

            {{-- 都道府県セレクト --}}
        <div class="col-md-6">
            <label for="prefecture" class="form-label">都道府県</label>
            <select name="prefecture_name" class="form-select">
                @foreach($prefectures as $pref)
                    <option value="{{ $pref }}" {{ old('prefecture_name', $ramen->prefecture_name) === $pref ? 'selected' : '' }}>
                        {{ $pref }}
                    </option>
                @endforeach
            </select>
            @error('prefecture_name')
            <div class="text-danger">{{ $message }}</div>
            @enderror 
        </div>
</div>

        {{-- レビュー --}}
        <div class="mb-3">
            <label for="review" class="form-label">レビュー</label>
            <textarea name="review" class="form-control" rows="3">{{ old('review', $ramen->review) }}</textarea>
            @error('review')
            <div class="text-danger">{{ $message }}</div>
            @enderror 
        </div>

<div class="row mb-3">

        {{-- 現在の画像 --}}
        <div class="col-md-6">
            <label class="form-label">現在の画像</label><br>
            @if ($ramen->image_path)
                <img src="{{ asset('storage/images/' . $ramen->image_path) }}" width="200" class="mb-2">
            @else
                <p>画像は登録されていません。</p>
            @endif
        </div>

        {{-- 新しい画像をアップロード --}}
        <div class="col-md-6">
            <label for="image" class="form-label">画像を差し替える（任意）</label>
            <input type="file" name="image" class="form-control">
            @error('image')
            <div class="text-danger">{{ $message }}</div>
            @enderror 
        </div>
</div>

        {{-- 店のURL --}}
        <div class="mb-3">
            <label for="shop_url" class="form-label">店のURL</label>
            <input type="text" name="shop_url" class="form-control" value="{{ old('shop_url', $ramen->shop_url) }}">
            @error('shop_url')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>


        {{-- おすすめ --}}
        <div class="form-check mb-3">
            <input type="hidden" name="is_recommended" value="0">
            <input class="form-check-input" type="checkbox" name="is_recommended" value="1" id="is_recommended"
                {{ old('is_recommended', $ramen->is_recommended) ? 'checked' : '' }}>
            <label class="form-check-label" for="is_recommended">
                おすすめ
            </label>
        </div>

        <div class="d-flex justify-content-end"><button type="submit" class="btn btn-outline-primary">更新する</button></div>
    </form>
</div>
@endsection
