<?php

namespace App\Http\Controllers;

use App\Models\applicant_employment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApplicantEmploymentController extends Controller
{
    public function create(Request $request)
    {
        $inputs = $request->all();
        $reseach = new applicant_employment();
        $reseach->fill($inputs);
        try {
            $data = DB::select("select * from research");
            $reseach->save();
            return response()->json(['success' => $data]);

        } catch (\Throwable $th) {
            return response()->json(['success' => $th]);

        }

    }
}