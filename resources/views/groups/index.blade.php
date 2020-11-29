<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>加群</title>
    <link href="https://cdn.bootcdn.net/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card-body {
            padding: 0;
            margin-top: 10px;
        }
        .btn {
            margin: 0 3px 5px 10px;
        }
    </style>
</head>
<body>

<div class="container">
    <br>
    <a href="{{route('groups.create')}}" class="btn btn-primary" role="button">创建</a>
    <br>
    <br>
    @foreach(array_chunk($groups, 2) as $row)
    <div class="row">
        @foreach($row as $item)
        <div class="col mb-6">
        <div class="card mb-5">
          <div class="card-header">{{$item['name']}}</div>
          <div class="card-body text-dark">
            <a href="/{{$item['id']}}" class="btn btn-info btn-sm" role="button">展示给用户</a>
            <a href="{{route('groups.show', $item['id'])}}" class="btn btn-info btn-sm" role="button">管理</a>
            <a href="{{route('groups.edit', $item['id'])}}" class="btn btn-success btn-sm" role="button">编辑</a>
            <a href="{{route('groups.delete', $item['id'])}}" class="btn btn-secondary btn-sm" role="button">删除</a>
          </div>
        </div>
        </div>
        @endforeach
    </div>
    @endforeach
</div>
</body>
</html>
