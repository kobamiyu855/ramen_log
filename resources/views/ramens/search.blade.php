@extends('layouts.app')

@section('content')
<div class="container w-50">
<h2>「{{ $keyword ?? '' }}」の検索結果</h2>
@if ($ramens->isEmpty())
    <p>該当するラーメンは見つかりませんでした。</p>
@else
@include('ramens.partials.ramen-list', ['ramens' => $ramens])
@endif 
</div>  
@endsection