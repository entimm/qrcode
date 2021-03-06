<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>二维码更新</title>
    <link href="https://cdn.bootcdn.net/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <br>
    <form action="{{route('links.update', $link['id'])}}" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">名称</label>
            <input type="text" class="form-control" value="{{$link['name']}}" name="name" id="name">
        </div>

        <div class="form-group">
            <label for="desc_text">描述文字</label>
            <textarea class="form-control" id="desc_text" name="desc_text" rows="5">{{$link['desc_text']}}</textarea>
        </div>

        <div class="form-group">
            <label for="desc_img">描述图片</label>
            <input type="file" class="form-control" value="{{$link['desc_img']}}" name="desc_img" id="desc_img" accept="image/png, image/jpeg, image/jpg">
        </div>
        <div class="form-group">
            <img src="{{$link['desc_img_url']}}" style="width: 80%;margin: 10px auto">
        </div>

        <div class="form-group">
            <label for="file">二维码</label>
            <input type="file" class="form-control" value="{{$link['file']}}" name="file" id="file" accept="image/png, image/jpeg, image/jpg">
        </div>

        <div class="form-group">
            <img src="{{$link['url']}}" style="width: 80%;margin: 10px auto">
        </div>

        {{csrf_field()}}
        @method('PUT')

        <button type="submit" class="btn btn-primary">提交</button>
    </form>
</div>
</body>
</html>
