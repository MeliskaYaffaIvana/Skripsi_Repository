<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JobContainerController extends Controller
{
    public function index()
    {
        return view('Job.indexContainer');
    }
}
