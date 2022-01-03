<?php

namespace App\Dao\Major;

use App\Contracts\Dao\Major\MajorDaoInterface;
use Illuminate\Http\Request;
use App\Models\Major;


class MajorDao implements MajorDaoInterface
{

    public function getMajorList()
    {
        return Major::orderBy('created_at', 'asc')->get();
    }


    public function saveMajor(Request $request)
    {
        $major = new Major;
        $major->major = $request->major;
        $major->save();

        return $major;
    }


    public function deleteMajor(Major $major)
    {
        return $major->delete();
    }
}
