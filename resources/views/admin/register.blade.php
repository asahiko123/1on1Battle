@extends('layouts.layout')

@section('content')
<div class="signupPage">
  <header class="header">
    <div>管理者アカウントを作成</div>
  </header>
  <div class='container'>

    <form class="form mt-5" method="POST" action="{{ route('admin.register') }}" enctype="multipart/form-data">
    @csrf

    <div class="form-group @error('name')has-error @enderror">
        <label>名前</label>
        <input type="name" name="name" class="form-control" placeholder="名前を入力してください">
        @error('name')
            <span class="errorMessage">
            {{ $message }}
            </span>
        @enderror
    </div>


    <div class="form-group @error('email')has-error @enderror">
    <label>メールアドレス</label>
    <input type="email" name="email" class="form-control" placeholder="メールアドレスを入力してください">
    @error('email')
        <span class="errorMessage">
            {{ $message }}
        </span>
    @enderror
    </div>

        <div class="form-group @error('password')has-error @enderror">
            <label>パスワード</label>
            <em>6文字以上入力してください</em>
            <input type="password" name="password" class="form-control" placeholder="パスワードを入力してください">
            @error('password')
                <span class="errorMessage">
                {{ $message }}
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label>確認用パスワード</label>
            <input type="password" name="password_confirmation" class="form-control" placeholder="パスワードを再度入力してください">
        </div>

        </div>

      <div class="text-center">
      <button type="submit" class="btn submitBtn">はじめる</button>
      <div class="linkToLogin">
        <a href="{{ route('admin.login.index') }}">ログインはこちら</a>
      </div>
      </div>
    </form>
  </div>
</div>
@endsection

