<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>二维码列表</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

<div class="container">
    <br>

    <div class="card" style="width: 100%">
        <div class="card-header">
            二维码列表
        </div>
        <ul class="list-group list-group-flush">
            @foreach($links as $link)
                <li class="list-group-item">
                    {{$link['name']}}
                    <a href="/show/{{$link['name']}}">展示</a>
                    <a href="/link/edit/{{$link['id']}}">编辑</a>
                    <a href="/link/delete/{{$link['id']}}">删除</a>
                </li>
            @endforeach
        </ul>
    </div>

    <br>
    <a href="/link/create">创建</a>
</div>
</body>
</html>
