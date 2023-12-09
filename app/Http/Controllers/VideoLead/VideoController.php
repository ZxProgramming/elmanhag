<?php

namespace App\Http\Controllers\VideoLead;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class VideoController extends Controller
{
    //
            public function __construct()
            {
                $this->middleware('auth');
            }

            public function index()
            {   
                return view('VideoEditorLead.dashboard');
            }
}
