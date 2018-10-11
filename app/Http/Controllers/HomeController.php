<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Project;
use App\Http\Resources\project as ProjectResource;

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
        if (Auth::user()->role == 'admin') {
            return view('Admin/home');
        }elseif (Auth::user()->role == 'employe') {
            return view('employe/home');
        }
    }


    //admin Area
    public function project(){
        if (Auth::user()->role == 'admin') {
            return view('Admin/project');
        } else {
            return view('employe/project');
        } 
    }

    public function setting($id)
    {
        $get_id = $id;
        //dd($get_id);
        return view('Admin/setting')->with('get_ids',$get_id);
    }

    public function employe()
    {
        return view('Admin/employe');
    }

    //Staff Area
    public function action_page()
    {
        return view('employe/action');
    }
}
