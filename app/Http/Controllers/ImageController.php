<?php

namespace App\Http\Controllers;

use App\Models\image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function upload(Request $request)
    {
        if ($request->has('image')) {
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $image->move('images/', $name);
            return response()->json(['success' => 'true']);

        }
    }
}