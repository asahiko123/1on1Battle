@extends('layouts.layout')

@section('content')
<div class="loginPage">
    <div class="container">

        <div id="resultForm">
            <h1>おすすめ結果</h1>
            <ul>

                <li class="recommendCandy">aaa</li>
                <li class="recommendCandy">bbbb</li>
                <li class="recommendCandy">xxx</li>

                @if(session()->exists('濃い味'))
                @foreach(Session::get('濃い味') as $candy)
                <li class="recommendCandy">{{ $candy->name }}</li>
                @endforeach
                @endif
                @if(session()->exists('フルーティー'))
                @foreach(Session::get('フルーティー') as $candy)
                <li class="recommendCandy">{{ $candy->name }}</li>
                @endforeach
                @endif
                @if(session()->exists('酸っぱい'))
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



@endsection
