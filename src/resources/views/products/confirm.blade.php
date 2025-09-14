@extends('layouts.app')

@section('title', '商品確認')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/form.css') }}">
@endsection

@section('content')
<div class="product-page">
    <form action="{{ route('products.store') }}" method="POST" class="product-form">
        @csrf

        <h2 class="form-title">商品確認</h2>

        <div class="form-group">
            <div class="label-wrapper">
                <label>商品名</label>
            </div>
            <p>{{ $data['name'] }}</p>
            <input type="hidden" name="name" value="{{ $data['name'] }}">
        </div>

        <div class="form-group">
            <div class="label-wrapper">
                <label>値段</label>
            </div>
            <p>{{ $data['price'] }} 円</p>
            <input type="hidden" name="price" value="{{ $data['price'] }}">
        </div>

        <div class="form-group">
            <div class="label-wrapper">
                <label>商品画像</label>
            </div>
            <img src="{{ asset('storage/temp/' . $image) }}" alt="商品画像" style="max-width: 300px;">
            <input type="hidden" name="image" value="{{ $image }}">
        </div>

        <div class="form-group">
            <div class="label-wrapper">
                <label>季節</label>
            </div>
            <div class="season-selector">
                @foreach (['春', '夏', '秋', '冬'] as $season)
                <label class="season-item" for="season_{{ $season }}">
                    <input type="checkbox" id="season_{{ $season }}" name="seasons[]" value="{{ $season }}"
                        {{ in_array($season, $data['seasons']) ? 'checked' : '' }} disabled>
                    <span>{{ $season }}</span>
                </label>
                @endforeach
                @foreach ($data['seasons'] as $season)
                <input type="hidden" name="seasons[]" value="{{ $season }}">
                @endforeach
            </div>
        </div>

        <div class="form-group">
            <div class="label-wrapper">
                <label>商品説明</label>
            </div>
            <p>{{ $data['description'] }}</p>
            <input type="hidden" name="description" value="{{ $data['description'] }}">
        </div>

        <div class="form-buttons">
            <a href="{{ route('products.create') }}" class="back-button">修正する</a>
            <button type="submit" class="submit-button">登録する</button>
        </div>
    </form>
</div>
@endsection