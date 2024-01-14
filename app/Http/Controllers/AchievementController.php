<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Achievement;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;

class AchievementController extends Controller
{
    
    public function index()
    {
        $user = auth()->user();
        $achievements = auth()->user()->claimed_achievements;
        $notifications = Notification::where('user_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->get();
        $comm = Transaction::query()->where('uid','=',$user->id)->where('type','=','commission')->count();
        $unreadNotificationCount = $notifications->where('read', false)->count();
        if($achievements) {
            $achievements = Achievement::all();
            return view('achievements.index', compact('achievements','unreadNotificationCount','comm'));
        } else {
            $achievements = Achievement::all();
            return view('achievements.index', compact('achievements','unreadNotificationCount','comm'));
        }
        
    }

    public function redeem($id)
    {
        $achievement = Achievement::findOrFail($id);

        if (auth()->user()->level >= $achievement->required_count) {
            // Update user's balance with reward amount here
            auth()->user()->balance += $achievement->reward_amount;
            auth()->user()->claimed_achievements = $achievement->id;
            auth()->user()->save();
            $transaction = new Transaction([
                'amount' => $achievement->reward_amount,
                'status' => 'completed',
                'type' => 'achievement',
                'uid' => auth()->user()->id,
            ]);
            $transaction->save();

            return redirect()->back()->with('success', 'Achievement redeemed successfully.');
        } else {
            return redirect()->back()->with('error', 'You are not eligible to redeem this achievement.');
        }
    }
}
