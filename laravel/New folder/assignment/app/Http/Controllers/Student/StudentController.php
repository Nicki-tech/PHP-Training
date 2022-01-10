<?php

namespace App\Http\Controllers\Student;

use App\Contracts\Services\Student\StudentServiceInterface;
use App\Models\Student;
use App\Models\Major;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

class StudentController extends Controller
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

        return view('student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $majors = $this->studentInterface->getMajors();

        return view('student.create', compact('majors'));
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

        if ($student) {
            return redirect()
                ->route('students.index')
                ->with('success', 'Student created successfully.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $majors = $this->studentInterface->getMajors();

        return view('student.edit', compact('student', 'majors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //info($student);
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required',
            'phone' => 'required|regex:/(0)[0-9]/|not_regex:/[a-z]/|min:9',
            'address' => 'required',
            'major_id' => 'required'
        ]);

        $result = $this->studentInterface->updateStudent($request, $student);
        //info($result);

        if ($result) {
            return redirect()
                ->route('students.index')
                ->with('success', 'Student updated successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index');
    }
    public function export()
    {
        return $this->studentInterface->export();
    }
    public function showimport(){
        return view('student.import');
    }
    public function searchs(){
        return view('student.search');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file'=>'required',
        ]);
        $this->studentInterface->import($request);
        return redirect()->route('students.index');
    }

public function search(Request $request)
{
        $students = $this->studentInterface->search($request);
        return view('student.index')->with(['students' => $students]);

}

public function api(){
        return view('student.shows');
}
}
?>
