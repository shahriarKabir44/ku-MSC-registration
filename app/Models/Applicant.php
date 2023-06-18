<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;
    protected $fillable = ["photo", "programName", "name", "fatherName", "motherName", "gender", "religion", "email", "phone", "permanentAddress", "birthDate", "nationality", "discipline", "presentAddress", "hons_passing_yr", "hons_university", "hons_GPA", "hsc_GPA", "hsc_board_name", "hsc_passing_yr", "ssc_passing_yr", "ssc_board_name", "ssc_GPA", "companyName", "companyPosition", "joiningDate"];
}