@extends('layouts.app')
@push('css')
<link rel="stylesheet" href="{{ asset('css/mapstyle.css') }}">
@endpush
@section('content')
<section class="container">

<div class="row flex-column flex-md-row">
<div class="col-md-8">
<b>現在の総登録件数 {{ $totalCount }}件</b>
{{-- 左：地図 --}}
<div id="japan-map" class="clearfix">
<div id="hokkaido-touhoku" class="clearfix">
	<p class="area-title">北海道・東北</p>
	<div class="area">
		<a href="{{ route('ramens.map', ['prefecture' => '北海道']) }}">
        	<div id="hokkaido">
        		<p>北海道<br>
				{{ $prefectureCounts['北海道']??0 }}</p>
          	</div>
		</a>
		<a href="{{ route('ramens.map', ['prefecture' => '青森県']) }}">
			<div id="aomori">
				<p>青森
				{{ $prefectureCounts['青森県']??0 }}</p>
			</div>
		</a>
		<a href="{{ route('ramens.map', ['prefecture' => '秋田県']) }}">
			<div id="akita">
				<p>秋田
				{{ $prefectureCounts['秋田県']??0 }}</p>
			</div>
		</a>
		<a href="{{ route('ramens.map', ['prefecture' => '岩手県']) }}">
			<div id="iwate">
				<p>岩手
				{{ $prefectureCounts['岩手県']??0 }}</p>
			</div>
		</a>
		<a href="{{ route('ramens.map', ['prefecture' => '山形県']) }}">
			<div id="yamagata">
				<p>山形
				{{ $prefectureCounts['山形県']??0 }}</p>
			</div>
		</a>
		<a href="{{ route('ramens.map', ['prefecture' => '宮城県']) }}">
			<div id="miyagi">
				<p>宮城{{ $prefectureCounts['宮城県']??0 }}</p>
			</div>
		</a>
		<a href="{{ route('ramens.map', ['prefecture' => '福島県']) }}">
			<div id="fukushima">
				<p>福島{{ $prefectureCounts['福島県']??0 }}</p>
			</div>
		</a>
	</div>
</div>

<div id="kantou">
	<p class="area-title">関東</p>
	<div class="area">
		<a href="{{ route('ramens.map', ['prefecture' => '群馬県']) }}">
			<div id="gunma">
				<p>群馬
				{{ $prefectureCounts['群馬県']??0 }}</p>
			</div>
		</a>
		<a href="{{ route('ramens.map', ['prefecture' => '栃木県']) }}">
			<div id="tochigi">
				<p>栃木{{ $prefectureCounts['栃木県']??0 }}</p>
			</div>
		</a>
		<a href="{{ route('ramens.map', ['prefecture' => '茨城県']) }}">
			<div id="ibaraki">
				<p>茨城{{ $prefectureCounts['茨城県']??0 }}</p>
			</div>
		</a>
		<a href="{{ route('ramens.map', ['prefecture' => '埼玉県']) }}">
			<div id="saitama">
				<p>埼玉{{ $prefectureCounts['埼玉県']??0 }}</p>
			</div>
		</a>
		<a href="{{ route('ramens.map', ['prefecture' => '千葉県']) }}">
			<div id="chiba">
				<p>千葉{{ $prefectureCounts['千葉県']??0 }}</p>
			</div>
		</a>
		<a href="{{ route('ramens.map', ['prefecture' => '東京都']) }}">
			<div id="tokyo">
				<p>東京{{ $prefectureCounts['東京都']??0 }}</p>
			</div>
		</a>
		<a href="{{ route('ramens.map', ['prefecture' => '神奈川県']) }}">
			<div id="kanagawa">
				<p>神奈川{{ $prefectureCounts['神奈川県']??0 }}</p>
			</div>
		</a>
	</div>
</div>

<div id="tyubu" class="clearfix">
	<p class="area-title">中部</p>
	<div class="area">
		<a href="{{ route('ramens.map', ['prefecture' => '新潟県']) }}">
			<div id="nigata">
				<p>新潟{{ $prefectureCounts['新潟県']??0 }}</p>
			</div>
		</a>
		<a href="{{ route('ramens.map', ['prefecture' => '富山県']) }}">
			<div id="toyama">
				<p>富山{{ $prefectureCounts['富山県']??0 }}</p>
			</div>
		</a>
		<a href="{{ route('ramens.map', ['prefecture' => '石川県']) }}">
			<div id="ishikawa">
				<p>石川
				{{ $prefectureCounts['石川県']??0 }}</p>
			</div>
		</a>
		<a href="{{ route('ramens.map', ['prefecture' => '福井県']) }}">
			<div id="fukui">
				<p>福井{{ $prefectureCounts['福井県']??0 }}</p>
			</div>
		</a>
		<a href="{{ route('ramens.map', ['prefecture' => '長野県']) }}">
			<div id="nagano">
				<p>長野{{ $prefectureCounts['長野県']??0 }}</p>
			</div>
		</a>
		<a href="{{ route('ramens.map', ['prefecture' => '岐阜県']) }}">
			<div id="gifu">
				<p>岐阜{{ $prefectureCounts['岐阜県']??0 }}</p>
			</div>
		</a>
		<a href="{{ route('ramens.map', ['prefecture' => '山梨県']) }}">
			<div id="yamanashi">
				<p>山梨{{ $prefectureCounts['山梨県']??0 }}</p>
			</div>
		</a>
		<a href="{{ route('ramens.map', ['prefecture' => '愛知県']) }}">
			<div id="aichi">
				<p>愛知{{ $prefectureCounts['愛知県']??0 }}</p>
			</div>
		</a>
		<a href="{{ route('ramens.map', ['prefecture' => '静岡県']) }}">
			<div id="shizuoka">
				<p>静岡{{ $prefectureCounts['静岡県']??0 }}</p>
			</div>
		</a>
	</div>
</div>

<div id="kinki" class="clearfix">
	<p class="area-title">近畿</p>
	<div class="area">
		<a href="{{ route('ramens.map', ['prefecture' => '京都府']) }}">
			<div id="kyoto">
				<p>京都{{ $prefectureCounts['京都府']??0 }}</p>
			</div>
		</a>
		<a href="{{ route('ramens.map', ['prefecture' => '滋賀県']) }}">
			<div id="shiga">
				<p>滋賀{{ $prefectureCounts['滋賀県']??0 }}</p>
			</div>
		</a>
		<a href="{{ route('ramens.map', ['prefecture' => '大阪府']) }}">
			<div id="osaka">
				<p>大阪{{ $prefectureCounts['大阪府']??0 }}</p>
			</div>
		</a>
		<a href="{{ route('ramens.map', ['prefecture' => '奈良県']) }}">
			<div id="nara">
				<p>奈良{{ $prefectureCounts['奈良県']??0 }}</p>
			</div>
		</a>
		<a href="{{ route('ramens.map', ['prefecture' => '三重県']) }}">
			<div id="mie">
				<p>三重{{ $prefectureCounts['三重県']??0 }}</p>
			</div>
		</a>
		<a href="{{ route('ramens.map', ['prefecture' => '和歌山県']) }}">
			<div id="wakayama">
				<p>和歌山{{ $prefectureCounts['和歌山県']??0 }}</p>
			</div>
		</a>
		<a href="{{ route('ramens.map', ['prefecture' => '兵庫県']) }}">
			<div id="hyougo">
				<p>兵庫{{ $prefectureCounts['兵庫県']??0 }}</p>
			</div>
		</a>
	</div>
</div>

<div id="tyugoku" class="clearfix">
	<p class="area-title">中国</p>
	<div class="area">
		<a href="{{ route('ramens.map', ['prefecture' => '鳥取県']) }}">
			<div id="tottori">
				<p>鳥取{{ $prefectureCounts['鳥取県']??0 }}</p>
			</div>
		</a>
		<a href="{{ route('ramens.map', ['prefecture' => '岡山県']) }}">
			<div id="okayama">
				<p>岡山{{ $prefectureCounts['岡山県']??0 }}</p>
			</div>
		</a>
		<a href="{{ route('ramens.map', ['prefecture' => '島根県']) }}">
			<div id="shimane">
				<p>島根{{ $prefectureCounts['島根県']??0 }}</p>
			</div>
		</a>
		<a href="{{ route('ramens.map', ['prefecture' => '広島県']) }}">
			<div id="hiroshima">
				<p>広島{{ $prefectureCounts['広島県']??0 }}</p>
			</div>
		</a>
		<a href="{{ route('ramens.map', ['prefecture' => '山口県']) }}">
			<div id="yamaguchi">
				<p>山口{{ $prefectureCounts['山口県']??0 }}</p>
			</div>
		</a>
	</div>
</div>

<div id="shikoku" class="clearfix">
	<p class="area-title">四国</p>
	<div class="area">
		<a href="{{ route('ramens.map', ['prefecture' => '香川県']) }}">
			<div id="kagawa">
				<p>香川{{ $prefectureCounts['香川県']??0 }}</p>
			</div>
		</a>
		<a href="{{ route('ramens.map', ['prefecture' => '愛媛県']) }}">
			<div id="ehime">
				<p>愛媛{{ $prefectureCounts['愛媛県']??0 }}</p>
			</div>
		</a>
		<a href="{{ route('ramens.map', ['prefecture' => '徳島県']) }}">
			<div id="tokushima">
				<p>徳島{{ $prefectureCounts['徳島県']??0 }}</p>
			</div>
		</a>
		<a href="{{ route('ramens.map', ['prefecture' => '高知県']) }}">
			<div id="kouchi">
				<p>高知{{ $prefectureCounts['高知県']??0 }}</p>
			</div>
		</a>
	</div>
</div>

<div id="kyusyu" class="clearfix">
	<p class="area-title">九州・沖縄</p>
	<div class="area">
		<a href="{{ route('ramens.map', ['prefecture' => '福岡県']) }}">
			<div id="fukuoka">
				<p>福岡{{ $prefectureCounts['福岡県']??0 }}</p>
			</div>
		</a>
		<a href="{{ route('ramens.map', ['prefecture' => '佐賀県']) }}">
			<div id="saga">
				<p>佐賀{{ $prefectureCounts['佐賀県']??0 }}</p>
			</div>
		</a>
		<a href="{{ route('ramens.map', ['prefecture' => '長崎県']) }}">
			<div id="nagasaki">
				<p>長崎{{ $prefectureCounts['長崎県']??0 }}</p>
			</div>
		</a>
		<a href="{{ route('ramens.map', ['prefecture' => '大分県']) }}">
			<div id="oita">
				<p>大分{{ $prefectureCounts['大分県']??0 }}</p>
			</div>
		</a>
		<a href="{{ route('ramens.map', ['prefecture' => '熊本県']) }}">
			<div id="kumamoto">
				<p>熊本{{ $prefectureCounts['熊本県']??0 }}</p>
			</div>
		</a>
		<a href="{{ route('ramens.map', ['prefecture' => '宮崎県']) }}">
			<div id="miyazaki">
				<p>宮崎{{ $prefectureCounts['宮崎県']??0 }}</p>
			</div>
		</a>
		<a href="{{ route('ramens.map', ['prefecture' => '鹿児島県']) }}">
			<div id="kagoshima">
				<p>鹿児島{{ $prefectureCounts['鹿児島県']??0 }}</p>
			</div>
		</a>
		<a href="{{ route('ramens.map', ['prefecture' => '沖縄県']) }}">
			<div id="okinawa">
				<p>沖縄
				{{ $prefectureCounts['沖縄県']??0 }}</p>
			</div>
		</a>
	</div>
</div>

</div></div>
<!-- japan-map -->
{{-- 右：県別ラーメン一覧 --}}
   <div class="col-md-4">
    @isset($prefecture)
      <h2>{{ $prefecture }}のラーメン一覧（{{ $count }}件）</h2>
     {{ $ramens->links() }} 
	  <ul>
        @forelse($ramens as $ramen)
         <li class="list-group-item mb-3">
                    <div class="d-flex align-items-start">
						 @if ($ramen->image_path)
                        <img src="{{ asset('storage/images/' . $ramen->image_path) }}" alt="ラーメン画像" class="me-3 rounded flex-shrink-0" style="width: 150px; height: 100px; object-fit: cover; object-position:center;">
						@else
						<img src="{{ asset('storage/appimages/no-image.png') }}" alt="ラーメン画像" class="me-3 rounded flex-shrink-0" style="width: 150px; height: 100px; object-fit: cover; object-position:center;">
						@endif
                    	<div class="w-100">
                            <h5>{{ $ramen->shop_name }}</h5>
                            <small class="text-muted">
                                {{ config('prefectures')[$ramen->prefecture_name] ?? $ramen->prefecture_name }}
                                ・{{ $ramen->ate_on->format('Y年n月j日') }}
                            </small>
							<p class="d-flex justify-content-end"><button class="btn btn-sm btn-light btn-detail" data-id="{{ $ramen->id }}">詳細</button></p>
                        </div>
                    </div>
                </li>
        @empty
          <li>ラーメンが登録されていません。</li>
        @endforelse
      </ul>
    @else
      <p>地図から都道府県を選択してください。</p>
    
	@endisset
	
  </div>
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
        
        <p><strong>感想：</strong> <span id="modal-review"></span></p>
        
        <p><strong><i class="bi bi-house"></i>：</strong> <a id="modal-url"></a></p>  
    </div>

      <!-- フッター -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">閉じる</button>
      </div>

    </div>
  </div>
</div>


</section>
@endsection