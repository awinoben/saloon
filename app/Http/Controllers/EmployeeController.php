<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Salon;
use App\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = auth()->user()->id;
        $employees = Employee::latest()->paginate(5);
        $salons = Salon::where('user_id',$userId)->get()->first();
        return view('employees.index',compact('employees'))
            ->with('i', (request()->input('page', 1) - 1) * 5)
            ->with('salons', $salons);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $userId = auth()->user()->id;
        $salons = Salon::where('user_id',$userId)->get()->first();
        return view('employees.create')->with('salons',$salons);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'string', 'min:10', 'unique:employees'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $userId = auth()->user()->id;
        $salons = Salon::where('user_id',$userId)->get()->first();
        $salon_id = $salons->id;

        //Employee::create($request->all());
        $user= Employee::create([
            'name' => $request['name'],
            'phone_number' => $request['phone_number'],
            'salon_id' => $salon_id,
            'employer_id' => $userId,
            'password' => Hash::make($request['password']),
        ]);
        $user
            ->roles()
            ->attach(Role::where('name', 'staff')->first());
        $user->save();
        return redirect()->route('employees.index')
            ->with('success','Staff registered successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        $userId = auth()->user()->id;
        $salons = Salon::where('user_id',$userId)->get()->first();
        return view('employees.show',compact('employee'))
            ->with('salons',$salons);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        return view('employees.edit',compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'name' => 'required',
            'phone_number' => 'required',
            'password' => 'required',
        ]);

        $employee->update($request->all());

        return redirect()->route('employees.index')
            ->with('success','Staff updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->route('employees.index')
            ->with('success','Staff deleted successfully');
    }
}
