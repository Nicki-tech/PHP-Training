<?php

namespace App\Contracts\Dao\Major;

use Illuminate\Http\Request;
use App\Models\Major;

/**
 * Interface for Data Accessing Object of task
 */
interface MajorDaoInterface
{
    /**
     * To get task list
     * @return $taskList
     */
    public function getMajorList();

    /**
     * To save task
     * @param Request $request request with inputs
     * @return Object $task saved task
     */
    public function saveMajor(Request $request);

    /**
     * To delete task
     * @param Task $task
     * @return string $message message success or not
     */
    public function deleteMajor(Major $task);
}
?>
