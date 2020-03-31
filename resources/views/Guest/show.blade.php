@extends('layouts.app')

@section('content')
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
                Body:
            </th>
            <th>
                Created At:
            </th>
            <th>
                Updated At:
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
                    {{$post->body}}
                </td>
                <td>
                    {{$post->created_at}}
                </td>
                <td>
                    {{$post->updated_at}}
                </td>
                <td>
                    
                </td>
            </tr>
        </tbody>
    </table> 
@endsection