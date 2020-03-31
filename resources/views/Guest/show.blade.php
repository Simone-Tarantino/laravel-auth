@extends('layouts.app')

@section('content')
<div class="card text-center">
    <div class="card-header">
        Writer ID: {{$post->user_id}}, Post ID: {{$post->id}}
    </div>
    <div class="card-body">
        <h5 class="card-title">{{$post->title}}</h5>
        <p class="card-text">{{$post->body}}</p>
    </div>
    <div class="card-footer text-muted">
        Created At: {{$post->created_at}}, Updated At: {{$post->updated_at}}
    </div>
</div>

<h3>Comments</h3>
@forelse ($post->comments as $comment)
<div class="card text-center">
  <div class="card-header">
    {{$comment->email}}
  </div>
  <div class="card-body">
    <h5 class="card-title">{{$comment->name}}</h5>
    <p class="card-text">{{$comment->body}}</p>
  </div>
  <div class="card-footer text-muted">
    {{$comment->created_at}}
  </div>
</div>
@empty
    <p>No comments</p>
@endforelse

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{route('comments.store')}}" method="post">
    @csrf
    @method('POST')
    <label for="name">Name:</label>
    <input type="text" name="name">
    <label for="email">Email:</label>
    <input type="text" name="email">
    <label for="body">Body</label>
    <input type="text" name="body">
    <button type="submit">Send</button>
    <input type="hidden" name="post_id" value='{{$post->id}}'>
</form>
@endsection