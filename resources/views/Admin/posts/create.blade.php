@extends('layouts.app')

@section('content')
    <form action="{{route('admin.posts.store')}}" method="POST">
        @csrf
        @method('POST')
        <input type="text" name="title" id="title" placeholder="Insert title">
        <textarea name="content" id="content" cols="40" rows="15" placeholder="Insert body"></textarea>
        <button type="submit">Create</button>
    </form>
@endsection