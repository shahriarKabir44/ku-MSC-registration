<?php

namespace App\Http\Controllers;

use App\Models\ProposedResearch;
use Illuminate\Http\Request;

class ProposedResearchController extends Controller
{
    public function create(Request $request)
    {
        $inputs = $request->all();
        $reseach = new ProposedResearch();
        $reseach->fill($inputs);
        try {

            $reseach->save();
            return response()->json(['success' => true]);

        } catch (\Throwable $th) {
            return response()->json(['success' => $th]);

        }

    }
}