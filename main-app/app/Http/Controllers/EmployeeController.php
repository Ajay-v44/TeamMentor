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
        return view('index');
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
            'email' =>'required|unique:employees,email|email',
            'joining_date'=>'required',
            'salary'=>'required | numeric',

        ]);
        //dumb and dive method displays the data recived through a form
    //   dd( $request->except('_token'));
    $data=$request->except('_token');
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
