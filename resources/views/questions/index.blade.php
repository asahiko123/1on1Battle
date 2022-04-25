@php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   header("Location:" . $_SERVER['PHP_SELF']);
   exit;
}

@endphp
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
        <div id="resultForm" style="display: none">
            <h1>おすすめ結果</h1>
            <ul>

                <li class="recommendCandy">aaa</li>
                <li class="recommendCandy">bbbb</li>
                <li class="recommendCandy">{{request()->fullUrl()}}</li>

                @if(session()->has('濃い味'))
                @foreach(Session::get('濃い味') as $candy)
                <li class="recommendCandy">{{ $candy->name }}</li>
                @endforeach
                @endif
                @if(session()->has('フルーティー'))
                @foreach(Session::get('フルーティー') as $candy)
                <li class="recommendCandy">{{ $candy->name }}</li>
                @endforeach
                @endif
                @if(session()->has('酸っぱい'))
                @foreach(Session::get('酸っぱい') as $candy)
                <li class="recommendCandy">{{ $candy->name }}</li>
                @endforeach
                @endif


            </ul>
            <div class="btn loginPage_contents_btn">
                <a href="{{route('questions.index')}}" class="text-white">もう一度やる</a>
            </div>

        </div>
    </div>
</div>

<script>

    var questionsNum = {{$questionsCount}};
    let tasteList = <?php echo $tasteList_json; ?>

</script>

@endsection
