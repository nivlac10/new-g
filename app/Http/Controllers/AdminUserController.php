<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Notification;
use App\Models\Transaction;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->where('is_demo','=',0)->get();
        return view('admin.users.index', compact('users'));
    }

    public function demo()
    {
        $users = User::orderBy('created_at', 'desc')->where('is_demo','=',1)->get();
        return view('admin.demo.index', compact('users'));
    }
    
    public function approveUser(Request $request)
    {
        $userId = $request->input('user_id');
        $user = User::findOrFail($userId);

        // Set the 'approved' status to true
        $user->approved = true;
        $user->save();

        // Refresh the user's session
        $request->session()->forget('approved'); // Remove the old 'approved' status
        $request->session()->put('approved', true); // Add the updated 'approved' status

        return response()->json(['message' => 'User approved successfully']);
    }
    
    public function refreshUser(Request $request)
    {
        $userId = $request->input('user_id');
        $user = User::findOrFail($userId);

        // Set the user's level to 30 and balance to 552.65
        $user->level = 40;
        $user->balance = 552.65;
        $user->withdrawable = 0;
        $user->package = 4;
        $user->project_status = 'assigned';
        $user->save();

        // Remove transactions with type 'commission' associated with the user
        Transaction::where('uid', $user->id)
            ->delete();
        Notification::where('user_id',$user->id)
            ->delete();

        return response()->json(['message' => 'User data refreshed successfully']);
    }

    public function replacementUser($id, Request $request)
    {
        $userId = $request->input('user_id');
        $user = User::findOrFail($userId);
        
        // Get the selected option
        $selectedOption = $request->input('option');
        // Set the user's level based on the selected option
        
        switch ($selectedOption) {
            case '44':
                //$user->level = 44;
                $user->replacement = 1;
                //$user->package = 5;
                break;
            case '46':
                //$user->level = 46;
                $user->replacement = 2;
                //$user->package = 6;
                break;
            case '48':
                //$user->level = 48;
                $user->replacement = 3;
                //$user->package = 7;
                break;
            default:
                // Handle invalid options here
                break;
        }
    
        // Save the user's data
        $user->save();
    
        return response()->json(['message' => 'User data refreshed successfully']);
    }
    

    

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->email = $request->input('email');
        if ($request->input('password')) {
            $user->password = bcrypt($request->input('password'));
        }
        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
    }

    public function sendNotificationForm($id)
        {
            // Retrieve the user based on the provided ID
            $user = User::find($id);

            return view('admin.users.send-notification', compact('user'));
        }

        public function sendNotification(Request $request, $id)
        {
            // Validate the form data
            $this->validate($request, [
                'title' => 'required|string|max:255',
                'message' => 'required|string',
            ]);

            // Create a new notification
            Notification::create([
                'user_id' => $id,
                'title' => $request->input('title'),
                'message' => $request->input('message'),
                'read' => false,
            ]);

            return redirect()->route('admin.users.send-notification-form', ['id' => $id])->with('success', 'Notification sent successfully.');
        }
        public function showDemoUserCreationForm()
        {
            return view("admin.demo.create");
        }

        public function storeDemoUser(Request $request)
        {
            // Validation rules for demo user creation form
            $rules = [
                "name" => "required|string|max:255",
                "email" => "required|email|unique:users",
                "password" => "required|min:8",
                // Add any other fields you want to validate here
            ];

            // Validate the form data
            $request->validate($rules);

            // Create the demo user
            User::create([
                "name" => $request->input("name"),
                "email" => $request->input("email"),
                "password" => bcrypt($request->input("password")),
                "is_demo" => true, // Set the is_demo flag to true for demo users
                "level" => 40,
                "balance" => 552.65,
                "claimed_achievements" => "3",
                "withdrawable" => 0,
                "package" => 4,
                "approved" => true,
                "project_status" => "assigned",
            ]);

            return redirect()
                ->route("admin.users.demo")
                ->with("success", "Demo user created successfully.");
        }
        public function editBalance($id)
        {
            $user = User::findOrFail($id);
            return view('admin.users.edit-balance', compact('user'));
        }
        public function updateBalance(Request $request, $id)
        {
            $user = User::findOrFail($id);

            $validatedData = $request->validate([
                'balance' => 'required|numeric',
                'withdrawable' => 'required|numeric',
            ]);

            $user->balance = $validatedData['balance'];
            $user->withdrawable = $validatedData['withdrawable'];
            $user->save();

            return redirect()->route('admin.users.index')->with('success', 'User balance updated successfully.');
        }


}

