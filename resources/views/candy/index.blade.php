@extends('layouts.app_admin')

@section('content')
<div class="signupPage">

    <form class="form mt-5" method="POST" action="{{ route('candy.store')}}">
        @csrf

        @error('candy')
        <span class="errorMessage">
            {{ $message }}
        </span>
        @enderror

      <div class="form-group">
        <label>名前</label>
        <input type="text" name="name" class="form-control">
      </div>

      <div class="form-group">
        <label>メーカー</label>
        <input type="text" name="maker" class="form-control">
      </div>

      <div class="form-group">
        <label>URL</label>
        <input type="text" name="url" class="form-control">
      </div>

      <div class="form-group">
        <label>飴のタグ</label>
        <input type="text" name="tag" class="form-control"placeholder="#で区切って入力してください例(#濃い味#さっぱり)">
      </div>

      <div class="text-center">
      <button type="submit" class="btn submitBtn">登録する</button>
      </div>
    </form>

    <table class="table">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">名前</th>
            <th scope="col">メーカー</th>
            <th scope="col">URL</th>
            <th scope="col">タグ</th>
            <th></th>
          </tr>
        </thead>
      <tbody>
        @if(isset($candies))
        @foreach($candies as $candy)
          <tr>
              <td> {{$candy->id}}</td>
              <td> {{$candy->name}}</td>
              <td> {{$candy->maker}}</td>
              <td> {{$candy->url}}</td>
              <td> {{$candy->tag}}</td>
              <td><button class="btn btn-success text-nowrap" onclick="location.href='{{ route('candy.edit',['id'=> $candy->id])}}'">編集</button></td>
              <td>
                <form method="POST" action="{{route('candy.destroy',['id'=> $candy->id])}}">
                  @csrf
                  <button type ="submit" class="btn btn-danger text-nowrap">削除</button>
                </form>
              </td>

          </tr>
        @endforeach
        @endif

      </tbody>
    </table>
  </div>
</div>
@endsection
