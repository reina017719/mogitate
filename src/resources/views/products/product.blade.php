@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/product.css') }}">
@endsection

@section('content')
<div class="product__content">
    <div class="product-list">
        <a class="product-list__button" href="/products">商品一覧</a> &gt; {{ $product->name }}
    </div>
    <form class="product-form" action="/products/update" method="post" enctype="multipart/form-data">
        @method('patch')
        @csrf
        <input type="hidden" name="id" value="{{ $product->id }}">
        <div class="form-section">
            <div class="product__image-area">
            <img class="product-image" src="{{ asset($product->image) }}" alt="キウイ画像" >
                <div>
                    <label class="file-label">ファイルを選択
                        <input type="file" name="image" class="file-input">
                    </label>
                    <span class="file-name">{{ basename($product->image) }}</span>
                </div>
                @if ($errors->has('image'))
                    <div class="validate">{{ $errors->first('image') }}</div>
                @endif
            </div>
            <div class="product__info">
                <div class="form-group">
                    <label class="product__label">商品名</label>
                    <input type="text" id="name" name="name" value="{{ $product->name }}" placeholder="商品名を入力">
                </div>
                @if ($errors->has('name'))
                    <div class="validate">{{ $errors->first('name') }}</div>
                @endif
                <div class="form-group">
                    <label class="product__label">値段</label>
                    <input type="text" id="price" name="price" value="{{ $product->price }}" placeholder="値段を入力">
                </div>
                @if ($errors->has('price'))
                    <div class="validate">{{ $errors->first('price') }}</div>
                @endif
                <div class="form-group">
                    <label class="product__label">季節</label>
                    <div class="season-tags">
                        <label class="product__label">
                            <input type="checkbox" name="season[]" value="1" id="season_1" {{ in_array(1, $selectedSeasons) ? 'checked' : '' }}> 春
                        </label>
                        <label class="product__label">
                            <input type="checkbox" name="season[]" value="2" id="season_2" {{ in_array(2, $selectedSeasons) ? 'checked' : '' }}> 夏
                        </label>
                        <label class="product__label">
                            <input type="checkbox" name="season[]" value="3" id="season_3" {{ in_array(3, $selectedSeasons) ? 'checked' : '' }}> 秋
                        </label>
                        <label class="product__label">
                            <input type="checkbox" name="season[]" value="4" id="season_4" {{ in_array(4, $selectedSeasons) ? 'checked' : '' }}> 冬
                        </label>
                    </div>
                    @if ($errors->has('season'))
                    <div class="validate">{{ $errors->first('season') }}</div>
                @endif
                </div>
            </div>
        </div>
        <div class="form-group__textarea">
            <label class="product__label">商品説明</label>
            <textarea class="" rows="5" name="description" placeholder="商品の説明を入力">{{ $product->description }}</textarea>
            @if ($errors->has('description'))
                <div class="validate">{{ $errors->first('description') }}</div>
            @endif
        </div>
        <div class="form__button">
            <div class="form__button--inner">
                <a class="return__button-submit" href="/products">戻る</a>
                <button class="save-button">変更を保存</button>
            </div>
        </div>
    </form>
    <form action="{{ route('products.destroy', $product->id) }}" method="post" style="display: inline;">
        @method('delete')
        @csrf
        <button class="delete-button">🗑</button>
    </form>
</div>
@endsection