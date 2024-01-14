<?php

// app/Http/Controllers/AdminTransactionController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class AdminTransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::orderBy('created_at', 'desc')->get();

        return view('admin.transactions.index', compact('transactions'));
    }
}
