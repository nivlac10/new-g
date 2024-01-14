<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bank;

class AdminBankController extends Controller
{
    public function index()
    {
        $banks = Bank::all();
        return view('admin.banks.index', compact('banks'));
    }

    public function edit($id)
    {
        $bank = Bank::findOrFail($id);
        return view('admin.banks.edit', compact('bank'));
    }

    public function update(Request $request, $id)
    {
        try {
            // Validate input
            $validatedData = $request->validate([
                'bank_name' => 'required',
                'account_number' => 'required',
                'account_name' => 'required',
                'paynow' => 'required',
            ]);

            // Find the bank by ID
            $bank = Bank::findOrFail($id);

            // Update bank details
            $bank->update($validatedData);

            return redirect()->route('admin.banks.index')->with('success', 'Bank details updated successfully');
        } catch (\Exception $e) {
            // Handle exception
            return redirect()->route('admin.banks.edit', $id)->with('error', 'An error occurred while updating bank details: ' . $e->getMessage());
        }
    }

}
