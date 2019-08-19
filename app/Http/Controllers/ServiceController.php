<?php

namespace App\Http\Controllers;

use App\Service;
use App\Salon;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = auth()->user()->id;
        $services = Service::latest()->paginate(5);
        $salons = Salon::where('user_id',$userId)->get()->first();
        return view('services.index',compact('services'))
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
        return view('services.create')->with('salons',$salons);
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
            'commission' => ['required'],
            'description' => ['required'],
        ]);

        $userId = auth()->user()->id;
        $salons = Salon::where('user_id',$userId)->get()->first();
        $salon_id = $salons->id;

        //Employee::create($request->all());
        $user= Service::create([
            'name' => $request['name'],
            'commission' => $request['commission'],
            'description' => $request['description'],
            'salon_id' => $salon_id,
            'user_id' => $userId
        ]);

        $user->save();
        return redirect()->route('services.index')
            ->with('success','Service added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        $userId = auth()->user()->id;
        $salons = Salon::where('user_id',$userId)->get()->first();
        return view('services.show',compact('service'))
            ->with('salons',$salons);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        $userId = auth()->user()->id;
        $salons = Salon::where('user_id',$userId)->get()->first();
        return view('services.edit',compact('service'))
            ->with('salons',$salons);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'name' => 'required',
            'commission' => 'required',
            'description' => 'required',
        ]);

        $service->update($request->all());

        return redirect()->route('services.index')
            ->with('success','Service updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->route('services.index')
            ->with('success','Service deleted successfully');
    }
}
