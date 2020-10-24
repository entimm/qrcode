<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>二维码更新</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

<div class="container">
    <br>
    <form action="/link/update" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">名称</label>
            <input type="text" class="form-control" value="{{$link['name']}}" id="name" disabled>
        </div>

        <div class="form-group">
            <label for="file">图片</label>
            <input type="file" class="form-control" value="{{$link['file']}}" name="file" id="file" accept="image/png, image/jpeg">
        </div>

        <div class="form-group">
            <img src="{{$link['url']}}" style="width: 80%;margin: 10px auto">
        </div>

        <input type="hidden" name="id" value="{{$link['id']}}">
        {{csrf_field()}}

        <button type="submit" class="btn btn-primary">提交</button>
    </form>
</div>
</body>
</html>
