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
    <form action="{{route('admin.posts.store')}}" method="POST">
        @csrf
        @method('POST')
        <input type="text" name="title" id="title" placeholder="Insert title">
        <textarea name="body" id="body" cols="40" rows="15" placeholder="Insert body"></textarea>
        <button type="submit">Create</button>
    </form>
@endsection