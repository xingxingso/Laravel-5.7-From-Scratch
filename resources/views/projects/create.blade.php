<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <h1>Create a New Project</h1>

    <form method="POST" action="/projects">
        <!-- @csrf -->
        {{ csrf_field() }}
        <div>
            <input type="text" name="title" placeholder="Project title">
        </div>
    
        <div>
            <textarea name="description" placeholder="Project description"></textarea>
        </div>

        <div>
            <button type="submit">Create Project</button>
        </div>
    </form>
</body>
</html>
