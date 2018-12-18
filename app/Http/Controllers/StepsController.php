<?php

namespace App\Http\Controllers;

use Auth;
use App\Steps;
use App\Http\Resources\Res_Steps;
use Illuminate\Http\Request;

class StepsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Steps $step,$id)
    {
        //tampilkan data step dimana setting_id sama dengan id di step
        $step = $step->where('setting_id',$id)->get();
        return Res_Steps::collection($step);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Steps $step,Request $request)
    {
        if (Auth::user()->role == 'admin') {
            $step = $step->create([
                'name'              => $request->nama_div,
                'setting_id'        => $request->id_setting
            ]);

            if (!$step) {
                return response()->json([
                    'message' => 'data tidak berhasil di simpan'
                ],500);
            }else {
                $response = new Res_Steps($step);
                return response()->json($response,201);
            }


        } else {
            return response()->json([
                'message' => 'Anda tidak memiliki izin untuk melakukan aksi ini'
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
    public function update(Steps $step,Request $request, $id)
    {   
        if (Auth::user()->role == 'admin') {
            $step = $step -> where('id',$id)->first();

            if (!$step) {
                return response()->json([
                    'message' => 'Steps dengan Id '.$id.' tidak di temukan'
                ]);
            }
    
            $update = $step->update([
                'name' => $request->nama_div,
            ]);
    
            if ($update) {
                return response()->json([
                    'message' => 'data Steps berhasil di update'
                ],201);
            } else {
                return response()->json([
                    'message' => 'data Steps tidak berhasil di update'
                ],500);
            }
        } else {
            return response()->json([
                'Message'=>'Anda tidak memiliki izin untuk melakukan aksi ini.'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Steps $step,$id)
    {
        if (Auth::user()->role == 'admin') {
            $step = $step->where('id',$id);

            if (!$step) {
                return response()->json([
                    'message' => 'Steps dengan Id '.$id.' tidak di temukan'
                ]);
            }

            if ($step->delete()) {
                return response()->json([
                    'message' => 'data Steps berhasil di hapus'
                ],201);
            } else {
                return response()->json([
                    'message' => 'data Steps tidak berhasil di hapus'
                ],500);
            }

        } else {
            return response()->json([
                'message' => 'Anda tidak memiliki izin untuk melakukan aksi ini'
            ]);
        }
    }

    //set leader steps 

    public function leaderSteps(Steps $step,Request $request)
    {
        
            $step = $step->where('id',$request->step)->first();

            if (!$step) {
                return response()->json([
                    'message ' => 'Steps dengan id'.$request->step.' Tidak Di temukan'
                ],404);
            }
     
            $update = $step->update([
                 'leader' => $request->leader
            ]);
     
            if ($update) {
                return response()->json([
                    'message' => 'Leader berhasil tersimpan'
                ],201);
            } else {
                return response()->json([
                    'message' => 'Leader tidak berhasil tersimpan'
                ],500);
            }
        // } else {
        //     return response()->json([
        //         'mesage'=>'Anda tidak memiliki izin untuk melakukan aksi ini.'
        //     ]);
        // }
    }
}
