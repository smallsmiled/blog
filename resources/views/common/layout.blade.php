<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>表单 @yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    @section('style')

    @show

</head>
<body>

<!-- 头部 -->
<div class="jumbotron">
    <div class="container">
        <h2>轻松学会Larvel</h2>
        <p>表单</p>
    </div>
</div>

<!-- 中间内容区域 -->
<div class="container">
    <div class="row">

        <!-- 左侧菜单区域 -->
        <div class="col-md-3">

            @section('leftMenu')
                <div class="list-group">
                    <a href="{{url('student/index')}}" class="list-group-item {{Request::getPathInfo() == '/student/index' ?'active':''}}">学生列表</a>
                    <a href="{{url('student/create')}}" class="list-group-item {{Request::getPathInfo() == '/student/create' ?'active':''}}">新增学生</a>
                    <a href="{{url('course/index')}}" class="list-group-item {{Request::getPathInfo() == '/course/index' ?'active':''}}">课程列表</a>
                    <a href="{{url('course/create')}}" class="list-group-item {{Request::getPathInfo() == '/course/create' ?'active':''}}">新增课程</a>
                </div>
            @show
        </div>

        <!-- 右侧内容区域 -->
        <div class="col-md-9">


            @yield('content')

        </div>
    </div>
</div>

<!-- 尾部 -->
@section('footer')
    <div class="jumbotron" style="margin: 0;">
        <div class="container"><span> @2016 imooc </span></div>
    </div>
@show

<script src="https://cdn.bootcss.com/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>

@section('javascript')

@show
</body>
</html>
