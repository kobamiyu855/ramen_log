@extends('layouts.app')

@section('content')
<div class="container w-50">
    <h2>マイリスト</h2>
    @if ($ramens->isEmpty())
        <p>登録されたラーメンはありません。</p>
    @else
    @include('ramens.partials.ramen-list', ['ramens' => $ramens])
    @endif
</div>
@endsection
