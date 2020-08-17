<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="keywords" content="BLOG, 博客, IT, 计算机, 编程, 假名, 歌词, 日文, 日文歌, 工具, 游戏, 手游">
    <meta name="Description" Content="Azu機个人网站，包括个人博客、日文歌词假名标注、游戏工具集、图床">
    <title>Azu機</title>
    <!-- import CSS -->
    <link rel="stylesheet" href="{{URL::asset('assets/css/normalize.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('assets/css/index.css')}}">
</head>

<body>
    <div class="container demo">
        <div class="content">
            <div id="large-header" class="large-header">
                <canvas id="demo-canvas"></canvas>
                <h1 class="main-title">
                    <div>Azu機</div>
                    <div><span class="thin">Personal Website</span></div>
                    <div>
                        <a class="thin" href="bloglist">Blog</a>
                        <a class="thin" href="#">Lyric</a>
                        <a class="thin" href="#">Toolkit</a>
                        <a class="thin" href="#">Image</a>
                    </div>
                </h1>
            </div>
        </div>
    </div>
    <script src="{{URL::asset('assets/js/TweenLite.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/EasePack.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/demo.js')}}"></script>

</body>

</html>