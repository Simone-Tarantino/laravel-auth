@extends('layouts.app')
@section('content')
    @foreach ($posts as $post)
        <table class="table">
            <thead>
                <th >
                    Article ID:
                </th>
                <th>
                    Title:
                </th>
                <th>
                    Writer ID:
                </th>
                <th>
                    Created At:
                </th>
                <th>
                    Updated At:
                </th>
                <th>
                    Actions:
                </th>
            </thead>
            <tbody>
                <tr>
                    <td>
                        {{$post->id}}
                    </td>
                    <td>
                        {{$post->title}}
                    </td>
                    <td>
                        {{$post->user_id}}
                    </td>
                    <td>
                        {{$post->created_at}}
                    </td>
                    <td>
                        {{$post->updated_at}}
                    </td>
                    <td>
                        <a class="btn btn-info" href="{{route('admin.posts.show', $post->slug)}}">Show</a>
                        @if (Auth::id() == $post->user_id)
                        <a class="btn btn-light" href="{{route('admin.posts.edit', $post->slug)}}">Update</a>                           
                        <form action="{{route('admin.posts.destroy', $post)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>  
                        </form>
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>
    @endforeach  
@endsection
