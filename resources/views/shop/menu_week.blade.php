@extends('admin.layout.default')

@section('contents')
    <script src="/js/echarts.common.min.js"></script>
    <h1>最近一周菜品销量统计</h1>
    <table class="table table-bordered table-responsive">
        <tr>
            <th>菜品名称</th>
            @foreach($week as $day)
                <th>{{$day}}</th>
            @endforeach
        </tr>
        @foreach($result as $id=>$data)
            <tr>
               <td>{{$menu[$id]}}</td>
                @foreach($data as $total)
                    <td>{{$total}}</td>
                @endforeach
            </tr>
        @endforeach
    </table>
    <div id="main" style="width: 600px;height:400px;"></div>
    <script type="text/javascript">
        // 基于准备好的dom，初始化echarts实例
        var myChart = echarts.init(document.getElementById('main'));

        // 指定图表的配置项和数据
        var option = {
            title: {
                text: '最近一周菜品销量统计'
            },
            tooltip: {
                trigger: 'axis'
            },
            legend: {
                data:@php echo json_encode(array_values($menus)) @endphp
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
                data: @php echo json_encode($week) @endphp
            },
            yAxis: {
                type: 'value'
            },

            series: @php echo json_encode($series) @endphp
            /*[
                {
                    name:'回锅肉',
                    type:'line',
                    stack: '总量',
                    data:[120, 132, 101, 134, 90, 230, 210]
                },
                {
                    name:'联盟广告',
                    type:'line',
                    stack: '总量',
                    data:[220, 182, 191, 234, 290, 330, 310]
                },
                {
                    name:'视频广告',
                    type:'line',
                    stack: '总量',
                    data:[150, 232, 201, 154, 190, 330, 410]
                },
                {
                    name:'直接访问',
                    type:'line',
                    stack: '总量',
                    data:[320, 332, 301, 334, 390, 330, 320]
                },
                {
                    name:'搜索引擎',
                    type:'line',
                    stack: '总量',
                    data:[820, 932, 901, 934, 1290, 1330, 1320]
                }
            ]*/
        };


        // 使用刚指定的配置项和数据显示图表。
        myChart.setOption(option);
    </script>


@stop