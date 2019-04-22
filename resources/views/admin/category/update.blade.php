@extends('common.basic')
@section('content')

    <div>
        <div class="card" >
            <div class="header">
                <legend>分类修改</legend>
            </div>
            <div class="content">
                <form method="get" action="/" class="form-horizontal">
                    <fieldset>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">分类名称</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="{{ $categoryData->name }}" name="name" id="name">
                            </div>
                        </div>
                    </fieldset>
                    <input type="hidden"  id="id" value="{{ $categoryData->id }}" />

                    <fieldset>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">是否热门</label>
                            <div class="col-sm-10 ">
                                <label class="checkbox {{ 1 == $categoryData->isHot ? 'checked' : ''}} " id="isHot">
                                    <span class="icons"><span class="first-icon fa fa-square-o"></span><span class="second-icon fa fa-check-square-o"></span></span><input type="checkbox" data-toggle="checkbox" value=""  checked="">
                                </label>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">浏览量</label>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-md-10">
                                        <input type="text"  class="form-control" value="{{ $categoryData->views }}" name="views" id="views">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">留言数</label>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-md-10">
                                        <input type="text"  class="form-control" value=" {{ $categoryData->comments }}" name="comments" id="comments">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </form>

            </div>
        </div>  <!-- end card -->
    </div>
    <button type="" class="btn btn-info btn-fill btn-wd" id="submit">修改</button>
@endsection
<script src="/admin/editor/examples/js/jquery.min.js"></script>
<script type="text/javascript">

    $(function() {

        $('body').addClass('text-align:center');
        $('#first_content').css('margin','0 auto');
        $('#first_content').css('width','80%');

        $('#submit').click(function (){
            var id = $('#id').val();
            var comments = $('#comments').val();
            var views = $('#views').val();
            var isHot = $('#isHot').hasClass('checked')?1:0;
            var name = $('#name').val();
            $.post('{{ route('categoryEdit') }}',{id:id,comments:comments,isHot:isHot,views:views,name:name},
                function(data){
                    swal('', '', data);
                }
            );
        });
    });
</script>