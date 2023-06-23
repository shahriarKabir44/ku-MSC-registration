<?php

namespace App\Http\Controllers;

use App\Models\applicantEducation;
use Illuminate\Http\Request;

class ApplicantEducationController extends Controller
{
    public function create(Request $request)
    {
        $inputs = $request->all();
        $applicantEducation = new applicantEducation();
        $applicantEducation->fill($inputs);
        try {

            $applicantEducation->save();
            return response()->json(['success' => true]);

        } catch (\Throwable $th) {
            return response()->json(['success' => $th]);

        }
        // return response()->json(['success' => $inputs]);

    }
}