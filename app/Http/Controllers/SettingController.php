<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Settings;
use App\Http\Resources\setting_by_id;
use App\Http\Resources\Res_Setting;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Settings $setting)
    {
        $setting = $setting->where('company',Auth::user()->company)->get();
        return Res_Setting::collection($setting);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Settings $setting,Request $request)
    {
        if (Auth::user()->role == 'admin') {
            
            $setting = $setting -> create([
                'name'        =>  $request->name_setting,
                'company'     =>  Auth::user()->company
            ]);

            if (!$setting) {
                return response()->json([
                    'success'   => false,
                    'message'   => 'data could not added'   
                ],500);
            } else {
                $response = new Res_Setting($setting);
                return response()->json($response,201);
            }
          
        } else {
            return response()->json([
                'message' => 'Anda tidak memiliki izin unutuk melakukan hal ini.'
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
    public function update(Settings $setting,Request $request, $id)
    {
        if (Auth::user()->role == 'admin') {

            $setting = $setting->where([
                ['id','=',$id],
                ['company','=',Auth::user()->company]
            ])->first();
            
            if (!$setting) {
                return response()->json([
                    'message' => 'Setting dengan Id '.$id.' tidak di temukan'
                ]);
            }

            $update = $setting->update([
                'name'  =>  $request->name_setting,
            ]);

            if ($update) {
                return response()->json([
                    'message' => 'data setting berhasil di update'
                ],201);
            } else {
                return response()->json([
                    'message' => 'data setting tidak berhasil di update'
                ],500);
            }
            

        } else {
            return response()->json([
                'message' => 'Anda tidak memiliki izin untuk melakukan aksi ini.'
            ]);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Settings $setting,$id)
    {
        if (Auth::user()->role == 'admin') {
            $setting = $setting->where([
                ['id','=',$id],
                ['company','=',Auth::user()->company]
            ]);

            if (!$setting) {
                return response()->json([
                    'message' => 'Setting dengan Id '.$id.' tidak di temukan'
                ]);
            }

            if ($setting->delete()) {
                return response()->json([
                    'message' => 'data setting berhasil di hapus'
                ],201);
            } else {
                return response()->json([
                    'message' => 'data setting tidak berhasil di hapus'
                ],500);
            }
            
        } else {
            return response()->json([
                'message' => 'Anda tidak memiliki izin untuk melakukan aksi ini.'
            ]);
        }
        
    }
}
