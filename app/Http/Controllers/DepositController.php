<?php

namespace App\Http\Controllers;
use App\Models\Transaction;
use App\Models\Task;
use App\Models\Bank;
use App\Models\Notification;
use App\Mail\DepositApproved;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class DepositController extends Controller
{
    public function index() {
        $user = Auth::user();
        $bank = Bank::where('id', 1)->first();
        // Get the user's current level and calculate the next level
        $userLevel = $user->level;
        $nextLevel = $userLevel + 1;
        
        // Fetch the task for the next level
        $task = Task::query()->where('id', '=', $nextLevel)->first();
        $notifications = Notification::where('user_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->get();
        $comm = Transaction::query()->where('uid','=',$user->id)->where('type','=','commission')->sum('amount');
        $unreadNotificationCount = $notifications->where('read', false)->count();
        if ($task == NULL) {
            return view('user.deposit',compact('bank','unreadNotificationCount'));
        } else {
            $requiredAmount = $task->required_amount;
            $suggestedAmount = $requiredAmount - $user->balance;
    
            return view('user.deposit', compact('suggestedAmount','bank','unreadNotificationCount','comm'));
        }
    }
    

    public function deposit(Request $request) {
        $user = Auth::user(); // Get the authenticated user
        $validatedData = $request->validate([
            'amount' => 'required|numeric', // Example validation for amount
            'receipt' => 'required|mimes:jpeg,png,jpg,pdf|max:22048', // Example validation for receipt (image file)
        ]);
        // Handle receipt upload
        $receiptPath = null; // Initialize receiptPath variable
        
        if ($request->hasFile('receipt')) {
            $receiptPath = $request->file('receipt')->store('receipts', 'public');
        }
    
        // Create a pending transaction entry
        $transaction = new Transaction([
            'amount' => $request['amount'],
            'status' => 'pending',
            'type' => 'deposit',
            'uid' => $user->id,
            'receipt' => $receiptPath, // Store the receipt path in the transaction
        ]);
        $transaction->save();
        $emailData = [
            'date' => now()->toDateTimeString(),
            'name' => $user->name,
            'account_id' => $user->id,
            'email' => $user->email,
            'amount' => $request['amount'],
            'receipt_url' => asset('storage/' . $receiptPath)
        ];
        try {
            Mail::to('jc2023hoh@gmail.com')->send(new DepositApproved($emailData));
        } catch (\Exception $e) {
            \Log::error('Error sending email: ' . $e->getMessage());
        }

        // Flash a success message to the session
        Session::flash('success', 'Deposit request submitted successfully');
    
        // Redirect back to the deposit page with the success message
        return Redirect::route('user.deposit')->with('success', 'Your account balance will be updated shortly once the merchant approves your Top-up request. Please allow a few moments for the transaction to process.');
    }
    
    

    public function approveDeposit($transactionId) {
        $transaction = Transaction::findOrFail($transactionId);
        // Update the transaction status and add the amount to the user's balance
        if ($transaction->status === 'pending') {
            $transaction->status = 'approved';
            $transaction->save();

            // Update user's balance here
            $user = auth()->user();
            $user->balance += $transaction->amount;
            $user->save();

            Session::flash('success', 'Transaction approved successfully.');
        } else {
            Session::flash('error', 'Transaction is not pending.');
        }
        return back();
    }
}
