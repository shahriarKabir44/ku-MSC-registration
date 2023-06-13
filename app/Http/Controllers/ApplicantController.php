<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use Illuminate\Http\Request;

class ApplicantController extends Controller
{
    public function create(Request $request)
    {


        $inputs = $request->all();
        $applicant = new Applicant();
        $applicant->fill($inputs);
        try {
            $applicant->save();
            return response()->json(['data' => $applicant]);


        } catch (\Throwable $th) {
            return response()->json(['data' => $th]);

        }

    }
}