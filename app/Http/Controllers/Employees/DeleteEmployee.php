<?php

namespace App\Http\Controllers\Employees;

use App\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DeleteEmployee extends Controller
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
        $employee = Employee::find($id);
        $delete = $employee->delete(); //delete the client
        if($delete)
        {
            session()->put('success', 'Employee Successfully Deleted!');
            return redirect()->route('employees.list');
        }
        else
        {
            session()->put('error', 'There was an error deleting this employee!');
            return redirect()->back();
        }
    }
}
