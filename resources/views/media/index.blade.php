<!DOCTYPE html>
<html>
<head>
    <title>Media List</title>
</head>
<body>
    <h1>Media List</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Approved</th>
                <th>Type</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $item)
                <tr>
                    <td><img src="https://lh3.googleusercontent.com/d/{{ $item->google_id }}=w500-h500"  width="200" height="150">
                    <a href="https://lh3.googleusercontent.com/d/{{ $item->google_id }}" download="image-{{ $item->google_id }}.jpg">
        Download Image
    </a>
</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->approved }}</td>
                    <td>{{ $item->type }}</td>
                    <td>{{ $item->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
