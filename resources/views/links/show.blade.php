<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>展示</title>
    <link href="https://cdn.bootcdn.net/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.min.css" rel="stylesheet">
    <style>
      .container-fluid {
        padding-right: 0;
        padding-left: 0;
        margin-right: 0;
        margin-left: 0;
      }
      .jumbotron .container {
          max-height: 8em;
          overflow-y: scroll;
      }
      .jumbotron {
          padding: 2rem 1rem;
          margin-bottom: 0.5rem;
      }
    </style>
</head>
<body style="background-color: #e9ecef">

<div class="container-fluid">
    @if($link['desc_text'])
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">{{$link['name']}}</h1>
            <p class="lead"><pre>{{$link['desc_text']}}</pre></p>
        </div>
    </div>
    @endif

    @if($link['desc_img_url'])
    <img src="{{$link['desc_img_url']}}" style="width: 100%">
    <hr>
    @endif

    @if($link['url'])
    <img src="{{$link['url']}}" style="width: 100%">
    @endif
</div>
</body>
</html>
