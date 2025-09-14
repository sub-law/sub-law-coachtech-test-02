@extends('layouts.app')

@section('title', '検索結果')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="product-page">
    
    <div class="top-bar">
        <h2 class="page-title">"○○の"商品一覧</h2>
        <button class="add-button">+ 商品を追加</button>
    </div>

    
    <div class="sidebar">
        <input type="text" placeholder="商品名で検索" class="search-input">
        <button class="search-button">検索</button>
        <label for="sort-select">価格順で表示</label>
        <select id="sort-select" class="sort-select">
            <option value="asc">昇順</option>
            <option value="desc">降順</option>
        </select>
    </div>

    
    <div class="product-grid">
        @for ($i = 0; $i < 6; $i++)
            <div class="product-card">
            <div class="image-placeholder -simple">No Image</div>
                <div class="product-info">
                    <p class="product-name">商品名</p>
                    <p class="product-price">¥0</p>
                </div>
            </div>
        @endfor
    </div>
</div>
@endsection