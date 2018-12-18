<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Tasks;
use App\Project;
use App\Steps;
use App\Http\Resources\project as ProjectResource;
use App\Http\Resources\Res_Tasks;
use App\Http\Resources\data_task_sl;
use App\Http\Resources\data_task_tm;
use App\Http\Resources\basic;

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

    public function get_task_global(Tasks $task)
    {
        $task = $task->get();
        
        return Res_Tasks::collection($task);
    }

    public function task_sl(Steps $step,Tasks $task,$id,Project $proj)
    {
       

        $step = $step->where('leader',$id)->value('id');

        $task = $task->where('Steps_id',$step)->get();
        
        if ($task != null) {
            return data_task_sl::collection($task);
        } else {
           return response()->json([
               'Message' => 'Task Kosong.'
           ],404);
        }
    }

    public function sl_basic_data (Steps $steps,$id){
        $step = $steps->where('leader',$id)->first();

        return basic::make($step);
    }

    public function task_tm(Tasks $task,$id)
    {
        $task = $task->where('handler',$id)->get();

        if ($task != null) {
            return data_task_tm::collection($task);
        } else {
            return response()->json([
                'message'=>'task kosong'
            ]);
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Tasks $task,Request $request)
    {
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
    }

    public function statusTask(Tasks $task,Request $request, $id){
        $task = $task->where('id',$id)->first();

        if (!$task) {
            return response()->json([
                'message' =>'task dengan id '. $id.' tidak ada.'
            ],401);
        }

        $update = $task->update([
            'status' => $request->status,
            'finished_at'   => $request->finish,
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
      
        
    }
}
