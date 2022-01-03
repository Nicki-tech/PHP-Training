<?php

namespace App\Contracts\Services\Student;

use Illuminate\Http\Request;

/**
 * Interface for post service
 */
interface StudentServiceInterface
{
  /**
   * To save post
   * @param Request $request request with inputs
   * @return Object $post saved post
   */
  public function saveStudent(Request $request);

  /**
   * To get post list
   * @return array $postList Post list
   */
  public function getStudentList();



}
