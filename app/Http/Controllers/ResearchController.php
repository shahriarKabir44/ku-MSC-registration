<?php

namespace App\Http\Controllers;

use App\Models\Research;
use Illuminate\Http\Request;

class ResearchController extends Controller
{
    public function create(Request $request)
    {
        $inputs = $request->all();
        $reseach = new Research();
        $reseach->fill($inputs);
        try {
            $reseach->save();
            return response()->json($reseach);
        } catch (\Throwable $th) {
            return response()->json(['success' => $th]);

        }

    }
}