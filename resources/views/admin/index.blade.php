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
            <tbody>
                @foreach($questions as $question)
                <tr>
                    <td> {{$question->id}}</td>
                    <td> {{$question->statement}}</td>
                    <td><button class="btn btn-success text-nowrap" onclick="location.href='{{ route('questions.edit',['id'=> $question->id])}}'">編集</button></td>
                </tr>
               @endforeach
            </tbody>
          </table>
        
    </div>
</div>
@endsection
