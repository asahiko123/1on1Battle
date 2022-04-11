@extends('layouts.app_admin')

@section('content')
<div class="signupPage">
  <header class="header">
    <div>プロフィールを編集</div>
  </header>

    <form class="form mt-5" method="POST" action="{{ route('questions.update',[$question->id])}}" enctype="multipart/form-data">
        @csrf

        @error('email')
        <span class="errorMessage">
            {{ $message }}
        </span>
        @enderror

      <label for="file_photo" class="rounded-circle userProfileImg">
        <div class="userProfileImg_description">画像をアップロード</div>
        <i class="fas fa-camera fa-3x"></i>
        <input type="file" id="file_photo" name="card_image">
      </label>

      <div class="userImgPreview" id="userImgPreview">
        <img id="thumbnail" class="userImgPreview_content" accept="image/*" src="">
        <p class="userImgPreview_text">画像をアップロード済み</p>
      </div>

      <div class="form-group">
        <label>質問文</label>
        <input type="text" name="statement" class="form-control" value="{{$question->statement}}">
      </div>

      <div class="text-center">
      <button type="submit" class="btn submitBtn">変更する</button>
      </div>
    </form>
  </div>
</div>
@endsection
