 <ul class="list-group">
    @foreach ($ramens as $ramen)
        <li class="list-group-item mb-3">
            <div class="d-flex flex-column flex-md-row align-items-center">
                
            <!-- 画像部分 -->
                 @if ($ramen->image_path)
                <img src="{{ asset('storage/images/' . $ramen->image_path) }}"
                     alt="ラーメン画像"
                     class="me-4 rounded flex-shrink-0"
                     style="width: 200px; height: 150px; object-fit: cover; object-position:center;">
                @else
                <img src="{{ asset('storage/appimages/no-image.png') }}"
                alt="ラーメン画像"
                     class="me-4 rounded flex-shrink-0"
                     style="width:100%; max-width: 200px; height: 150px; object-fit: cover; object-position:center;">
                @endif

                <!-- テキスト部分 -->
                <div class="w-100">
                    <h5 class="my-1">{{ $ramen->shop_name }}</h5>
                    <small class="text-muted">
                        {{ config('prefectures')[$ramen->prefecture_name] ?? $ramen->prefecture_name }}
                        ・{{ $ramen->ate_on->format('Y年n月j日') }}
                    </small>
                    <p class="mt-2">{{ $ramen->review }}</p>
                {{-- おすすめがある場合は表示 --}}
                <div class="d-flex justify-content-end mt-3 gap-2">
                      @if ($ramen->is_recommended)
                        <span class="badge bg-danger pt-2">おすすめ！</span>
                      @endif
                {{-- ユーザが投稿したラーメンのみ編集・削除ボタンを表示 --}} 
                @if ($ramen->user->id === Auth::id())
                <a href="{{ route('ramens.edit', $ramen->id) }}" class="btn btn-sm btn-outline-primary">編集</a>
                <form action="{{ route('ramens.destroy', $ramen->id) }}" method="POST" onsubmit="return confirm('本当に削除しますか？');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-outline-danger">削除</button>
                </form>
                @endif
            </div>
        </li>
        @endforeach
    </ul>
    {{ $ramens->links() }}
