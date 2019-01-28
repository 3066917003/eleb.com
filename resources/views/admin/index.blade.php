<table border="1px" width="200px">
    <tr>
        <th>ID</th>
        <th>姓名</th>
        <th><a href="{{route('admins.logout')}}">退出</a></th>

    </tr>
    @foreach($admins as $admin)
        <tr>
            <td>{{$admin->id}}</td>
            <td>{{$admin->username}}</td>

            <td>
                <a href="{{route('admins.edit',[$admin])}}">修改</a>
                <a data-href="{{route('admins.destroy',[$admin])}}" href="javascript:;" class="del_btn">删除</a>
            </td>
        </tr>
    @endforeach;

</table>
<script src="/js/jquery-1.11.2.min.js"></script>
<script>
    $('.del_btn').click(function () {
        var btn=$(this);
        var url=btn.data('href');
        if (confirm('你确定要删除该用户吗?')){
            $.ajax({
                type:"DELETE",
                url:url,
                data:{
                    _token:"{{csrf_token()}}"
                },
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