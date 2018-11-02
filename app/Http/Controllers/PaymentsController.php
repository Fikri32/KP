<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Payments;
use App\Http\Resources\Res_Payments;

class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id,Payments $pay)
    {
        $pay = $pay->where('project',$id)->get();
        return Res_Payments::collection($pay);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Payments $pay,Request $request)
    {
        if (Auth::user()->role == 'admin') {
            $pay = $pay->create([
                'project'           => $request->project,
                'desc'              => $request->desc,
                'paid_at'           => $request->paid_at,
                'payment_amount'    => $request->amount,
            ]);

            if(!$pay){
                return response()->json([
                    'message' => 'data tidak bisa di tambah euy'
                ],500);
            }else{
                $response = new Res_Payments($pay); 
                return response()->json($response,210);
            }

        } else {
            return response()->json([
                'message' => 'anda tidak memiliki izin untuk melakukan aksi ini'
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
    public function update(Payments $pay,Request $request, $id)
    {
        if (Auth::user()->role == 'admin') {
            $pay = $pay->where('id',$id)->first();
            if (!$pay) {
                return response()->json([
                    'message' => 'pembayaran dengan id '.$id.' tidak di temukan.'
                ],401);
            }
            
            $update = $pay->update([
                'desc'              => $request->desc,
                'paid_at'           => $request->paid_at,
                'payment_amount'    => $request->amount,
                'total'             => $request->total,
            ]);


        } else {
            return response()->json([
                'message' => 'anda tidak memiliki izin untuk melakukan aksi ini'
            ]);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payments $pay,$id)
    {
        if (Auth::user()->role == 'admin') {
            $pay = $pay->where('id',$id);

            if (!$pay) {
                return response()->json([
                    'message' => 'pembayaran dengan id '.$id.' tidak di temukan.'
                ],401);
            }

            if ($pay->delete()) {
                return response()->json([
                    'message' => 'pembayaran berhasil di hapus.'
                ],201);
            }else{
                return response()->json([
                    'message' => 'pembayaran tidak berhasil di hapus.'
                ],500);
            }

        } else {
            return response()->json([
                'message' => 'anda tidak memiliki izin untuk melakukan aksi ini'
            ]);
        }
        
    }
}
