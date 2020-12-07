@extends('common.layout')

@section('content')
    @include('common.message')
    <div class="panel panel-default">
        <div class="panel-heading">课程列表</div>
        <table class="table table-striped table-hover table-responsive">
            <thead>
            <tr>
                <th>ID</th>
                <th>课程名称</th>
                <th>状态</th>
                <th>添加时间</th>
                <th width="120">操作</th>
            </tr>
            </thead>
            <tbody>

            @foreach($courses as $course)
                <tr>
                    <th scope="row">{{$course->id}}</th>
                    <td>{{$course->name}}</td>
                    <td>{{$course->status == 1?'开启':'关闭'}}</td>
                    <td>{{date('Y-m-d',$course->created_at)}}</td>
                    <td>
                        <a href="{{url('course/update',['id' => $course->id])}}">修改</a>
                        <a href="{{url('course/delete',['id' => $course->id])}}" onclick="if(confirm('您确定删除吗？') == false) return false">删除</a>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>

    <!-- 分页 -->
    <div>
        <div class="pull-right">
            {{$courses->render()}}
        </div>

    </div>
@stop
