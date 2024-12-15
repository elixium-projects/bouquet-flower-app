<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $user = Auth::user();

        $redirectPage = $user->Role->name === "admin" ? "/dashboard" : "/";

        return redirect($redirectPage);
    }
}
