<?php

namespace App\Http\Controllers\Departments;

use App\Department;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EditDepartment extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // check if already exist and returns true or false
        $checker = Department::where('id', $id)->exists();

        if($checker)
        {
            $department = Department::findOrFail($id);

            //returns the page for this route
            session()->put('success', 'Department Successfully Retrieved!');
            return view('department.edit_department', compact('department'));
        }
        else
        {
            session()->put('error', 'Department Does Not Exist');
            return redirect()->back();
        }
    }
}
