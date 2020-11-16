<?php

namespace App\Http\Controllers\Employees;

use App\Department;
use App\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PHPUnit\TextUI\XmlConfiguration\Group;

class EditEmployee extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @param  int  $did
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $did)
    {
        // check if already exist and returns true or false
        $checker = Employee::where('id', $id)->exists();

        if($checker)
        {
            //$departments = Department::all();// get all departments
            // get database values start with a specific value in descending order
            $departments = Department::orderByRaw("FIELD(id, $did) DESC")
                ->get();
            $employee = Employee::findOrFail($id);// get this employee details

            //returns the page for this route
            session()->put('success', 'Employee Successfully Retrieved!');
            return view('employee.edit_employee', compact('employee'), compact('departments'));
        }
        else
        {
            session()->put('error', 'Department Does Not Exist');
            return redirect()->back();
        }
    }

}
