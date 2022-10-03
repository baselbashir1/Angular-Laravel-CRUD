<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use GuzzleHttp\Promise\Create;
use PhpParser\Node\Expr\Empty_;

class EmployeeController extends Controller
{
    public function getAllEmployees()
    {
        $employee = Employee::all();
        return response()->json([$employee, 200]);
    }

    public function getEmployeeByID($id)
    {
        $employee = Employee::find($id);
        if (is_null($employee))
            return response()->json([['message' => 'Employee Not Found'], 404]);
        return response()->json([$employee, 200]);
    }

    public function addEmployee(Request $request)
    {
        $employee = Employee::create($request->all());
        return response()->json([$employee, 201]);
    }

    public function updateEmployee(Request $request, $id)
    {
        $employee = Employee::find($id);
        if (is_null($employee))
            return response()->json([['message' => 'Employee Not Found'], 404]);
        $employee->update($request->all());
        return response()->json([$employee, 200]);
    }

    public function deleteEmployee($id)
    {
        $employee = Employee::find($id);
        if (is_null($employee))
            return response()->json([['message' => 'Employee Not Found'], 404]);
        $employee->delete();
        return response()->json([$employee, 204]);
    }
}
