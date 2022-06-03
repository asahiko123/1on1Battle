@extends('layouts.layout')

@section('content')
<div class="loginPage">
        <div class="loading" id="loader">

        </div>
    <div class="container slide">

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
