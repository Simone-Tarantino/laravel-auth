<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @foreach ($posts as $post)
        <table>
            <thead>
                <th>
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
                </tr>
            </tbody>
        </table>
    @endforeach
</body>
</html>