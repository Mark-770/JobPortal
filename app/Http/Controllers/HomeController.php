<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Contracts\Support\Renderable;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        $jobs = Auth::user()->favorites;
        return view('home', compact('jobs'));

        $adminRole = Auth::user()->roles()->pluck('name');
        if ($adminRole->contains('admin')) {
            return redirect('/dashboard');
        }
    }

}
