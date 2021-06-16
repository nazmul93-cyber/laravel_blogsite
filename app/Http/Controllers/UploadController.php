<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function upload() {
        return view('upload');
    }

    public function uploaded(Request $request) {
    //    dd($request->upfile);

        // return $request->file("upfile")->store("Uploads");
        return $request->upfile->store("Uploads");
    }
}
