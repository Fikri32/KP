<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Project;
use App\Steps;
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

    public function invoice()
    {
        if (Auth::user()->role == 'admin') {
            return view('Admin/invoices');
        }
    }

    public function client(){
        return view('Admin/client');
    }

    public function payment($id){
        if (Auth::user()->role == 'admin') {
            return view('Admin/payments')->with('snd_id',$id);
        }
    }

    public function ad_profile($id){
        return view('Admin/profile')->with('user',$id);
    }

    //Staff Area
    public function action_page($project_id)
    {
        $user_id = Auth::user()->id;
        $get_id = $project_id;
        $project_manager = Project::where('id','=',$project_id)->where('user_id','=',$user_id)->first();
        $steps_leader =  DB::table('project')->leftJoin('settings','project.settings','=','settings.id')
                         ->leftJoin('steps','steps.setting_id','=','settings.id')
                         ->where('project.id','=',$project_id)
                         ->where('steps.leader','=',$user_id)
                         ->first();
        
        if (($project_manager != null) && ($steps_leader == null)) {
            return view('Employe/manager')->with('snd_id',$get_id);
        } elseif (($steps_leader != null) && ($project_manager == null)) {
            return view('Employe/StepsLeader')->with('snd_id',$get_id);
        }else {
            return view('Employe/tm')->with('snd_id',$get_id);
        }
    }
}
