<?php

namespace App\Http\Controllers;

use App\Models\image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function upload(Request $request)
    {
        \Log::info('This is some useful information.');

        if ($request->has('image')) {
            $image = $request->file('image');
            $ext = $request->header('ext');
            $name = time() . '.' . $ext;
            $image->move('images/', $name);

            return response()->json(['success' => 'true']);

        }
    }
}