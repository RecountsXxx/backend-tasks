<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AvatarUpload extends Controller
{
    public function index(){
        return view('avatar-upload');
    }
    public function upload(Request $request){
        $file = $request->file('file');
        if ($file) {
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
            Storage::disk('s3')->putFileAs('photos', $file, $fileName);

            return 'Файл успешно загружен!';
        } else {
            return 'Файл не был получен.';
        }

    }
}
