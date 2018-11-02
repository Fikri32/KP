<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Client;
use App\Http\Resources\Res_Client;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Client $client)
    {
       $client = $client->where('company',Auth::user()->company)->get();
       return Res_Client::collection($client);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Client $client,Request $request)
    {
        if (Auth::user()->role == 'admin') {
            $client = $client->create([
                'name'      => $request->nama,
                'address'    => $request->alamat,
                'email'     => $request->email,
                'phone'     => $request->phone,
                'fax'       => $request->fax,
                'company'   => Auth::user()->company,
            ]);
            
            $response = new Res_Client ($client);
            return response()->json($response,201);
        } else {
            return response()->json([
                'message' => 'anda tidak memiliki izin untuk melakukan aksi ini'
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
    public function update(Client $client,Request $request, $id)
    {
        if (Auth::user()->role == 'admin') {
            $client = $client -> where('id',$id)->first();

            if (!$client) {
                return response()->json([
                    'message' => 'Client dengan id '.$id.' tidak ditemukan!.'
                ],401);
            }

            $update = $client->update([ 
                'name'      => $request->nama,
                'adress'    => $request->alamat,
                'email'     => $request->email,
                'phone'     => $request->phone,
                'fax'       => $request->fax,
            ]);

            if ($update) {
                return response()->json([
                    'message' => 'Berhasil Di Update'
                ],201);
            } else {
                return response()->json([
                    'message' => 'Data ini tidak dapat di update.'
                ],500);
            }
            
        } else {
            return response()->json([
                'message' => 'anda tidak memiliki izin untuk melakukan aksi ini'
            ],500);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client,$id)
    {
        if (Auth::user()->role == 'admin') {
            $client = $client -> where('id',$id);

            if (!$client) {
                return response()->json([
                    'message' => 'Client dengan id '.$id.' tidak ditemukan!.'
                ],401);
            }

            if ($client->delete()) {
                return response()->json([
                    'success' => true
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'data could not be deleted'
                ], 500);
            }

        } else {
            return response()->json([
                'message' => 'anda tidak memiliki izin untuk melakukan aksi ini'
            ],500);
        }
        
    }
}
