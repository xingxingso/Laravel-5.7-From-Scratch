<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <h1>Projects</h1>

    @foreach ($projects as $project)
        <li>{{ $project->title }}</li>
    @endforeach
</body>
</html>
