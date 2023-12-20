<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DownloadsController extends Controller
{
    public function presentations()
    {
        return view('frontend.downloads.presentations');
    }
    
   
}
