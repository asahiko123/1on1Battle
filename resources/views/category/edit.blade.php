@extends('layouts.app_admin')

@section('content')
<div class="signupPage">

    <form class="form mt-5" method="POST" action="{{ route('category.update',[$category->id])}}">
        @csrf

        @error('category')
        <span class="errorMessage">
            {{ $message }}
        </span>
        @enderror

      

      <div class="form-group">
        <label>カテゴリー</label>
        <input type="text" name="category" class="form-control" value="{{$category->category}}">
      </div>

      <div class="text-center">
      <button type="submit" class="btn submitBtn">変更する</button>
      </div>
    </form>
  </div>
</div>
@endsection
