<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>分组创建</title>
    <link href="https://cdn.bootcdn.net/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <br>
    <form action="{{route('groups.store')}}" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">名称</label>
            <input type="text" class="form-control" name="name" id="name">
        </div>

        {{csrf_field()}}
        <button type="submit" class="btn btn-primary">提交</button>
    </form>
</div>
</body>
</html>
