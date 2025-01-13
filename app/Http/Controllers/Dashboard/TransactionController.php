<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function IndexPage()
    {
        return view('dashboard.transaction.index');
    }
}
