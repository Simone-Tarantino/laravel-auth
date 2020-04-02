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
    <form action="{{route('admin.posts.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <input type="text" name="title" id="title" placeholder="Insert title">
        <textarea name="body" id="body" cols="40" rows="15" placeholder="Insert body"></textarea>
        @foreach ($tags as $tag)
        <span>{{$tag->name}}</span>
        <input type="checkbox" name="tags[]" value="{{$tag->id}}">
        @endforeach
        <input type="file" name="img_path" accept="image/*">
        <select name="published">
            <option value="0">Unpublished</option>
            <option value="1">Published</option>
        </select>
        <button type="submit">Create</button>
    </form>
@endsection