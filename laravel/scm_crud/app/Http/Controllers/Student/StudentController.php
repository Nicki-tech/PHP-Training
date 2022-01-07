<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\Services\Student\StudentServicesInterface;

class StudentController extends Controller
{
    private $studentInterface;

    public function __construct(StudentServicesInterface $studentServiceInterface)
    {
        $this->studentService = $studentServiceInterface;
    }

    public function create(){
        return view('student.create_student');
    }

    public function create_stu(Request $request){
         $request->validate([
            'name'=>'required',
            'phone'=>'required',
            'address'=>'required',
            'email'=>'required|email',
            'major'=>'required',
        ]);
        $this->studentInterface->create_stu($request);
        return view('student.index');
    }
    public function index(){
        $students=$this->studentService->getAllStudents();
        return view('index')->with(['students'=>$students]);
    }
    public function showmajor()
    {
        $majors = $this->studentInterface->getMajor();
        return view('student.create')->with(['majors' => $majors]);
    }

}
