<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>盈尔安台管理系统</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="layuiadmin/layui/css/layui.css" media="all">
    <link rel="stylesheet" href="layuiadmin/style/admin.css" media="all">
    <link rel="stylesheet" href="layuiadmin/style/login.css" media="all">
    <style>
        .layui-login{
            float: right;
            margin-right: 150px;
            width: 400px;
            /*background: url("img/login.svg");*/
        }

        .layui-bg-img{
            background: url('img/login.svg') no-repeat;
            background-size: 45%;
            margin-left: 10%;
            padding-top: 10%;
        }

    </style>
</head>
<body>

<div class="layadmin-user-login layadmin-user-display-show layui-bg-img" id="LAY-user-login" style="display: none;">
    <div class="layadmin-user-login-main layui-login">
        <div class="layadmin-user-login-box layadmin-user-login-header">
            <h2></h2>
            <img src="img/logo2015.png" width="125px" alt="" class="layui-circle">
            <p>盈尔安-后台管理系统</p>
        </div>
        <div class="layadmin-user-login-box layadmin-user-login-body layui-form">
            <form action="/sub_login" method="post">
                {{csrf_field()}}
            <div class="layui-form-item">
                <label class="layadmin-user-login-icon layui-icon layui-icon-username" for="LAY-user-login-username"></label>
                <input type="text" name="username" id="LAY-user-login-username" lay-verify="required" placeholder="用户名" class="layui-input">
            </div>
            <div class="layui-form-item">
                <label class="layadmin-user-login-icon layui-icon layui-icon-password" for="LAY-user-login-password"></label>
                <input type="password" name="password" id="LAY-user-login-password" lay-verify="required" placeholder="密码" class="layui-input">
            </div>
                <div class="layui-form-item">
                    <div class="">
                        <div id="slider"></div>
                    </div>
                </div>
            <div class="layui-form-item" style="margin-bottom: 20px;">
                <input type="checkbox" name="remember" lay-skin="primary" title="记住密码">
            </div>
            <div class="layui-form-item">
                <button class="layui-btn layui-btn-fluid" lay-submit lay-filter="LAY-user-login-submit">登 入</button>
            </div>

            </form>
        </div>
    </div>
</div>

<script src="layuiadmin/layui/layui.all.js"></script>
{{--<script src="sliderVerify.js"></script>--}}
<script>
    //一般直接写在一个js文件中
    layui.config({
        base: 'modules/'
    }).use(['sliderVerify', 'jquery', 'form'], function() {
        var sliderVerify = layui.sliderVerify,
            form = layui.form;
        var slider = sliderVerify.render({
            elem: '#slider'
        })
        //监听提交
        form.on('submit(LAY-user-login-submit)', function(data) {
           // console.log(data);
           // location.href = '/index'
            if(slider.isOk()){//用于表单验证是否已经滑动成功
                //layer.msg(JSON.stringify(data.field));
            }else{
                layer.msg("请先通过滑块验证");
                return false;
            }
        });

    })

    var error="{{session('error')}}"
    if(error){
        layer.msg(error, {
            offset: '15px'
            ,icon: 2
            ,time: 1500
        });
    }

</script>
</body>
</html>