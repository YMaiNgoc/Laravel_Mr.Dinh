<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COVID Data</title>
</head>
<body>
    <table class="table">
        <thead>
            <tr>
                <th>User Id</th>
                <th>Id</th>
                <th>Title</th>
                <th>Body</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $post)
            <tr>
                <td>{{ $post['userId'] }}</td>
                <td>{{ $post['id'] }}</td>
                <td>{{ $post['title'] }}</td>
                <td>{{ $post['body'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
