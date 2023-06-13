<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\image;
use DB;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function upload(Request $request)
    {

        if ($request->has('image')) {
            $image = $request->file('image');
            $ext = $request->header('ext');
            $name = time() . '.' . $ext;
            $image->move('images/', $name);
            try {
                $user = Applicant::find($request->header('id'));
                if ($user) {
                    $user->photo = 'images/' . $name;
                    $user->save();
                }
                return response()->json(['success' => 'true']);
            } catch (\Throwable $th) {
                return response()->json(['success' => $th]);

            }


        }
    }
}