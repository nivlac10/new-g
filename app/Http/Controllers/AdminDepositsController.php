<?php

// app/Http/Controllers/AdminDepositsController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;
use App\Mail\DepositApproved;
use Illuminate\Support\Facades\Mail;
use App\Models\Transaction;
use Illuminate\Support\Facades\Session;


class AdminDepositsController extends Controller
{

    public function index()
    {
        $deposits = Transaction::with('user')->where('type', 'deposit')->orderBy('created_at', 'desc')->get();

        return view('admin.deposits.index', compact('deposits'));
    }


    public function approve($id)
    {
        $transaction = Transaction::findOrFail($id);
    
        if ($transaction->status === 'pending') {
            $transaction->status = 'approved';
            $transaction->save();
    
            // Update user's balance here
            $user = $transaction->user;
            $user->balance += $transaction->amount;
            $user->save();
    
            // Create a notification for the user
            Notification::create([
                'user_id' => $user->id,
                'message' => 'Your deposit request of SGD' . number_format($transaction->amount, 2) . ' has been approved.',
            ]);
    
            // Send the email
            Mail::to('jadeefox555@gmail.com')->send(new DepositApproved());
    
            Session::flash('success', 'Deposit approved successfully.');
        } else {
            Session::flash('error', 'Deposit is not pending.');
        }
    
        return redirect()->route('admin.deposits.index');
    }

    public function reject($id)
    {
        $transaction = Transaction::findOrFail($id);
        
        if ($transaction->status === 'pending') {
            $transaction->status = 'rejected';
            $transaction->save();

            // Create a notification for the user
            Notification::create([
                'user_id' => $transaction->user->id,
                'message' => 'Your deposit request of SGD ' .  number_format($transaction->amount, 2) . ' has been rejected.',
            ]);

            Session::flash('success', 'Deposit rejected successfully.');
        } else {
            Session::flash('error', 'Deposit is not pending.');
        }

        return redirect()->route('admin.deposits.index');
    }
}
