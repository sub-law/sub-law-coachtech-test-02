@extends('layouts.app')

@section('title', '商品一覧')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')

@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<div class="product-page">

    <div class="top-bar">
        <h2 class="page-title">商品一覧</h2>
        <a href="{{ route('products.create') }}" class="add-button">+ 商品を追加</a>

    </div>

    <div class="sidebar">
        <form method="GET" action="{{ route('products.search') }}">
            <input type="text" name="keyword" value="{{ old('keyword', $keyword ?? '') }}" placeholder="商品名で検索" class="search-input">
            <button type="submit" class="search-button">検索</button>
        </form>

        <form method="GET" action="{{ route('products.search') }}">
            <input type="hidden" name="keyword" value="{{ $keyword }}">
            <label for="sort-select">価格順で表示</label>
            <select name="sort" class="sort-select" onchange="this.form.submit()">
                <option value="" {{ $sort === null ? 'selected' : '' }}>選択してください</option>
                <option value="asc" {{ $sort === 'asc' ? 'selected' : '' }}>昇順</option>
                <option value="desc" {{ $sort === 'desc' ? 'selected' : '' }}>降順</option>
            </select>
        </form>

        @if ($sort)
        <div class="active-tag">
            {{ $sort === 'asc' ? '安い順に表示' : '高い順に表示' }}
            <a href="{{ route('products.search', ['keyword' => $keyword]) }}" class="tag-remove">×</a>
        </div>
        @endif

        <form method="GET" action="{{ route('products.index') }}">
            <button type="submit" class="reset-button">すべての検索条件をリセット</button>
        </form>

    </div>

    <div class="product-grid">
        @foreach ($products as $product)
            <a href="{{ route('products.edit', $product->id) }}" class="product-card-link">
                <div class="product-card">

                    @if(Str::startsWith($product->image, 'storage/'))
                    <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="product-image">
                    @else
                    <img src="{{ asset('storage/images/' . $product->image) }}" alt="{{ $product->name }}" class="product-image">
                    @endif
                    <div class="product-info">
                        <p class="product-name">{{ $product->name }}</p>
                        <p class="product-price">¥{{ number_format($product->price) }}</p>
                    </div>
                </div>
            </a>
        @endforeach
    </div>

    <div class="pagination">
        {{ $products->appends(['keyword' => $keyword, 'sort' => $sort])->links('pagination::bootstrap-4') }}
    </div>

</div>
@endsection