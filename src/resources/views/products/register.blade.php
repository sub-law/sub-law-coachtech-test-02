@extends('layouts.app')

@section('title', '商品登録')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/form.css') }}">
@endsection

@section('content')
<div class="product-page">
    <form action="{{ route('products.confirm') }}" method="POST" enctype="multipart/form-data" class="product-form">
        @csrf

        <h2 class="form-title">商品登録</h2>

        <div class="form-group">
            <div class="label-wrapper">
                <label for="name">商品名</label>
                <span class="badge-required">必須</span>
            </div>
            <input type="text" id="name" name="name" value="{{ old('name', $data['name'] ?? '') }}" placeholder="商品名を入力">

            @error('name')
            <p class="form-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <div class="label-wrapper">
                <label for="price">値段</label>
                <span class="badge-required">必須</span>
            </div>
            <input type="text" id="price" name="price" value="{{ old('price', $data['price'] ?? '') }}" placeholder="値段を入力">
            @error('price')
            <p class="form-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <div class="label-wrapper"> <label for="image">商品画像</label> <span class="badge-required">必須</span> </div> <input type="file" id="image" name="image">
            @error('image')
            <p class="form-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <div class="label-wrapper">
                <label>季節</label>
                <span class="badge-required">必須</span>
                <span class="badge-note">複数選択可</span>
            </div>
            <div class="season-selector">
                @foreach (['春', '夏', '秋', '冬'] as $season)
                <label class="season-item" for="season_{{ $season }}">
                    <input type="checkbox" id="season_{{ $season }}" name="seasons[]" value="{{ $season }}"
                        {{ in_array($season, old('seasons', $data['seasons'] ?? [])) ? 'checked' : '' }}>
                    <span>{{ $season }}</span>
                </label>
                @endforeach
                @foreach ($data['seasons'] ?? [] as $season)
                <input type="hidden" name="seasons[]" value="{{ $season }}">
                @endforeach
            </div>

            @error('seasons')
            <p class="form-error">{{ $message }}</p>
            @enderror

        </div>

        <div class="form-group">
            <div class="label-wrapper">
                <label for="description">商品説明</label>
                <span class="badge-required">必須</span>
            </div>
            <textarea id="description" name="description" rows="5" placeholder="商品の説明を入力">{{ old('description', $data['description'] ?? '') }}</textarea>
            @error('description')
            <p class="form-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-buttons">
            <a href="{{ route('products.index') }}" class="back-button">戻る</a>
            <button type="submit" class="submit-button">登録</button>
            <button type="button" class="clear-button" onclick="document.querySelector('.product-form').reset();">クリア</button>

        </div>
    </form>
</div>
@endsection