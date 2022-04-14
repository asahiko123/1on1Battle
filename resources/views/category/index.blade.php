@extends('layouts.app_admin')

@section('content')
<div class="signupPage">

    <form class="form mt-5" method="POST" action="{{ route('category.store')}}">
        @csrf

        @error('category')
        <span class="errorMessage">
            {{ $message }}
        </span>
        @enderror

      <div class="form-group">
        <label>カテゴリー</label>
        <input type="text" name="category" class="form-control">
      </div>

      <div class="text-center">
      <button type="submit" class="btn submitBtn">登録する</button>
      </div>
    </form>

    <table class="table">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">カテゴリー</th>
            <th></th>
            <th></th>
          </tr>
        </thead>
      <tbody>
          @foreach($categories as $category)
          <tr>
              <td> {{$category->id}}</td>
              <td> {{$category->category}}</td>
              <td><button class="btn btn-success text-nowrap" onclick="location.href='{{ route('category.edit',['id'=> $category->id])}}'">編集</button></td>
              <td>
                <form method="POST" action="{{route('category.destroy',['id'=> $category->id])}}">
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