<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
use App\Project;
use App\Settings;
use App\Steps;
use App\Http\Resources\Res_Setting;
use App\Http\Resources\roleUser;
use App\Http\Resources\project as ProjectResource;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Project $proj,Request $request)
    {
        $proj = $proj->where('company_id',Auth::user()->company)->paginate(10);
        return ProjectResource::collection($proj);
    }

 

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Project $proj)
    {
        if (Auth::user()->role == 'admin') {

            $this->validate($request,[
                'nama_project' => 'required'
            ]);
            
            $blankSpaces = 	666;
            
            $proj = $proj -> create([
                'user_id'               => $request->uid,
                'company_id'            => Auth::user()->company,
                'nama_project'          => $request->nama_project,
                'deskripsi_project'     => $request->deskripsi_project,
                'client'                => $request->client,
                'deadline'              => $request->deadline,
                'tanggal_mulai'         => $request->tgl_mulai,
                'settings' => $blankSpaces
            ]);
    
            if (!$proj) {
                return response()->json([
                    'success'   => false,
                    'message'   => 'data could not added'   
                ],500);
            }else {
                $response = new projectResource($proj);
                return response()->json($response,201);
            }

        } else {
            return response()->json([
                'Error' => true,
                'Message' => 'You prohibited to this action, due to your role.'
            ],500);
        }
    }

    public function set_setting($id,Project $proj,Request $request)
    {
        if (Auth::user()->role == 'admin') {
            $proj = $proj->where('id',$id)->first();

            if (!$proj) {
                return response()->json([
                    'Error' => 'Project dengan id '.$id.'tidak di temukan'
                ],500);
            }

            $update = $proj->update([
                'settings' => $request->id_setting,
            ]);

            if ($update) {
                return response()->json([
                    'Succes' => true
                ],201);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Upss.. ada yang salah'
                ], 500);
            }

        } else {
            return response()->json([
                'message' => 'Anda tidak memiliki izin untuk melakukan aksi ini.'
            ],500);
        }
        
    }

    public function set_structure(Project_Structures $struct,Request $request)
    {
        if (Auth::user()->role == 'admin') {
            $struct = $struct -> create([
                'step' => $request->step,
                'project' => $request->id_project,
            ]);
    
            if (!$struct) {
                return response()->json([
                    'success'   => false,
                    'message'   => 'data could not added'   
                ],500);
            }else {
                $response = new Res_Project_Struct($struct);
                return response()->json($response,201);
            }

        } else {
            return response()->json([
                'Error' => true,
                'Message' => 'You prohibited to this action, due to your role.'
            ],500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,Project $proj)
    {
        $proj = $proj->where('id',$id)->first();
 
        if ($proj) {
            $response = new ProjectResource($proj);
            return response()->json($response,200);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id,Project $proj)
    {
        if (Auth::user()->role == 'admin') {
            $proj = $proj->where([
                ['id','=',$id],
                ['company_id','=',Auth::user()->company]
            ])->first();
            
            if(!$proj){
                return response()->json([
                    'Error' => true,
                    'Message' => 'Project with '.$id.' not found'
                ],401);
            }

            $update = $proj->update([
                'user_id'               => $request->uid,
                'nama_project'          => $request->nama_project,
                'deskripsi_project'     => $request->deskripsi_project,
                'client'                => $request->client,
                'deadline'              => $request->deadline,
                'tanggal_mulai'         => $request->tgl_mulai,
            ]);

            if ($update) {
                return response()->json([
                    'Succes' => true
                ],201);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Project could not be updated'
                ], 500);
            }
            
        } else {
            return response()->json([
                'Error' => true,
                'Message' => 'You are prohibited for this action.'
            ],401);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Project $proj)
    {
        if (Auth::user()->role == 'admin') {
            
            $proj = $proj->where([
                ['id','=',$id],
                ['company_id','=',Auth::user()->company]
            ]);

            if (!$proj) {
                return response()->json([
                    'success' => false,
                    'message' => 'project with id ' . $id . ' not found'
                ], 400);
            }

            if ($proj->delete()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Project Succesfully Deleted'
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'user could not be deleted'
                ], 500);
            }

        } else {
            return response()->json([
                'Error' => true,
                'Message' => 'You are prohibited for this action.'
            ],401);
        }
    }
}
