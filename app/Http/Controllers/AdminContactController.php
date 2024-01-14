<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;


class AdminContactController extends Controller
{
    public function index()
    {
        $submissions = Contact::orderBy('created_at', 'desc')->get();
        return view('admin.contact.index', compact('submissions'));
    }
}
