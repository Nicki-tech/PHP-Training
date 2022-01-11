<?php

namespace App\Http\Controllers\Student;

use App\Contracts\Services\Student\StudentServiceInterface;
use App\Models\Student;
use App\Models\Major;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Mail;


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
        $this->studentInterface->saveStudent($request);
        $this->studentInterface->sendEmail();
        return redirect()
        ->route('students.index')
        ->with('success', 'Student created and send email successfully.');

    }


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
    public function update(Request $request, $id)
    {
        //info($student);
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required',
            'major_id' => 'required',
            'phone' => 'required|regex:/(0)[0-9]/|not_regex:/[a-z]/|min:9',
            'address' => 'required'

        ]);

        $this->studentInterface->updateStudent($request, $id);
        return redirect()->route('students.index')->with(['successMessage'=>'The student data is updated successfully!']);

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
    public function showimport()
    {
        return view('student.import');
    }
    public function searchs()
    {
        return view('student.search');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required',
        ]);
        $this->studentInterface->import($request);
        return redirect()->route('students.index');
    }
    public function search(Request $request)

    {
        $students = $this->studentInterface->search($request);
        return view('student.index')->with(['students' => $students]);
    }
    public function api()
    {
        return view('student.shows');

    }
    public function sendEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'subject' => 'required',
        ]);

        $data = [
            'subject' => $request->subject,
            'email' => $request->email,
        ];

        Mail::send('email', $data, function ($message) use ($data) {
            $message->to($data['email'])
                ->subject($data['subject']);
        });

        return back()->with(['message' => 'Email successfully sent!']);
    }
    public function email(){
        return view('student.emailform');
    }


    public function sendEmailForm(Request $request){
        $request->validate([
            'email' => 'required|email'
        ]);
        $this->studentInterface->sendEmailForm($request);
            return redirect()->route('students.index')->with('success', 'Email is successfully sent.');
    }
}
