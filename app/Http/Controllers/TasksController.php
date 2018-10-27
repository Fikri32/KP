<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Tasks;
use App\Project;
use App\Http\Resources\project as ProjectResource;
use App\Http\Resources\Res_Tasks;


class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id,Project $proj)
    {
        $proj = $proj->where('id',$id)->get();
        return ProjectResource::collection($proj);
    }

    public function get_task($id,Tasks $task)
    {
        $task = $task->where('project',$id)->get();
        return Res_Tasks::collection($task);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Tasks $task,Request $request)
    {
        if (Auth::user()->role =='admin') {

            $task = $task -> create([
                'name'          => $request->task,
                'Steps_id'      => $request->step,
                'handler'       => $request->handler,
                'deadline'      => $request->deadline,
                'finished_at'   => $request->finish,
                'status'        => $request->status,
                //non input
                'project'       => $request->project,
            ]);

            if (!$task) {
                return response()->json([
                    'success'   => false,
                    'message'   => 'data could not added'   
                ],500);
            } else {
                $response = new Res_Tasks($task);
                return response()->json($response,201);
            }

        } else {
            return response()->json([
                'message' => 'anda tidak memiliki izin untuk melakukan aksi ini(admin Only)'
            ]);
        }
        
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Tasks $task,Request $request, $id)
    {
        if (Auth::user()->role =='admin') {

            $task = $task->where('id',$id)->first();
            
            if (!$task) {
                return response()->json([
                    'message' => 'Tasks dengan Id '.$id.' tidak di temukan'
                ]);
            }

            $update = $task->update([
                'name'          => $request->task,
                'Steps_id'      => $request->step,
                'handler'       => $request->handler,
                'deadline'      => $request->deadline,
                'finished_at'   => $request->finish,
                'status'        => $request->status,
            ]);

            if ($update) {
                return response()->json([
                    'message' => 'Data tasks berhasil di update'
                ],201);
            } else {
                return response()->json([
                    'message' => 'Data tasks tidak berhasil di update'
                ],500);
            }

        } else {
            return response()->json([
                'message' => 'anda tidak memiliki izin untuk melakukan aksi ini(admin Only)'
            ]);
        }
        
    }

    public function statusTask(Tasks $task,Request $request, $id){
        $task = $task->where('id',$id)->first();

        if (!$task) {
            return response()->json([
                'message' =>'task dengan id '. $id.' tidak ada.'
            ],401);
        }

        $update = $task->update([
            'status' => $request->status
        ]);

        if (!$update) {
            return response()->json([
                'Task Tidak Berhasi di update'
            ]);
        } else {
            return response()->json([
                'Task Berhasi di update'
            ]);
        }
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tasks $task,$id)
    {
        if (Auth::user()->role =='admin') {
            $task = $task->where('id',$id);

            if (!$task) {
                return response()->json([
                    'message' => 'Tasks dengan Id '.$id.' tidak di temukan'
                ]);
            }

            if ($task->delete()) {
                return response()->json([
                    'message' => 'data Tasks berhasil di hapus'
                ],201);
            } else {
                return response()->json([
                    'message' => 'data Tasks tidak berhasil di hapus'
                ],500);
            }
        } else {
            return response()->json([
                'message' => 'anda tidak memiliki izin untuk melakukan aksi ini(admin Only)'
            ]);
        }
        
    }
}
