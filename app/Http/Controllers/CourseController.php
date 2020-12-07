<?php

namespace App\Http\Controllers;

use App\Course;

use Illuminate\Http\Request;

class CourseController extends Controller
{
    //查看课程信息
    public function index()
    {
        $courses = Course::paginate(5);

        return view('course.index',[
            'courses' => $courses
        ]);
    }

    //新增课程
    public function create(Request $request)
    {
        $course = new Course();

        if($request->isMethod('POST')){

            //验证
            $this->validate($request,[
                'Course.name' => 'required',
                'Course.status' => 'required|integer'
            ],[
                'required' => ':attribute必填',
                'integer'  => '为数字'
            ],[
                'Course.name' => '课程名称',
                'Course.status' => '课程状态'
            ]);

            $post = $request->input('Course');
            if(Course::create($post)){
                return redirect('course/index')->with('success','添加成功');
            }else{
                return redirect()->back()->with('error','添加失败');
            }


        }

        return view('course.create',[
            'course' => $course
        ]);
    }

    //修改课程
    public function update(Request $request,$id)
    {
        $course = Course::find($id);

        if($request->isMethod('POST')){
            //验证
            $this->validate($request,[
                'Course.name' => 'required',
                'Course.status' => 'required|integer'
            ],[
                'required' => ':attribute必填',
                'integer'  => '为数字'
            ],[
                'Course.name' => '课程名称',
                'Course.status' => '课程状态'
            ]);

            $post = $request->input('Course');
            $course->name = $post['name'];
            $course->status = $post['status'];

            if($course->save()){
                return redirect('course/index')->with('success','修改成功-'.$id);
            }else{
                return redirect()->back()->with('error','修改失败');
            }

        }

        return view('course.update',[
            'course' => $course
        ]);
    }
}
