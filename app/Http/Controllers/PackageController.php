<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Session;


class PackageController extends Controller
{
    public function index() {
        $packages = Package::orderBy('id', 'asc') // Order by ID in ascending order
                ->take(3) // Limit to the first three records
                ->get();

        $notifications = Notification::where('user_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->get();

            $unreadNotificationCount = $notifications->where('read', false)->count();
        return view('packages.index', compact('packages','unreadNotificationCount'));
    }

    public function buy($id) {
        // Get the authenticated user
        $user = Auth::user();
    
        // Get the package by ID
        $package = Package::find($id);
    
        if (!$package) {
            // Package not found, handle the error
            return redirect()->back()->with('error', 'Package not found.');
        }
    
        // Check if the user's balance is enough for the purchase
        if ($user->balance < $package->required_amount) {
            // Show a popup indicating the balance is not enough
            return redirect()->back()->with('error', 'Insufficient balance. Please top up.');
        }
    
        // Deduct the required amount from the user's balance
        $user->balance -= $package->required_amount;
        $user->save();
    
        // Add the package ID to the user's tbl.package (if it's a column in the user table)
        $user->package = $package->id;
        $user->save();
    
        // Alternatively, if tbl.package is a many-to-many relationship with packages, you can use attach method.
        // $user->packages()->attach($package->id);
    
        // Optionally, you can show a success message here
        Session::flash('success', 'Purchase successful!');
    
        // Redirect to the next step or wherever you need to go after the purchase
        return redirect()->route('projects')->with('success', 'Purchase successful!');
    }
    public function assignProject(Request $request) {
        $user = auth()->user();
        // Check if the user is eligible to assign a project (level 10, 20, 30) and hasn't already assigned one
        if ($user->project_status == 'assigned') {
            
            $errors = new MessageBag(['project_status' => ['Project already assigned, please complete your current project before requesting.']]);
            return "hi";
            return view('projects.index')->withErrors($errors);

        } elseif (($user->level === null || in_array($user->level, [10, 20, 30, 44, 46, 48])) && $user->project_status !== 'assigned') {
            // Update the user's project_status
            $user->project_status = 'assigned';
            $user->save();
    
            return response()->json(['success' => true]);
        }
        return "Error";
        return response()->json(['success' => false]);
    }
}
