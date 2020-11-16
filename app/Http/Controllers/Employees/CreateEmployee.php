<?php

namespace App\Http\Controllers\Employees;

use App\Department;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreateEmployee extends Controller
{
//    /**
//     * Create a new controller instance.
//     *
//     * @return void
//     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // returns the create view
        $departments = Department::all();
        return view('employee.create_employee', compact('departments'));
    }
}
