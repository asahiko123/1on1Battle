@extends('layouts.layout')

@section('content')
<div class="loginPage">
    <div class="container">
        <div id="tinderslide">
            <h1 class="h3 loginPage_contents_title">飴ちゃんセレクター</h1>
            <ul>
                @foreach($questions as $question)
                <li data-user_id="{{ $question->id }}">
                  <div class="userName">{{ $question->statement }}</div>
                  <img src=" /storage/images/{{$question->card_image }}">
                  <div class="like"></div>
                  <div class="dislike"></div>
                </li>
                @endforeach
            </ul>
            <div class="noUser">近くにお相手がいません。</div>
        </div>
    </div>
</div>