<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Salon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {

        $request->user()->authorizeRoles(['employer', 'staff', 'client']);

        $userId = auth()->user()->id;
        $salons = Salon::where('user_id',$userId)->get()->first();
        return view('home')->with('salons',$salons);
    }
}
