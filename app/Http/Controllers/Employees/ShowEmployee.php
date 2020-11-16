<?php

namespace App\Http\Controllers\Employees;

use App\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShowEmployee extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // check if already exist and returns true or false
        $checker = Employee::where('id', $id)->exists();

        if($checker)
        {
            $employee = Employee::findOrFail($id);

            //returns the page for this route
            session()->put('success', 'Employee Successfully Retrieved!');
            return view('employee.view_employee', compact('employee'));
        }
        else
        {
            session()->put('error', 'Employee Does Not Exist');
            return redirect()->back();
        }
    }
}
