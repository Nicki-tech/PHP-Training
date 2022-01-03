<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    public $fillable = [
        'name',
        'phone',
        'email',
        'dob',
        'major_id',
    ];

    public function major()
    {
        return $this->hasOne(Major::class);
    }
}
