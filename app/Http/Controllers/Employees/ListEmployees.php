<?php

namespace App\Http\Controllers\Employees;

use App\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ListEmployees extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // returns the list view
        $employees = Employee::orderBy('id', 'desc')->paginate(10);//returns db value in descending order with pagination
        return view('employee.list_employees', compact('employees'));
    }
}
