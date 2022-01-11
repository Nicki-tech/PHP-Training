<?php

namespace App\Http\Controllers\API;

use App\Contracts\Services\Student\StudentServiceInterface;
use App\Models\Student;
use App\Models\Major;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\JsonResponse;

class StudentAPIController extends Controller
{
    /**
     * task interface
     */
    private $studentInterface;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(StudentServiceInterface $studentServiceInterface)
    {
        $this->studentInterface = $studentServiceInterface;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = $this->studentInterface->getStudents();

        return response()->json($students);
    }

    public function indexs()
    {
        return view('student_api.shows');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $majors = $this->studentInterface->getMajors();

        return view('student_api.create',compact('majors'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:students',
            'phone' => 'required|regex:/(0)[0-9]/|not_regex:/[a-z]/|min:9',
            'address' => 'required',
            'major' => 'required'
        ]);
        $student = $this->studentInterface->saveStudent($request);
        return response()->json($student);
    }


    public function edit(Student $student)
    {
        $majors = $this->studentInterface->getMajors();
        //return view('student_api.update', compact('student', 'majors'));
        return response()->json([$student,$majors]);
    }

    public function edits()
    {
        return view('student.edit');
    }
    public function accept(){
        return view('student_api.index');

    }
    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required',
            'phone' => 'required|regex:/(0)[0-9]/|not_regex:/[a-z]/|min:9',
            'address' => 'required',
            'major_id' => 'required'
        ]);

       $student = Student::find($id);
       $student->name = $request->name;
       $student->email = $request->email;
       $student->phone = $request->phone;
       $student->address = $request->address;
       $student->major_id = $request->major_id;
       $student->save();
        //$result = $this->studentInterface->updateStudent($request);
        return response()->json($student);
    }


//    public function destroy(Student $student)
//    {
//        $student->delete();
//        return redirect()->route('student_api.shows');
//
//    }

    public function customdestroy($id)
    {
      $student = Student::find($id);

      $student->delete();
      return response()->json(['success'=>'Record has been deleted']);



    }

}
?>
