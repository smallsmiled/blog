<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //获取学生信息
    public function index()
    {

        $students = Student::paginate(5);

        return view('student.index',[
            'students' => $students
        ]);
    }

    //添加学生
    public function create(Request $request)
    {
        $student = new Student();

        if($request->isMethod('POST')){

            //验证
            $this->validate($request,[
                'Student.name' => 'required|min:2|max:10',
                'Student.age'  => 'required|integer',
                'Student.sex'  => 'required|integer'
            ],[
                'required' => ':attribute必填',
                'min'      => '长度不符合',
                'integer'  => '为数字'
            ],[
                'Student.name' => '姓名',
                'Student.age'  => '年龄',
                'Student.sex'  => '性别'
            ]);

            //保存信息
            $post = $request->input('Student');
            if(Student::create($post)){
                return redirect('student/index')->with('success','添加成功');
            }else{
                return redirect()->back()->with('error','添加失败');
            }

        }

        return view('student.create',[
            'student' => $student
        ]);
    }

    //修改学生信息
    public function update(Request $request,$id)
    {
        $student = Student::find($id);

        if($request->isMethod('POST')){
            //验证
            $this->validate($request,[
                'Student.name' => 'required|min:2|max:10',
                'Student.age'  => 'required|integer',
                'Student.sex'  => 'required|integer'
            ],[
                'required' => ':attribute必填',
                'min'      => '长度不符合',
                'integer'  => '为数字'
            ],[
                'Student.name' => '姓名',
                'Student.age'  => '年龄',
                'Student.sex'  => '性别'
            ]);

            //保存修改信息
            $post = $request->input('Student');
            $student->name = $post['name'];
            $student->age = $post['age'];
            $student->sex = $post['sex'];
            if($student->save()){
                return redirect('student/index')->with('success','修改成功-'.$id);
            }else{
                return redirect()->back()->with('error','修改失败');
            }


        }

        return view('student.update',[
            'student'=>$student
        ]);
    }

    //查看详情
    public function detail($id)
    {
        $student = Student::find($id);
        return view('student.detail',[
            'student' => $student
        ]);
    }

    //删除
    public function delete($id)
    {
        $student = Student::find($id);
        if($student->delete()){
            return redirect('student/index')->with('success','删除成功-'.$id);
        }else{
            return redirect()->back('errot','删除失败');
        }
    }

}
