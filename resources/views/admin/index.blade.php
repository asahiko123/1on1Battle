@extends('layouts.app_admin')

@section('content')
<div class="home">
    <div class="container">

        <table class="table">
            <thead>
              <tr>
                <th scope="col">id</th>
                <th scope="col">質問文</th>
                <th></th>
              </tr>
            </thead>

            <form class="form mt-5" method="POST" action="{{ route('questions.store')}}" enctype="multipart/form-data">
                @csrf
        
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
                <input type="text" name="statement" class="form-control">
              </div>
        
              <div class="text-center">
              <button type="submit" class="btn btn-info">登録する</button>
              </div>
            </form>

            <tbody>
                @foreach($questions as $question)
                <tr>
                    <td> {{$question->id}}</td>
                    <td> {{$question->statement}}</td>
                    <td><button class="btn btn-success text-nowrap" onclick="location.href='{{ route('questions.edit',['id'=> $question->id])}}'">編集</button></td>
                    <td>
                      <form method="POST" action="{{route('questions.destroy',['id'=> $question->id])}}">
                        @csrf
                        <button type ="submit" class="btn btn-danger text-nowrap">削除</button>
                      </form>
                    </td>
                </tr>
               @endforeach
            </tbody>
          </table>
        
    </div>
</div>
@endsection
