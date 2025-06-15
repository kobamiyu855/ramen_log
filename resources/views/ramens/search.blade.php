@extends('layouts.app')

@section('content')
<div class="container w-50">
<h2>「{{ $keyword ?? '' }}」の検索結果</h2>
@if ($ramens->isEmpty())
    <p>該当するラーメンは見つかりませんでした。</p>
@else
{{ $ramens->links() }}
    <ul class="list-group">
    @foreach ($ramens as $ramen)
        <li class="list-group-item mb-3">
            <div class="d-flex align-items-center">
                <!-- 画像部分 -->
                @if ($ramen->image_path)
                <img src="{{ asset('storage/images/' . $ramen->image_path) }}"
                     alt="ラーメン画像"
                     class="me-4 rounded"
                     style="width: 200px; height: 150px; object-fit: cover;">
                @else
                <img src="{{ asset('storage/appimages/no-image.png') }}"
                alt="ラーメン画像"
                     class="me-4 rounded"
                     style="width: 200px; height: 150px; object-fit: cover;">
                @endif
                <!-- テキスト部分 -->
                <div class="w-100">
                    <h5 class="mb-1">{{ $ramen->shop_name }}</h5>
                    <small class="text-muted">
                        {{ config('prefectures')[$ramen->prefecture_name] ?? $ramen->prefecture_name }}
                        ・{{ $ramen->ate_on->format('Y年n月j日') }}
                    </small>
                    <p class="mt-2">{{ $ramen->review }}</p>
            
                {{-- 編集・削除ボタン --}}
                <div class="d-flex justify-content-end mt-3 gap-2">
                      @if ($ramen->is_recommended)
                        <span class="badge bg-warning text-dark">★おすすめ！</span>
                      @endif
                <a href="{{ route('ramens.edit', $ramen->id) }}" class="btn btn-sm btn-outline-primary">編集</a>

                <form action="{{ route('ramens.destroy', $ramen->id) }}" method="POST" onsubmit="return confirm('本当に削除しますか？');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-outline-danger">削除</button>
                </form>
            
            </div>
        </li>
        @endforeach
    </ul>
    @endif
</div>
{{ $ramens->links() }}
@endsection