@extends('layouts.app')

@section('content')
<div class="container w-50">
    <h2>お気に入りラーメン一覧</h2>

    @if ($ramens->isEmpty())
        <p>お気に入り登録されたラーメンはありません。</p>
    @else
    @include('ramens.partials.ramen-list', ['ramens' => $ramens])
    @endif
</div>
@endsection