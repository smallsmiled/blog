@extends('common.layout')

@section('content')
    <!-- 所有错误提示 -->
    @if(count($errors))
        <div class="alert alert-danger">
            <ul>
                <li>{{$errors->first()}}</li>
            </ul>
        </div>

        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <!-- 自定义内容区域 -->
    <div class="panel panel-default">
        <div class="panel-heading">修改课程</div>
        <div class="panel-body">
            <form class="form-horizontal" method="POST" action="">
                {{csrf_field()}}
                <div class="form-group"><label for="name" class="col-sm-2 control-label">课程名称</label>
                    <div class="col-sm-5"><input type="text" value="{{old('Course')['name']?old('Course')['name']:$course->name}}" name="Course[name]" class="form-control" id="name"
                                                 placeholder="请输入课程姓名"></div>
                    <div class="col-sm-5"><p class="form-control-static text-danger">{{$errors->first('Course.name')}}</p></div>
                </div>
                <div class="form-group"><label for="sex" class="col-sm-2 control-label">状态</label>
                    <div class="col-sm-5">
                        <label class="radio-inline"><input type="radio" {{$course->status == 0?'checked':''}} name="Course[status]" value="0"> 关闭 </label>
                        <label class="radio-inline"><input type="radio" {{$course->status == 1?'checked':''}} name="Course[status]" value="1"> 开启 </label>
                    </div>
                    <div class="col-sm-5"><p class="form-control-static text-danger">{{$errors->first('Course.status')}}</p></div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary">提交</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop
