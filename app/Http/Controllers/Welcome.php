<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Propertys;

class Welcome extends Controller
{
    public function welcome()
    {
        $propertys = Propertys::orderBy('id', 'desc')->get();
        
        return view('welcome', compact('propertys'));
    }
}
