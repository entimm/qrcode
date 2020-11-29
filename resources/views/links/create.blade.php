<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>二维码创建</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

<div class="container">
    <br>
    <form action="{{route('links.store')}}" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">名称</label>
            <input type="text" class="form-control" name="name" id="name">
        </div>

        <div class="form-group">
            <label for="group">分组</label>
            <select class="form-control" name="group" id="group">
              <option value="0">请选择</option>
              @foreach ($groups as $group)
                  <option value="{{$group->id}}">
                    {{$group->name}}
                  </option>
              @endforeach

            </select>
        </div>

        <div class="form-group">
            <label for="file">图片</label>
            <input type="file" class="form-control" name="file" id="file" accept="image/png, image/jpeg">
        </div>

        {{csrf_field()}}
        <button type="submit" class="btn btn-primary">提交</button>
    </form>
</div>
</body>
</html>
