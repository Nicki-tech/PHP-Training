<?php

namespace App\Services\Major;

use App\Models\Major;
use Illuminate\Http\Request;
use App\Contracts\Dao\Major\MajorDaoInterface;
use App\Contracts\Services\Major\MajorServiceInterface;


class MajorService implements MajorServiceInterface
{

    private $majorDao;


    public function __construct(MajorDaoInterface $majorDao)
    {
        $this->majorDao = $majorDao;
    }

    public function getMajorList()
    {
        return $this->majorDao->getMajorList();
    }


    public function saveMajor(Request $request)
    {
        return $this->majorDao->saveMajor($request);
    }


    public function deleteMajor(Major $major)
    {
        return $this->majorDao->deleteMajor($major);
    }
}
