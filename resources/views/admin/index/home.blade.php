@extends("admin.public.base2")
@section("style")
    <script src="modules/echarts.min.js"></script>
<style>
    .msg-info .layui-card-header span{
        display: inline-block;padding: 6px 15px;font-size: 10px
    }

    .msg-info .layui-card  .layui-card-body p{
        font-size: 30px ;padding: 5px 0 5px 50px
    }

</style>

@endsection
@section('content')
    <div class="layui-fluid">
        <div class="layui-row layui-col-space15">
            <div class="layui-col-md6">
                <div class="layui-card">
                    <div class="layui-card-header">快捷方式</div>
                    <div class="layui-card-body">

                        <div class="layui-carousel layadmin-carousel layadmin-shortcut" id="test1">
                            <div carousel-item="">
                                <ul class="layui-row layui-col-space10">

                                        <li class="layui-col-xs3">
                                            <a lay-href="user_lst" onClick="new_tab('user_lst','用户查询')" class="layadmin-backlog-body">
                                                <i class="layui-icon layui-icon-user"></i>
                                                <cite>用户列表</cite>
                                            </a>
                                        </li>


                                    <li class="layui-col-xs3">
                                        <a lay-href="user_lst" onClick="new_tab('goods_lst','商品列表')" class="layadmin-backlog-body">
                                            <i class="layui-icon layui-icon-template-1"></i>
                                            <cite>商品列表</cite>
                                        </a>
                                    </li>
                                    <li class="layui-col-xs3">
                                        <a lay-href="user_lst" onClick="new_tab('goods_codings_lst','商品溯源查询')" class="layadmin-backlog-body">
                                            <i class="layui-icon layui-icon-unlink"></i>
                                            <cite>商品溯源查询</cite>
                                        </a>
                                    </li>
                                        <li class="layui-col-xs3">
                                            <a lay-href="user_lst" onClick="new_tab('transactions_lst','二手交易')" class="layadmin-backlog-body">
                                                <i class="layui-icon layui-icon-senior"></i>
                                                <cite>二手交易</cite>
                                            </a>
                                        </li>
                                    <li class="layui-col-xs3">
                                        <a lay-href="user_lst" onClick="new_tab('pick_orders_lst','商品物流')" class="layadmin-backlog-body">
                                            <i class="layui-icon layui-icon-note"></i>
                                            <cite>商品物流</cite>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="layui-col-md6">
                <div class="layui-card">
                    <div class="layui-card-header">待办事项</div>
                    <div class="layui-card-body">

                        <div class="layui-carousel layadmin-carousel layadmin-backlog" id="test2">
                            <div carousel-item>
                                <ul class="layui-row layui-col-space10">
                                    <li class="layui-col-xs6">
                                        <a onClick="new_tab('pick_orders_lst','商品物流')" class="layadmin-backlog-body">
                                            <h3>待发货</h3>
                                            <p><cite>0</cite></p>
                                        </a>
                                    </li>

                                    <li class="layui-col-xs6">
                                        <a onClick="new_tab('remind_ships_lst','催货提醒')" class="layadmin-backlog-body">
                                            <h3>催货提醒</h3>
                                            <p><cite>0</cite></p>
                                        </a>
                                    </li>


                                </ul>
                               {{-- <ul class="layui-row layui-col-space10">
                                    <li class="layui-col-xs6">
                                        <a href="javascript:;" class="layadmin-backlog-body">
                                            <h3>待审友情链接</h3>
                                            <p><cite style="color: #FF5722;">5</cite></p>
                                        </a>
                                    </li>
                                </ul>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="layui-col-sm12">
                <div class="layui-card">
                    <div class="layui-card-header">
                        信息统计
                        <div class="layui-btn-group layuiadmin-btn-group">
                            <a href="javascript:;" class="layui-btn layui-btn-primary layui-btn-xs">最近七天</a>
                            {{--<a href="javascript:;" class="layui-btn layui-btn-primary layui-btn-xs">今年</a>--}}
                        </div>
                    </div>
                    <div class="layui-card-body">
                        <div class="layui-row">
                            <div class="layui-col-sm12">
                                <div id="main" style="width: 90%;height:400px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
   {{-- <script type="text/javascript">
        // 基于准备好的dom，初始化echarts实例
        var myChart = echarts.init(document.getElementById('main'));

        // 指定图表的配置项和数据
        var option = {
            title: {
                text: '折线图堆叠'
            },
            tooltip: {
                trigger: 'axis'
            },
            legend: {
                data: [
                    @if($code==0)
                        '用户数量', '新增产品种类',
                    @endif
                    '产品购买数量']
            },
            grid: {
                left: '3%',
                right: '4%',
                bottom: '3%',
                containLabel: true
            },
            toolbox: {
                feature: {
                    saveAsImage: {}
                }
            },
            xAxis: {
                type: 'category',
                boundaryGap: false,
                //data:arr_time
                data:eval(<?php echo json_encode($arr_time);?>)
            },
            yAxis: {
                type: 'value'
            },
            series: [
                @if($code==0)
                {
                    name: '用户数量',
                    type: 'line',
                    stack: '总量',
                    data: eval({{json_encode($arr_user)}})
                },
                {
                    name: '新增产品种类',
                    type: 'line',
                    stack: '总量',
                    data: eval({{json_encode($goods)}})
                },
                    @endif
                {
                    name: '产品购买数量',
                    type: 'line',
                    stack: '总量',
                    data: eval({{json_encode($good_transaction_records)}})
                },
            ]
        };

        // 使用刚指定的配置项和数据显示图表。
        myChart.setOption(option);
    </script>--}}
@endsection

@section('js')
    <script>
                layui.config({
                    base: '/layuiadmin/' //静态资源所在路径
                }).use(['carousel','table',/*'echarts',*/'jquery'],function () {
                    var jquery=layui.jquery;
                    var carousel = layui.carousel;

                    window.new_tab=function (url,title) {
                        top.layui.index.openTabsPage(url,title)
                    }
                    //

                    function newTab(url,tit){
                        if(top.layui.index){
                            top.layui.index.openTabsPage(url,tit)
                        }else{
                            window.open(url)
                        }
                    }

                    carousel.render({
                        elem: '#test1'
                        ,width: '100%' //设置容器宽度
                        ,arrow:'none'
                        ,trigger: 'click'
                    });

                    carousel.render({
                        elem: '#test2'
                        ,width: '100%' //设置容器宽度
                        ,arrow:'none'
                        ,trigger: 'click'
                    });

                });
            </script>
@endsection

