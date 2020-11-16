<?php

namespace App\Http\Controllers\Departments;

use App\Department;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StoreDepartment extends Controller
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
            'name' => 'required|min:7|max:120',
            'email' => 'required|min:7|max:50',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:16'
        ]);

        // check if already exist and returns true or false
        $checker = Department::where('department_name', $request->Input(['name']))->exists();

        if($checker)
        {
            session()->put('error', 'Department Name Already Exist');
            return redirect()->back();
        }
        else
        {
            // store user input
            $department = new Department();
            $department->department_name = $request->Input(['name']);
            $department->department_email = $request->Input(['email']);
            $department->department_phone = $request->Input(['phone']);
            $saved = $department->save();

            // check if value is saved
            if($saved)
            {
                session()->put('success', 'Department Successfully Created!');
                return redirect()->route('department.create');
            }
            //the else part
            session()->put('error', 'There was an error creating this employee!');
            return redirect()->route('department.create');
        }
    }
}
