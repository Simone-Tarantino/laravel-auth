@extends('layouts.app')

@section('content')
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form action="{{route('admin.posts.update', $post)}}" method="POST">
        @csrf
        @method('PATCH')
        <input type="text" name="title" id="title" placeholder="Insert title" value="{{$post->title}}">
        <textarea name="body" id="body" cols="40" rows="15" placeholder="Insert body">{{$post->body}}</textarea>
        @foreach ($tags as $tag)
        <span>{{$tag->name}}</span>
        <input type="checkbox" name="tags[]" value="{{$tag->id}}" {{($post->tags->contains($tag->id)) ? 'checked' : ''}}>
        @endforeach
        <button type="submit">Save</button>
    </form>
@endsection