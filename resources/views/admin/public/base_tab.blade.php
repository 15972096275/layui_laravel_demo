@extends("admin.public.base")
@section('style')
    <style>
        .layui-table-cell{
            display:table-cell;
            vertical-align: middle;
        }
    </style>
@endsection
@section('title')
    {{$title}}
@endsection

@section('content')
    <div class="layui-fluid">
        <div class="layui-row layui-col-space15">
            <div class="layui-col-md12">
                <div class="layui-card">
                    {{--  <div class="layui-card-header">列宽自动分配</div>--}}
                    <div class="layui-card-body">
                        <div class="layui-tab layui-tab-brief" lay-filter="test1">
                            <ul class="layui-tab-title">
                                @foreach($names as $k=>$v)
                                    <li lay-id="{{$k.$k.$k}}"
                                        @if($k===0)
                                        class="layui-this"
                                        @endif
                                    >{{$v}}</li>
                                @endforeach
                               {{-- <li class="layui-this" lay-id="111" >后缀管理</li>
                                <li lay-id="222" >分类管理</li>
                                <li lay-id="333" >标签管理</li>--}}
                            </ul>
                            <div class="layui-tab-content">
                                @foreach($routes as $k=>$v)
                                    <div
                                         @if($k===0)
                                         class="layui-tab-item layui-show"
                                         @else
                                         class="layui-tab-item"
                                         @endif
                                    >
                                        <iframe src="{{$v}}"  onload="this.height=body.offsetHeight"   frameborder="0"  width="100%"></iframe>
                                    </div>
                                @endforeach

                               {{-- <div class="layui-tab-item">
                                    <iframe src="domain_categorys_lst"  onload="this.height=body.offsetHeight"  scrolling="no" frameborder="0"  width="100%"></iframe>
                                </div>
                                <div class="layui-tab-item">
                                    <iframe src="domain_labels_lst"  onload="this.height=body.offsetHeight"  scrolling="no" frameborder="0"  width="100%"></iframe>
                                </div>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript">
        //设置body高度为浏览器高度，当然也可以不设置
        document.getElementsByTagName('body')[0].style.height = window.innerHeight+'px';
    </script>

    <script>

        layui.use(['jquery','element'],function () {
            var $=layui.jquery;
            var element = layui.element;

            var layid = location.hash.replace(/^#test1=/, '');
            element.tabChange('test1', layid); //假设当前地址为：http://a.com#test1=222，那么选项卡会自动切换到“发送消息”这一项

            //监听Tab切换，以改变地址hash值
            element.on('tab(test1)', function(data){
                location.hash = 'test1='+ this.getAttribute('lay-id');
            });

        });
    </script>
@endsection

