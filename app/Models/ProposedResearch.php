<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProposedResearch extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'supervisorName',
        'supervisorPosition',
        'applicantId'
    ];
}