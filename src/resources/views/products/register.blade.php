@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
<div class="register__content">
    <div class="register__inner">
        <div class="register__header">
            <h2>商品登録</h2>
        </div>
    </div>
    <div class="product__content">
        <form class="register-form" action="/register" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form__group">
                <label class="form__label--item">商品名</label>
                <span class="form__label--required">必須</span>
                <div class="form__input">
                    <input class="form__input--text" type="text" name="name" value="{{ old('name') }}" placeholder="商品名を入力">
                </div>
                @if ($errors->has('name'))
                    <div class="validate">{{ $errors->first('name') }}</div>
                @endif
            </div>
            <div class="form__group">
                <label class="form__label--item">値段</label>
                <span class="form__label--required">必須</span>
                <div class="form__input">
                    <input class="form__input--text" type="text" name="price" value="{{ old('price') }}" placeholder="値段を入力">
                </div>
                @if ($errors->has('price'))
                    <div class="validate">{{ $errors->first('price') }}</div>
                @endif
            </div>
            <div class="form__group">
                <label class="form__label--item">商品画像</label>
                <span class="form__label--required">必須</span>
                <div class="form__input">
                    <input type="file" name="image">
                </div>
                @if ($errors->has('image'))
                    <div class="validate">{{ $errors->first('image') }}</div>
                @endif
            </div>
            <div class="form__group">
                <label class="form__label--item">季節</label>
                <span class="form__label--required">必須</span>
                <span class="form__label--information">複数選択可</span>
                <div class="form__input--button">
                    <input type="checkbox" name="season[]" value=1 id="season_1">
                    <label class="form__input--button__label" for="season_1">春</label>
                    <input type="checkbox" name="season[]" value=2 id="season_2">
                    <label class="form__input--button__label" for="season_2">夏</label>
                    <input type="checkbox" name="season[]" value=3 id="season_3">
                    <label class="form__input--button__label" for="season_3">秋</label>
                    <input type="checkbox" name="season[]" value=4 id="season_4">
                    <label class="form__input--button__label" for="season_4">冬</label>
                </div>
                @if ($errors->has('season'))
                    <div class="validate">{{ $errors->first('season') }}</div>
                @endif
            </div>
            <div class="form__group">
                <label class="form__label--item">商品説明</label>
                <span class="form__label--required">必須</span>
                <textarea class="form__input--textarea" name="description" placeholder="商品の説明を入力">{{ old('description') }}</textarea>
                @if ($errors->has('description'))
                    <div class="validate">{{ $errors->first('description') }}</div>
                @endif
            </div>
            <div class="return__button">
                <a class="return__button-submit" href="/">戻る</a>
                <span class="form__button">
                    <button class="form__button-submit">登録</button>
                </span>
            </div>
        </form>
    </div>
</div>
@endsection