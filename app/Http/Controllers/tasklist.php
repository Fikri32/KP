<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\task;
use App\Http\Resources\tasklist as taskResource;

class tasklist extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(task $task,Request $request)
    {
        if (Auth::user()->role == 'admin') {
            $task = $task->create([
                'id_divisi' => $request->id_step,
                'task'      => $request->nama_task
            ]);
        } else {
             return response()->json([
                'message' => 'Restricted for employe, admin only'
            ],500);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
