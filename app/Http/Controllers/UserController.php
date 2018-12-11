<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
Use Auth;
use App\User;
use App\intDiv;
use App\Http\Resources\User as UserResource;
use App\Http\Resources\divisi as DivResource;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        $user = $user->where([
                ['company',Auth::user()->company],
                ['role','employe']
            ])->paginate(10);
        return UserResource::collection($user);
    }

    public function get_so(intDiv $div)
    {
        $div = $div->all();
        return DivResource::collection($div);
    }

    public function setRole (User $user,Request $request,$id)
    {
        if (Auth::user()->role == 'admin') {
            $user = $user->where('id',$id)->first();

            if (!$user) {
                return response()->json([
                    'message' => 'User with id ' . $id . ' not found'
                ],401);
            }
            
            $set = $user->update([
                'PM' => $request->pm,
                'SL' => $request->sl
            ]);

            if ($set) {
                return response()->json([
                    'messsage' => 'data ka update'
                ],201);
            } else {
                return response()->json([
                    'messsage' => 'data teu ka update'
                ],500);
            }
        } else {
            return response()->json([
                'message' => 'Teu bisa!'
            ],500);
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,User $user)
    {
        if (Auth::user()->role == 'admin') {
            
            if ($request->image) {
                $exploded = explode(',',$request->image);
                $decoded = base64_decode($exploded[1]);
    
                if (str_contains($exploded[0],'jpeg')) {
                    $extension = 'jpg';
                } else {
                    $extension = 'png';
                }
                
                $filename = str_random().'.'.$extension;
    
                $path = public_path().'/'.$filename;
    
                file_put_contents($path,$decoded);
            } else {
                $filename = '';
            }
            
            $password = $request->user_nip;

            if ($password == null) {
                $user = $user->create([
                    'password' => Hash::make('user_secret'),
                    'api_token' => Hash::make($request->email),
                    'role' => 'employe',
                    'company' => Auth::user()->company,
                    'name' => $request->user_name,
                    'email' => $request->user_email,
                    'nip' => '',
                    'image' => $filename,
                    'tugas' => $request->id_tugas,
                ]);
            }else {
                $user = $user->create([
                    'password' => Hash::make($password),
                    'api_token' => Hash::make($request->email),
                    'role' => 'employe',
                    'company' => Auth::user()->company,
                    'name' => $request->user_name,
                    'email' => $request->user_email,
                    'nip' => $request->user_nip,
                    'tugas' => $request->id_tugas,
                    'image' => $filename,
                ]);
            }

            
            $response = new UserResource($user);

            return response()->json($response,201);
        } else {
            return response()->json([
                'message' => 'This Action only for admin'
            ],500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, User $user)
    {
        
        $user = $user->where([
            ['id','=',$id],
            ['company_code','=',Auth::user()->company_code]
        ])->first();

        if ($user) {

            $response = new UserResource($user);
            return response()->json($response,200);

        } else {
            return response()->json([
                'message' => 'cant find user with id : '.$id.' Perhaps this user registered on other company'
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
    public function update(Request $request, $id,User $user)
    {

        if (Auth::user()->role == 'admin') {

            $user = $user->where([
                ['id','=',$id],
                ['company','=',Auth::user()->company]
            ])->first();
     
            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'User with id ' . $id . ' not found'
                ], 400);
            }
     
            $password = $request->user_nip;

            if ($password == null) {
                $updated = $user->where('id',$id)->update([
                    'role' => 'employe',
                    'name' => $request->user_name,
                    'email' => $request->user_email,
                    'nip' => '',
                    'tugas' => $request->id_tugas,
                ]);
            }else {
                $updated = $user->where('id',$id)->update([
                    'password' => Hash::make($password),
                    'role' => 'employe',
                    'name' => $request->user_name,
                    'email' => $request->user_email,
                    'nip' => $request->user_nip,
                    'tugas' => $request->id_tugas,
                ]);
            }
     
            if ($updated)
                return response()->json([
                    'success' => true
                ]);
            else
                return response()->json([
                    'success' => false,
                    'message' => 'User could not be updated'
                ], 500);

        } else {

            return response()->json([
                'message' => 'You are prohobited for this Action.'
            ],500);

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,User $user)
    {

        if (Auth::user()->role == 'admin') {
            
            $user = $user->where([
                ['id','=',$id],
                ['company','=',Auth::user()->company]
            ]);

            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'user with id ' . $id . ' not found'
                ], 400);
            }

            if ($user->delete()) {
                return response()->json([
                    'success' => true
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'user could not be deleted'
                ], 500);
            }

        } else {
            return response()->json([
                'message' => 'You are prohobited for this Action.'
            ],500);
        }
    }
}
