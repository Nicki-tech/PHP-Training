<?php

namespace App\Services\Student;

use App\Contracts\Dao\Student\StudentDaoInterface;
use App\Contracts\Services\Student\StudentServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
class StudentService implements StudentServiceInterface
{

  private $studentDao;

  public function __construct(StudentDaoInterface $studentDao)
  {
    $this->studentDao = $studentDao;
  }

  public function saveStudent(Request $request)
  {
    return $this->studentDao->saveStudent($request);
  }


  public function getStudentList()
  {
    return $this->studentDao->getStudentList();
  }


}
