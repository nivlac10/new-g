<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\Transaction;
use App\Models\Task;
use App\Models\Notification;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $user = auth()->user();

        if ($user && $user->approved) {
            $package = $user->package ? Package::find($user->package)->package_name : null;
            $commissionTransactions = Transaction::where('uid', $user->id)
                ->where('type', 'commission')
                ->get();
            $totalCommission = $commissionTransactions->sum('amount');
            $notifications = Notification::where('user_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->get();
            $status = $user->project_status;
            $level = $user->level;
            if ($level === null & $status == 'assigned') {
                $nextLevel = $user->level + 1;
                $taskNumber = Task::where('id','=',$nextLevel)->first();
                $unreadNotificationCount = $notifications->where('read', false)->count();
                $depositAmount = Transaction::where('uid', $user->id)
                ->where('type', 'deposit')->where('status','approved')
                ->sum('amount');

                $withdrawalAmount = Transaction::where('uid', $user->id)
                    ->where('type', 'withdrawal')->where('status','approved')
                    ->sum('amount');
                return view('dashboard', compact('package', 'totalCommission','notifications','unreadNotificationCount','taskNumber','depositAmount','withdrawalAmount'));
            }
            $taskNumber = Task::where('id','=',$level)->first();
            $unreadNotificationCount = $notifications->where('read', false)->count();
            $depositAmount = Transaction::where('uid', $user->id)
                ->where('type', 'deposit')->where('status','approved')
                ->sum('amount');

            $withdrawalAmount = Transaction::where('uid', $user->id)
                ->where('type', 'withdrawal')->where('status','approved')
                ->sum('amount');
            return view('dashboard', compact('package', 'totalCommission','notifications','unreadNotificationCount','taskNumber','depositAmount','withdrawalAmount'));
            } elseif (!$user || !$user->approved) {
                return view('auth/login');
            }
        }

        
}
