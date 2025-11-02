<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RedirectController extends Controller
{
    public function redirect()
    {
        if (Auth::check()) {
            return match (Auth::user()->userroll) {
                'admin' => redirect()->route('admin'),
                'owner' => redirect()->route('owner'),
                'worker' => redirect()->route('worker'),
                'customer' => redirect()->route('customer'),
                default => abort(403), 
            };
        }

        return redirect()->route('login'); 
    }
}
