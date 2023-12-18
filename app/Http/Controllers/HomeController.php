<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\StudentM;

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
    public function index()
    {
        return view('home');
    }
    public function dashboard()
    {
        $checkUser=StudentM::where('user_id',Auth::user()->id)->get();
        if(count($checkUser)>0){
            return view('exam&tests.students.dashboard');
        }else{
            return view('exam&tests.dashboard');
        }
        
    }
}
