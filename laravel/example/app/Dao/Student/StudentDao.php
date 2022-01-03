<?php

namespace App\Dao\Student;

use App\Models\Student;
use App\Contracts\Dao\Student\StudentDaoInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StudentDao implements StudentDaoInterface
{

  public function saveStudent(Request $request)
  {
    $student = new Student();
    $student->name = $request['name'];
    $student->phone = $request['phone'];
    $student->email = $request['email'];
    $student->dob = $request['dob'];
    $student->major_id = $request['major_id'];

    $student->save();
    return $student;
  }


}
