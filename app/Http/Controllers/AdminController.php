<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function adminPage(Request $request){
        if (Auth::user()->role != 0 && Auth::user()->role != 1){
            return redirect(route('index'));
        }

        $departments = Department::all();

        return view('admin', compact('departments'));
    }
}
