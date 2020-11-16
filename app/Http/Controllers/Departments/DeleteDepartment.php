<?php

namespace App\Http\Controllers\Departments;

use App\Department;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DeleteDepartment extends Controller
{
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // deletes data using id
        $department = Department::find($id);
        $delete = $department->delete(); //delete the client
        if($delete)
        {
            session()->put('success', 'Department Successfully Deleted!');
            return redirect()->route('departments.list');
        }
        else
        {
            session()->put('error', 'There was an error deleting this department!');
            return redirect()->back();
        }
    }
}
