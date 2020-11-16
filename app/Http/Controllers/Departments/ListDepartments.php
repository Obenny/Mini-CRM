<?php

namespace App\Http\Controllers\Departments;

use App\Department;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ListDepartments extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // returns the list view
        $departments = Department::orderBy('id', 'desc')->paginate(10);//returns db value in descending order with pagination
        return view('department.list_departments', compact('departments'));
    }
}
