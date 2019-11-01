<?php

namespace App\Http\Controllers;

use App\Employe;
use Carbon\Carbon;
use App\Historique;
use App\Mail\HappyBirthDay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

        return view('home')->with('employes',Employe::birthday()->get());
    }
}
