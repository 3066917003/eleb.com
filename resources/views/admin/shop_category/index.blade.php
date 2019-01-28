@extends('admin.layout.default')

@section('contents')
    <form method="get">
        名称：<input type="text" name="name">
        价格区间：<input type="text" name="min_price">- <input type="text" name="max_price">
        <button>搜索</button>
    </form>
    <table class="table table-bordered table-striped table-hover">
        <tr>
            <th>ID</th>
            <th>分类名称</th>
            <th>分类图片</th>
            <th>状态</th>
            <th>操作</th>
        </tr>
        @foreach($shop_categories as $shop_category)
            <tr @if($shop_category->$status==0) class="text-muted" @endif>
                <td>{{$shop_category->id}}</td>
                <td>{{$shop_category->name}}</td>
                <td><img src="{{$shop_category->img}}"/></td>
                <td>
                    <a href="{{route('shop_categories.edit',[$shop_category])}}">修改
                    <span class="glyphicon glyphicon-edit"></span>
                    </a>
                    <a  data-href="{{route('$shop_categories.destroy',[$shop_category])}}"  href="javascript:;" class="del_shop_category btn btn-danger btn-xs">删除
                    <span class="glyphicon glyphicon-trash"></span></a>
                </td>
            </tr>
        @endforeach
    </table>
    {{$shop_categories->appends([request()->except('page')])->links()}}
    @endsection
    @section('javascript')
    <script src="/js/jquery-1.11.2.min.js"></script>
    <script>
        var token="{{csrf_token()}}";
        $(".del_shop_category").click(function () {
            var btn=$(this);
            if (confirm('你确定要删除该分类吗? 删除后不可恢复')){
                $.ajax({
                    type:"DELETE",
                    url:btn.data('href'),
                    data:{token:token},
                    success:function (msg) {
                        if (msg=='success'){
                            alert("删除成功！");
                            //删除当前tr
                            btn.closest('tr').fadeOut();
                        } else {
                            alert("删除失败"+msg);
                        }
                    }
                });
            }

        });
    </script>