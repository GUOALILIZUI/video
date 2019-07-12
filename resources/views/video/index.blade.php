<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>视频网站</title>
</head>
<body>

    <h2>这是视频网站</h2>
    <hr>
    <video src="{{env('HOST')}}/{{$a['path']}}" controls="controls"></video>
</body>
</html>