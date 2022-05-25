@extends('layouts.app_admin')

@section('content')
<div class="signupPage">

    <form class="form mt-5" method="POST" action="{{ route('candy.update',[$candy->id])}}">
        @csrf

        @error('candy')
        <span class="errorMessage">
            {{ $message }}
        </span>
        @enderror

        <div class="form-group">
            <label>名前</label>
            <input type="text" name="name" class="form-control"value="{{$candy->name}}">
        </div>

        <div class="form-group">
            <label>メーカー</label>
            <input type="text" name="maker" class="form-control" value="{{$candy->maker}}">
        </div>

        <div class="form-group">
            <label>URL</label>
            <input type="text" name="url" class="form-control" value="{{$candy->url}}">
        </div>

        <div class="form-group">
            <label>飴のタグ</label>
            <input type="text" name="tag" class="form-control"placeholder="#で区切って入力してください例(#濃い味#さっぱり)" value="{{$candy->tag}}">
        </div>

      <div class="text-center">
      <button type="submit" class="btn submitBtn">変更する</button>
      </div>
    </form>
  </div>
</div>
@endsection
