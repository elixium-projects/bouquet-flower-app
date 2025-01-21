<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Carbon\Carbon;

class TransactionController extends Controller
{
    public function IndexPage()
    {
        $transactions = Transaction::with(["cart", "cart.user"])->get();

        return view('dashboard.transaction.index', compact('transactions'));
    }
}
