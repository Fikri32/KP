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

    public function actions($id)
    {
        if (Auth::user()->role == 'admin') {
            $get_id = $id;
            return view('Admin/actions')->with('get_ids',$get_id);
        } 
    }

    public function setting()
    {
        if (Auth::user()->role == 'admin') {
            return view('Admin/setting_dek');
        }
    }

    public function setting_struct($id)
    {
        if (Auth::user()->role == 'admin') {
            $get_id = $id;
            return view('Admin/setting_Struct')->with('data_id',$get_id);
        }
    }

    public function employe()
    {
        return view('Admin/employe');
    }

    //Staff Area
    public function action_page($id)
    {
        if (Auth::user()->role == 'employe') {
            $get_id = $id;
    
            return view('Employe/manager')->with('snd_id',$get_id);
        }
 
    }
}
