<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();

        switch($user->roles->first()->name) {
            case 'admin':
                return view('index');
                break;
            case 'teacher':
                return redirect()->route('classes.index');
                break;
            case 'students':
                return redirect()->route('student.home');
                break;
            default:
                Auth::logout();
                return redirect()->route('/');
                break;
        }
    }
}
