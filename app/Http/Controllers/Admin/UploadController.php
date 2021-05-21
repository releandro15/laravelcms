<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function imageupload(Request $request) {
        $request->validate([
            'file' => 'required|image|mimes:jpeg,jpg,png|'
        ]);

        $ext = $request->file->extension();
        $image_name = time().'.'.$ext;

        $request->file->move(public_path('media/images'), $image_name);

        return [
            'location' => asset('media/images/'.$image_name)
        ];

    }
}
