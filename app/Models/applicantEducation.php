<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class applicantEducation extends Model
{
    use HasFactory;
    protected $fillable = [
        'applicantId',
        'scored_out_of',
        'examName',
        'board_university',
        'subject',
        'result',
        'passingYear'
    ];
}