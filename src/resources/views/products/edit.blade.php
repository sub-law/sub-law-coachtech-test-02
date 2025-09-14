@extends('layouts.app')

@section('title', '商品詳細')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/edit.css') }}">
@endsection

@section('content')

@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif


<form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="product-detail">

        <div class="product-image">
            <div class="top-bar">
                <a href="{{ route('products.index') }}" class="top-left-link">商品一覧 ></a>
                <p class="product-title">{{ $product->name }}</p>
            </div>

            @error('image')
            <p class="form-error">{{ $message }}</p>
            @enderror
            @if(Str::startsWith($product->image, 'storage/'))
            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="product-image">
            @else
            <img src="{{ asset('storage/images/' . $product->image) }}" alt="{{ $product->name }}" class="product-image">
            @endif

            <div class="upload-area">
                <label for="image" class="custom-file-label"></label>
                <input type="file" id="image" name="image" accept="image/*" class="custom-file-input">
            </div>
        </div>

        <div class="product-info-form">
            <label for="name">商品名</label>
            <input type="text" id="name" name="name" value="{{ old('name', $product->name) }}">
            @error('name')
            <p class="form-error">{{ $message }}</p>
            @enderror

            <label for="price">値段</label>
            <input type="text" id="price" name="price" value="{{ old('price', $product->price) }}">
            @error('price')
            <p class="form-error">{{ $message }}</p>
            @enderror

            <label>季節</label>
            <div class="season-item">
                @foreach(['春', '夏', '秋', '冬'] as $season)
                <label>
                    <input type="checkbox" name="seasons[]" value="{{ $season }}"
                        {{ in_array($season, old('seasons', $product->seasons->pluck('name')->toArray())) ? 'checked' : '' }}>
                    {{ $season }}
                </label>
                @endforeach
            </div>
            @error('seasons')
            <p class="form-error">{{ $message }}</p>
            @enderror

        </div>

        <div class="product-description">
            <label for="description">商品説明</label>
            <textarea id="description" name="description" rows="5">{{ old('description', $product->description) }}</textarea>
            @error('description')
            <p class="form-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="button-row">
            <div class="product-buttons">
                <div class="center-buttons">
                    <a href="{{ route('products.index') }}" class="back-button">戻る</a>
                    <button type="submit" class="edit-button">編集</button>

                </div>
            </div>
        </div>
</form>

<div class="button-row">
    <div class="delete-button-wrapper">
        <form action="{{ route('products.delete', $product->id) }}" method="POST" onsubmit="return confirm('本当に削除しますか？');" class="delete-form">
            @csrf
            @method('DELETE')
            <button type="submit" class="delete-button">
                <i class="fa fa-trash"></i>
            </button>
        </form>
    </div>
</div>

@endsection