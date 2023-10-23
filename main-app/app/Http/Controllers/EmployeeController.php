<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        //to get all data
        // $employees=Employee::all();


        //to order by id in descending order
        $employees = Employee::orderBy('id', 'desc')->paginate(2);

        return view('index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:employees,email|email',
            'joining_date' => 'required',
            'salary' => 'required | numeric',
            'is_active' => 'required ',

        ], [
            //Custom error message
            'salary.required' => 'Please Enter Your Salary',
            'is_active.required' => 'Only Active Is Allowed'
        ]);
        //dumb and dive method displays the data recived through a form
        //   dd( $request->except('_token'));
        $data = $request->except('_token');
        //Mass Assignment

        Employee::create($data);

        //Single row assignment

        // $employee=new Employee;
        // $employee->name=$data['name'];
        // $employee->email=$data['email'];
        // $employee->joining_date=$data['joining_date'];
        // $employee->salary=$data['salary'];
        // $employee->is_active=$data['is_active'];  
        // $employee->save();


        // dd('success');

        return redirect()->route('employee-index')->withMessage('Employee has been created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show( string $id)
    {
         $employee = Employee::find($id);
        return view('show',compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $employee = Employee::find($id);
        return view('edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:employees,email,' . $employee->id . ' |email',
            'joining_date' => 'required',
            'salary' => 'required | numeric',
            'is_active' => 'required ',

        ], [
            //Custom error message
            'salary.required' => 'Please Enter Your Salary',
            'is_active.required' => 'Only Active Is Allowed'
        ]);
        $data = $request->all();

        // $employee=Employee::find($id);
        $employee->update($data);
        return redirect()->route('employee-edit', $employee->id)->withSuccess('Employee details updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        return redirect()->route('employee-index')->withMessage('Employee deleted  successfully');

    }
}
