<?php

namespace App\Http\Controllers\Departments;

use App\Department;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UpdateDepartment extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // validates fields in form
        $request->validate([
            'name' => 'required|min:7|max:120',
            'email' => 'required|min:7|max:50',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:16',
        ]);

        // check if already exist and returns true or false
        $checker = Department::where('department_name', $request->Input(['name']))->exists();
        $checker1 = Department::select('id')->where('department_name', $request->Input(['name']))->first();

        //return strcmp($checker1,$id);

        // check if data already exist and if the id for that data is same as the id to be updated
        if($checker AND strcmp($checker1->id, $id) !== 0)
        {
            session()->put('error', 'Could not Update because Department Name Already Exist');
            return redirect()->route('departments.list');
        }
        else
        {
            $department = Department::find($id);
            $department->department_name = $request->Input(['name']);
            $department->department_email = $request->Input(['email']);
            $department->department_phone = $request->Input(['phone']);
            $department->save();

            session()->put('success', 'Department Successfully Updated!');
            return redirect()->route('departments.list');

            //return var_dump(strcmp($checker1->id,$id) === 0);
            //var_dump($checker1->id);
        }
    }
}
