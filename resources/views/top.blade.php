@extends('layouts.app')

@section('content')
<div class="loginPage">
    <div class="container">
        <div class="loginPage_contents">
            <h1 class="h3 loginPage_contents_title">飴ちゃんセレクター</h1>
            <p>いま、あなたに必要な飴ちゃんは何かね？</p>
            <div class="btn loginPage_contents_btn">
                <a href="{{route('questions.index')}}" class="text-white">はじめる</a>
            </div>
        </div>
    </div>
</div>
@endsection
