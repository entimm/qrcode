<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>加群</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        .card-body {
            padding: 0;
        }
        .btn {
            margin: auto 3px;
        }
    </style>
</head>
<body>

<div class="container">
    <br>
    <a href="/link/create" class="btn btn-primary" role="button">创建</a>
    <br>
    <br>
    @foreach(array_chunk($links, 3) as $row)
    <div class="row">
        @foreach($row as $item)
        <div class="col mb-3">
        <div class="card mb-3 h-100" style="max-width: 18rem;">
          <div class="card-header">{{$item['name']}}</div>
          <div class="card-body text-dark">
            <img src="{{$item['url']}}" style="width: 100%;margin: 0 0 10px 0">
            <a href="/show/{{$item['id']}}" class="btn btn-info btn-sm" role="button">展示</a>
            <a href="/link/edit/{{$item['id']}}" class="btn btn-success btn-sm" role="button">编辑</a>
            <a href="/link/delete/{{$item['id']}}" class="btn btn-secondary btn-sm" role="button">删除</a>
          </div>
        </div>
        </div>
        @endforeach
    </div>
    @endforeach
</div>
</body>
</html>
