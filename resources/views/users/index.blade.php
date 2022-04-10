@extends('layouts.layout')

@section('content')
<div class="loginPage">
    <div class="container">
        <div class="loginPage_contents">
            <h1 class="h3 loginPage_contents_title">飴ちゃんセレクター</h1>
            @foreach($questions as $question)
                {{$question->statement}}
            @endforeach
        </div>
    </div>
</div>