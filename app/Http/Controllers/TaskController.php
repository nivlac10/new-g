<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\Task;
use App\Models\Notification;
use App\Models\Transaction;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class TaskController extends Controller
{
    public function index() {
        $user = auth()->user();
        $status = $user->project_status;
        $level = $user->level;

        if ($status === 'unassigned' && $user->package <= 3) {
            $nextLevel = $user->level + 1;
            $tasks = Task::query()
            ->where(function ($query) use ($nextLevel) {
                $query->where('id', '<', $nextLevel);
            })
            ->orderBy('id', 'desc') // Order tasks by ID in descending order (latest first)
            ->take(10) // Limit the results to the latest 10 tasks
            ->get();

            $notifications = Notification::where('user_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->get();

            $unreadNotificationCount = $notifications->where('read', false)->count();
            return view('tasks.index', compact('tasks','unreadNotificationCount'));
        }
        // Retrieve the user's package name if it exists
        $package = $user->package;
        $query = $package + 1;
        // Get tasks for the next level
        $nextLevel = $user->level + 1;
        $tasks = Task::query()
            ->where(function ($query) use ($nextLevel) {
                $query->where('id', '=', $nextLevel)
                    ->orWhere('id', '<', $nextLevel);
            })
            ->where('id', '<', 31)
            ->where('package','=',$query)
            ->orderBy('id', 'desc') // Order tasks by ID in descending order (latest first)
            ->take(10) // Limit the results to the latest 10 tasks
            ->get();
        if($user->is_demo === 1) {
            $tasks = Task::query()->where(function ($query) use ($nextLevel) {
                $query->where('id', '=', $nextLevel)
                    ->orWhere('id', '<', $nextLevel);
            })
            ->where('id', '>=', 34)
            ->where('id', '<', 45)
            ->orderBy('id', 'desc')
            ->take(10)
            ->get();
        }
        if($user->package === 5 && $user->project_status == 'assigned') {
            $tasks = Task::query()->where(function ($query) use ($nextLevel) {
                $query->where('id', '=', $nextLevel)
                    ->orWhere('id', '<', $nextLevel);
            })
            ->where('id', '>', 44) 
            ->where('id', '<', 48) 
            ->orderBy('id', 'desc')
            ->take(10)
            ->get();
        }
        if($user->package === 6 && $user->project_status == 'assigned') {
            $tasks = Task::query()->where(function ($query) use ($nextLevel) {
                $query->where('id', '=', $nextLevel)
                    ->orWhere('id', '<', $nextLevel);
            })
            ->where('id', '>', 47) 
            ->where('id', '<', 51) 
            ->orderBy('id', 'desc')
            ->take(10)
            ->get();
        }
        if($user->package === 7 && $user->project_status == 'assigned') {
            $tasks = Task::query()->where(function ($query) use ($nextLevel) {
                $query->where('id', '=', $nextLevel)
                    ->orWhere('id', '<', $nextLevel);
            })
            ->where('id', '>', 50) 
            ->where('id', '<', 54) 
            ->orderBy('id', 'desc')
            ->take(10)
            ->get();
        }
        $notifications = Notification::where('user_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->get();

        $unreadNotificationCount = $notifications->where('read', false)->count();
        return view('tasks.index', compact('tasks','unreadNotificationCount'));
    }
    
    public function specialTasks()
    {
        $notifications = Notification::where('user_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->get();

            $unreadNotificationCount = $notifications->where('read', false)->count();
        
        // For example, load tasks specific to levels 10, 20, 30
        return view('tasks.special', ['unreadNotificationCount' => $unreadNotificationCount]);

    }

    

    public function start($id) {
        $task = Task::query()->where('id','=',$id)->first();
        $notifications = Notification::where('user_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->get();

            $unreadNotificationCount = $notifications->where('read', false)->count();
        
        return view('tasks.start.task', compact('task','unreadNotificationCount'));
    }

    public function confirm($id) {
        $task = Task::query()->where('id','=',$id)->first();
        $notifications = Notification::where('user_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->get();

        $unreadNotificationCount = $notifications->where('read', false)->count();
        return view('tasks.start.confirm', compact('task','unreadNotificationCount'));
    }

    public function pay($id) {
        // Get the Task with the given ID
        $task = Task::findOrFail($id);

        // Get the authenticated user
        $user = auth()->user();

        // Check if the user has enough balance
        $balance = $user->balance;
        $requiredAmount = $task->required_amount;

        if ($balance >= $requiredAmount) {
            // User has enough balance to pay for the task
            // Place your payment logic here (deduct balance, update task status, etc.)
            // For demonstration purposes, let's assume the user can afford the task

            // Update the Task status to "paid" (assuming you have a "status" column in the Task table)
            //$task->status = 'paid';
            //$task->save();
            return redirect()->route('task.reviewpage', ['id' => $id])->with('success', 'Success! Please submit your rating and review. We value your feedback.');
        } else {
            // User does not have enough balance to pay for the task
            return redirect()->back()->with('error', 'Insufficient credit balance. Please deposit your admin account.');
        }
    }
    public function review($id) {
        $task = Task::query()->where('id','=',$id)->first();
        $notifications = Notification::where('user_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->get();

        $unreadNotificationCount = $notifications->where('read', false)->count();
        return view('tasks.start.review', compact('task','unreadNotificationCount'));
   }

   public function completed($id) {
    $user = auth()->user();
    // Calculate total deposits and withdrawals for the user
    $totalDeposits = Transaction::where('uid', $user->id)
        ->where('type', 'deposit')
        ->where('status','approved')
        ->sum('amount');

    $totalWithdrawals = Transaction::where('uid', $user->id)
        ->where('type', 'withdrawal')
        ->where('status','approved')
        ->sum('amount');
    $totalAchievements = Transaction::where('uid', $user->id)
        ->where('type','achievement')
        ->where('status','completed')
        ->sum('amount');

    // Check if the user has already completed this task
    if ($user->level >= $id) {
        // Redirect back or show a message indicating that the task is already completed
        return redirect()->route('task.index')->with('error', 'Task already completed.');
    }

    // Update the user's level
    $user->level = $id;
    
    // Find the task and calculate commission
    $task = Task::findOrFail($id);
    $commission = $task->commission;
    
    
    // Update user balance and save
    $user->balance += $commission;
    if ($task->id === 10) {
        $user->project_status = 'unassigned';
        $user->package = 1;
        $user->balance = 0;
        $user->withdrawable = 50.09 + ($totalDeposits - $totalWithdrawals);

    } elseif ($task->id === 20) {
        $user->project_status = 'unassigned';
        $user->package = 2;
        $user->balance = 0;
        $user->withdrawable = 150.09 + 50.09  + ($totalDeposits + $totalAchievements - $totalWithdrawals);
    } elseif ($task->id === 30) {
        if($user->replacement == 1) {
            $user->package = 5;
            $user->level = 44;
        } elseif ($user->replacement == 2) {
            $user->package = 6;
            $user->level = 47;
        } elseif ($user->replacement == 3) {
            $user->level = 50;
            $user->package = 7;
        }
        $user->project_status = 'unassigned';
        $user->balance = 0;
        $user->withdrawable = 1313.49 + 50.09 + 150.09 + ($totalDeposits - $totalWithdrawals);
    } elseif ($task->id === 44) {
        $user->balance = 0;
        $user->withdrawable = 552.65 + 97.27 + ($totalDeposits - $totalWithdrawals);
    } elseif ($task->id === 45) {
        $user->balance = 0;
        $user->withdrawable = 324 + ($totalDeposits - $totalWithdrawals);
    } elseif ($task->id === 46) {
        $user->balance = 0;
        $user->withdrawable = 616 + ($totalDeposits - $totalWithdrawals);
    } elseif ($task->id === 47) {
        $user->balance = 0;
        $user->withdrawable = 570 + ($totalDeposits - $totalWithdrawals);
    } elseif ($task->id === 48) {
        $user->balance = 0;
        $user->withdrawable = 200 + ($totalDeposits - $totalWithdrawals);
    } elseif ($task->id === 49) {
        $user->balance = 0;
        $user->withdrawable = 616 + ($totalDeposits - $totalWithdrawals);
    } elseif ($task->id === 50) {
        $user->balance = 0;
        $user->withdrawable = 570 + ($totalDeposits - $totalWithdrawals);
    } elseif ($task->id === 51) {
        $user->balance = 0;
        $user->withdrawable = 324 + ($totalDeposits - $totalWithdrawals);
    } elseif ($task->id === 52) {
        $user->balance = 0;
        $user->withdrawable = 1004 + ($totalDeposits - $totalWithdrawals);
    } elseif ($task->id === 53) {
        $user->balance = 0;
        $user->withdrawable = 570 + ($totalDeposits - $totalWithdrawals);
    }

    $user->save();
    // Create a transaction entry for commission
    $transaction = new Transaction([
        'amount' => $commission,
        'status' => 'completed',
        'type' => 'commission',
        'uid' => $user->id,
    ]);
    $transaction->save();
    
    // Redirect back with a success message
    return redirect()->route('task.index')->with('success', 'Task completed successfully. We appreciate your dedication and hard work. Your contribution is valuable to us. We look forward to your continued success and collaboration.');
}

public function assignProject(Request $request) {
    $user = auth()->user();
    // Check if the user is eligible to assign a project
    if ($user->project_status === 'assigned') {
        return back()->with('error', 'Project already assigned, please complete your current project before requesting.');
    } elseif (($user->level === null || in_array($user->level, [10, 20, 30, 44, 47, 50])) && $user->project_status !== 'assigned' && $user->balance > 89) {
        // Update the user's project_status
        $user->project_status = 'assigned';
        $user->save();

        return redirect()->route('package.index')->with('success', 'Project assigned successfully.');
    }
    return back()->with('error', 'Project assignment failed.');
}




}
