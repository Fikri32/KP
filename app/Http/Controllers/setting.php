<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\step;
use Auth;
use App\Http\Resources\setting as stepResource;

class setting extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(step $step ,Request $request)
    {
        if (Auth::user()->role == 'admin') {
            
        $step = $step -> create([
            'id_project'    => $request->id_project,
            'nama_divisi'   => $request->nama_div,
            'leader'        => $request->leader,
            
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
