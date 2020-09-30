<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>
        @yield('title')
    </title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="/layuiadmin/layui/css/layui.css" media="all">
    <link rel="stylesheet" href="/layuiadmin/style/admin.css" media="all">
    @yield('style')
</head>
<body>

<div class="layui-fluid">
    @yield('content')
</div>

<script src="/layuiadmin/layui/layui.js?t=1"></script>
<script>
    layui.use(['element','form','layer','table','upload','laydate'],function () {
        var element = layui.element;
        var layer = layui.layer;
        var form = layui.form;
        var table = layui.table;
        var upload = layui.upload;
        var laydate = layui.laydate;

        //错误提示
        @if(count($errors)>0)
        @foreach($errors->all() as $error)
        layer.msg("{{$error}}",{icon:5});
        @break
        @endforeach
        @endif

        //信息提示
        @if(session('error'))
        layer.msg("{{$error}}",{icon:5});
        @endif

        //信息提示
        @if(session('status'))
        layer.msg("{{session('status')}}",{icon:6});
        @endif

    });
</script>
@yield('js')
</body>
</html>

