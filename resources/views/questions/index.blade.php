@extends('layouts.layout')

@section('content')
<div class="loginPage">
        <div class="sk-circle" id="loader">
            <div class="sk-circle1 sk-child"></div>
            <div class="sk-circle2 sk-child"></div>
            <div class="sk-circle3 sk-child"></div>
            <div class="sk-circle4 sk-child"></div>
            <div class="sk-circle5 sk-child"></div>
            <div class="sk-circle6 sk-child"></div>
            <div class="sk-circle7 sk-child"></div>
            <div class="sk-circle8 sk-child"></div>
            <div class="sk-circle9 sk-child"></div>
            <div class="sk-circle10 sk-child"></div>
            <div class="sk-circle11 sk-child"></div>
            <div class="sk-circle12 sk-child"></div>
        </div>
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
            <ul class="recommend"></ul>
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
