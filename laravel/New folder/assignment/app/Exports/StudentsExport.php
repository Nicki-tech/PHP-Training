<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromCollection;



class StudentsExport implements FromCollection
{
    public function collection()
    {
        return Student::select(['name', 'email', 'phone', 'address', 'major_id'])->get();
    }

    public function headings(): array {
        return ['name','email','phone','address','major_id'];
    }

}
