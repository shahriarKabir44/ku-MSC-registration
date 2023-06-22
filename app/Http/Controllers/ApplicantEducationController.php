<?php

namespace App\Http\Controllers;

use App\Models\applicantEducation;
use Illuminate\Http\Request;

class ApplicantEducationController extends Controller
{
    public function create(Request $request)
    {
        $inputs = $request->all();
        $reseach = new applicantEducation();
        $reseach->fill($inputs);
        try {

            $reseach->save();
            return response()->json(['success' => true]);

        } catch (\Throwable $th) {
            return response()->json(['success' => $th]);

        }

    }
}