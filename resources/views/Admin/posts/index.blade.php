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
                    </td>
                </tr>
            </tbody>
        </table>
    @endforeach  
@endsection
