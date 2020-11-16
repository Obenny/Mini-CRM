<?php

namespace App\Http\Controllers\Employees;

use App\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UpdateEmployee extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // validates fields in form
        $request->validate([
            'fname' => 'required|min:3|max:20',
            'lname' => 'required|min:3|max:20',
            'did' => 'required|min:1|max:3',
            'email' => 'required|min:7|max:50',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:16'
        ]);

        $employee = Employee::find($id);
        $employee->first_name = $request->Input(['fname']);
        $employee->last_name = $request->Input(['lname']);
        $employee->department_id = $request->Input(['did']);
        $employee->email = $request->Input(['email']);
        $employee->phone= $request->Input(['phone']);
        $employee->save();

        session()->put('success', 'Employee Successfully Updated!');
        return redirect()->route('employees.list');
    }
}
