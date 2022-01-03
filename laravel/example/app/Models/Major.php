<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    use HasFactory;
    public $fillable = [
        'name',
    ];

    //public function students()
    //{
    //    return $this->belongsTo(Student::class,'foreign_key','owner_key');
    //}
}
