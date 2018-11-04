<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Profile as ProfileModel;
use App\User;
use App\Http\Resources\Res_Profile;
use App\Http\Resources\User as Res_user;

class Profile extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user,$userid)
    {
        $user = $user->where('id',$userid)->get();
        return Res_user::collection($user);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProfileModel $prof,Request $request)
    {
        $prof = $prof->create([
            'user'  => Auth::user()->id,
            'addres'=> $request->alamat,
            'email' => $request->email,
            'phone' => $request->tlp,
            'fax'   => $request->fax
        ]);

        if ($prof) {
            return response()->json([
                'message'=>'data berhasil di simpan'
            ],201);
        } else {
            return response()->json([
                'message'=>'data tidak berhasil di simpan'
            ],500);
        }
    }

    public function image_store(User $user,$userid,Request $request)
    {
        //dd($request);
        $exploded = explode(',',$request);
        $decoded = base64_decode($exploded[1]);
        dd($exploded[0]);
        if (str_contains($exploded[0],'jpeg')) {
            $extension = 'jpg';
        } else {
            $extension = 'png';
        }
        
        $filename = str_random().'.'.$extension;

        $path = public_path().'/'.$filename;

        file_put_contents($path,$decoded);

        $user = $user->where('id',$userid)->update([
            'image' => $filename
        ]);

        if (!$user) {
            return response()->json([
                'message' => 'user dengan id '.$user.' tidak di temukan'
            ],500);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileModel $prof,Request $request, $id)
    {
        $prof = $prof->where('user',$id)->first();

        if (!$prof) {
            return response()->json([
                'message' => 'Data profile dengan id '.$id.' tidak di temukan/error '
            ],404);
        }

        $update = $prof->update([
            'addres'=> $request->alamat,
            'email' => $request->email,
            'phone' => $request->tlp,
            'fax'   => $request->fax,
        ]);
        
        if ($update) {
            return response()->json([
                'message' => 'data berhasil di update',
            ],201);
        } else {
            return response()->json([
                'message' => 'data tidak berhasil di update',
            ],500);
        }
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProfileModel $prof,$id)
    {
        $prof = $prof->where('id',$id);

        if (!$prof) {
            return response()->json([
                'message' => 'Data profile dengan id '.$id.' tidak di temukan/error '
            ],404);
        }

        if ($prof->delete()) {
            return response()->json([
                'message' => 'data berhasil di hapus'
            ],201);
        } else {
            return response()->json([
                'message' => 'data tidak berhasil di hapus'
            ],201);
        }
        
    }
}
