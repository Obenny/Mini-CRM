<?php

namespace App\Http\Controllers\Employees;

use App\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StoreEmployee extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validates fields in form
        $this->validate($request,[
            'fname' => 'required|min:3|max:20',
            'lname' => 'required|min:3|max:20',
            'did' => 'required|min:1',
            'email' => 'required|min:7|max:50',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:16'
        ]);

            // store user input
            $employee = new Employee();
            $employee->first_name = $request->Input(['fname']);
            $employee->last_name = $request->Input(['lname']);
            $employee->department_id = $request->Input(['did']);
            $employee->email = $request->Input(['email']);
            $employee->phone= $request->Input(['phone']);
            $saved = $employee->save();

            // check if value is saved
            if($saved)
            {
                session()->put('success', 'Employee Successfully Created!');
                return redirect()->route('employee.create');
            }
            else
            {
                //the else part
                session()->put('error', 'There was an error creating this employee!');
                return redirect()->route('employee.create');
            }
    }
}
