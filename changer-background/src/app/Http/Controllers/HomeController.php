<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $files = Storage::files('public/' . Auth::id());
        $modifiedFiles = [];

        foreach ($files as $file) {
            $modifiedFile = str_replace('public', 'storage', $file);
            $serverName = 'localhost';
            $fileUrl = asset($modifiedFile);
            $modifiedFiles[] = $fileUrl;
        }

        return view('home',['files'=>$modifiedFiles]);
    }
}
