@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="product__content">
    <div class="product__inner">
        <div class="product__header">
            <h2>商品一覧</h2>
        </div>
        <div class="add-form__item">
            <a class="add-form__item-submit" href="/products/register">+ 商品を追加</a>
        </div>
    </div>
    <div class="product-content__main">
        <aside class="aside__content">
            <form class="search-form" action="{{ route('products.search') }}" method="get">
                <div class="search-form__item">
                    <input class="search-form__item-input" type="text" name="keyword" value="{{ $keyword ?? '' }}" placeholder="商品名で検索">
                </div>
                <div class="search-form__button">
                    <button class="search-form__button-submit" type="submit">検索</button>
                </div>
            </form>
        </aside>
        <div class="product-content__list">
            <div class="product-card">
                @foreach ($products as $product)
                <a class="product-card__image" href="/products/{{ $product->id }}">
                    <img src="{{ asset($product->image) }}" alt="商品画像" style="max-width: 250px;">
                    <div class="product-info">
                        <span type="name">{{ $product->name }}</span>
                        <span type="text" name="price">¥{{ number_format($product->price) }}</span>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection