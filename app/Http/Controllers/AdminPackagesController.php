<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;

class AdminPackagesController extends Controller
{
    public function index()
    {
        $packages = Package::all();
        return view('admin.packages.index', compact('packages'));
    }
}
