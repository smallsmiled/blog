<!-- 成功提示框 -->
@if(Session::has('success'))
    <div class="alert alert-success alert-dismissible">
        <button type="buttn" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
        </button>
        <strong>{{Session::get('success')}}</strong><!-- 操作成功提示 -->
    </div>
@endif
<!-- 失败提示框 -->
@if(Session::has('error'))
    <div class="alert alert-danger alert-dismissible">
        <button type="buttn" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
        </button>
        <strong>Session::get('error')</strong><!-- 操作失败提示 -->
    </div>
@endif
