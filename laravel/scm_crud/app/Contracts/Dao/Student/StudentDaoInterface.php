<?php

namespace App\Contracts\Dao\Student;

use Illuminate\Http\Request;



/**
 * Interface for Data Accessing Object of Post
 */
interface StudentDaoInterface
{
    /**
     * To get all student list
     * @param
     * @return $students
     */
    public function getAllStudents();

    /**
     * To get list of majors
     *  @param
     *  @return $majors
     */

    public function getMajor();



    public function create_stu(Request $request);

    /**
     * To get a student by id
     * @param $id
     * @return Object $student
     */
    public function getStudentById($id);

    /**
     * To edit student information
     * @param $id,Request $request
     * @return
     */
    public function editStudentById(Request $request,$id);

    /**
     * To delete student by id
     * @param $id
     * @return
     */
    public function deleteStudentById($id);
}
