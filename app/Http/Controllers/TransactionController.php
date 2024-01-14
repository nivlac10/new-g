<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\Transaction;
use App\Models\Notification;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class TransactionController extends Controller
{
    public function index() {
        $user = Auth::user();
        $transactions = Transaction::where('uid', $user->id)->orderBy('created_at', 'desc')->take(10)->get();
        
        // Format the amount in each transaction to have 2 decimal places
        $formattedTransactions = $transactions->map(function ($transaction) {
            $transaction->amount = number_format(floatval($transaction->amount), 2);
            return $transaction;
        });

        $notifications = Notification::where('user_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->get();

        $unreadNotificationCount = $notifications->where('read', false)->count();
        
        return view('user.history', compact('formattedTransactions','unreadNotificationCount'));
    }

    public function earnings()
{
    $user = Auth::user();

    // Fetch transactions and join with the Task model based on the amount
    $transactions = Transaction::where('uid', $user->id)
        ->where('type', 'commission')
        ->orderBy('created_at', 'desc')
        ->join('tasks', 'transactions.amount', '=', 'tasks.commission')
        ->select('transactions.*', 'tasks.task_description')
        ->take(10)
        ->get();

    // Format the amount in each transaction to have 2 decimal places
    $formattedTransactions = $transactions->map(function ($transaction) {
        $transaction->amount = number_format($transaction->amount, 2);
        $transaction->formatted_date = $transaction->created_at->format('d-m-Y'); // Format date as required
        return $transaction;
    });

    $notifications = Notification::where('user_id', auth()->id())
        ->orderBy('created_at', 'desc')
        ->get();

    $unreadNotificationCount = $notifications->where('read', false)->count();

    return view('user.earning', compact('formattedTransactions', 'unreadNotificationCount'));
}


    public function filterEarnings(Request $request) {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        // Parse the input date strings into Carbon date objects
        $startDate = Carbon::createFromFormat('d-m-Y', $start_date)->startOfDay();
        $endDate = Carbon::createFromFormat('d-m-Y', $end_date)->endOfDay();

        // Fetch transactions within the specified date range
        $user = Auth::user();
        $transactions = Transaction::where('uid', $user->id)
            ->where('type', 'commission')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->orderBy('created_at', 'desc')
            ->get();

        // Format the amount in each transaction to have 2 decimal places
        $formattedTransactions = $transactions->map(function ($transaction) {
            $transaction->amount = number_format($transaction->amount, 2);
            return $transaction;
        });

        $notifications = Notification::where('user_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->get();

        $unreadNotificationCount = $notifications->where('read', false)->count();

        // Return the filtered transactions to the view
        return view('user.earning', compact('formattedTransactions', 'unreadNotificationCount'));
    }
}
