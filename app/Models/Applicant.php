<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;
    protected $fillable = [
        "signature",
        "photo",
        "programName",
        "name",
        "fatherName",
        "motherName",
        "gender",
        "religion",
        "email",
        "phone",
        "permanentAddress",
        "birthDate",
        "nationality",
        "discipline",
        "presentAddress",
        "bengaliName"
    ];
}