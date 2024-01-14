<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Notification;


class AdminWithdrawalsController extends Controller
{
    public function index()
    {
        $withdrawals = Transaction::with('user')->where('type', 'withdrawal')->orderBy('created_at', 'desc')->get();

        return view('admin.withdrawals.index', compact('withdrawals'));
    }

    public function approve($id)
    {
        $withdrawal = Transaction::findOrFail($id);
        
        if ($withdrawal->status === 'pending') {

            $user = $withdrawal->user;
            $user->withdrawable -= $withdrawal->amount;
            $user->save();
            $withdrawal->status = 'approved';
            $withdrawal->save();
            // Create a notification for the user
            Notification::create([
                'user_id' => $user->id,
                'message' => 'Your withdrawal request of SGD ' . number_format($withdrawal->amount,2). ' has been approved.',
            ]);
            
            return redirect()->route('admin.withdrawals.index')->with('success', 'Withdrawal approved successfully.');
        } else {
            return redirect()->route('admin.withdrawals.index')->with('error', 'Withdrawal is not pending.');
        }
    }
    public function reject($id)
    {
        $withdrawal = Transaction::findOrFail($id);

        if ($withdrawal->status === 'pending') {
            $withdrawal->status = 'rejected';
            $withdrawal->save();

            // Create a notification for the user
            Notification::create([
                'user_id' => $withdrawal->user->id,
                'message' => 'Your withdrawal request of SGD ' .  number_format($withdrawal->amount, 2) . ' has been rejected.',
            ]);

            return redirect()->route('admin.withdrawals.index')->with('success', 'Withdrawal rejected successfully.');
        } else {
            return redirect()->route('admin.withdrawals.index')->with('error', 'Withdrawal is not pending.');
        }
    }
}
