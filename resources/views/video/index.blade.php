<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>视频网站</title>
    <script charset="utf-8" type="text/javascript" src="https://g.alicdn.com/de/prismplayer/2.8.2/aliplayer-h5-min.js"></script>
    <link rel="stylesheet" href="https://g.alicdn.com/de/prismplayer/2.8.2/skins/default/aliplayer-min.css" />
</head>
<body>

    <h2>这是视频网站</h2>
    <hr>

    {{--<video src="{{env('HOST')}}/{{$a['path']}}" controls="controls"></video>--}}

    <div  class="prism-player" id="J_prismPlayer"></div>
    <script>
        var player = new Aliplayer({
            id: 'J_prismPlayer',
            width: '50%',
            autoplay: true,
            //支持播放地址播放,此播放优先级最高
            source : 'https://didii.oss-cn-hangzhou.aliyuncs.com/video/Rain.mp4',

            //播放方式三：仅MPS用户使用
            // vid : '1e067a2831b641db90d570b6480fbc40',
            // accId: 'dd',
            // accSecret: 'dd',
            // stsToken: 'dd',
            // domainRegion: 'dd',
            // authInfo: 'dd',
        },function(player){
            console.log('播放器创建好了。')
        });
    </script>

</body>
</html>