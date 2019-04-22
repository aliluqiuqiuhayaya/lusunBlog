@extends('common.basic')

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h4 class="title">文章列表</h4>
            </div>
            <div class="content table-responsive table-full-width">
                <table class="table table-hover">
                    <thead>
                    <tr><th>ID</th>
                        <th>标题</th>
                        <th>分类</th>
                        <th>热门</th>
                        <th>浏览数</th>
                        <th>留言数</th>
                        <th>更新时间</th>
                    </tr></thead>
                    <tbody>
                    @foreach ($articleListData as $key => $article)
                        <tr class="{{ in_array($key, [1,3,5,7,9]) ? $trColor[$key]: ''}}">
                            <td>{{ $article->id }}</td>
                            <td>{{ $article->title }}</td>
                            <td>{{ $article->name }}</td>
                            <td>{{ $article->isHot }}</td>
                            <td>8</td>
                            <td>12</td>
                            <td>{{ date('Y-m-d H:i:s', $article->updateTime) }}</td>
                            <td class="td-actions text-right">
                                <a  rel="tooltip" title="" class="btn btn-info btn-simple btn-xs" data-original-title="详情">
                                    <i class="fa fa-user"></i>
                                </a>
                                <a href="{{ route('articleUpdate',['id'=>$article->id]) }}" rel="tooltip" title="" class="btn btn-success btn-simple btn-xs" data-original-title="修改">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a  rel="tooltip" title="" class="btn btn-danger btn-simple btn-xs delete" data-original-title="删除" articleId="{{ $article->id }}">
                                    <i class="fa fa-times"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
<script src="/admin/editor/examples/js/jquery.min.js"></script>
<script type="text/javascript">

    $(function() {
        $('.delete').click(function (){
            var articleId = $(this).attr('articleId');
            swal({  title: "确定要删除吗?",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn btn-info btn-fill",
                confirmButtonText: "删除",
                cancelButtonClass: "btn btn-danger btn-fill",
                cancelButtonText: "取消",
                closeOnConfirm: false,
            },function(){
                $.post('{{ route('articleDelete') }}',{id:articleId},function(data){
                        swal('', '', data);
                    }
                );

            });
        });
    });



</script>