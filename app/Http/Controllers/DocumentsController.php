<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Response;
use DB;
use App\documents;
use App\Http\Resources\Res_documents;
use App\Tasks;
use App\Http\Resources\Res_Tasks as TaskResource;


class DocumentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id,Tasks $task)
    {
        $task = $task->where('id',$id)->get();
        return Res_Tasks::collection($task);
    }

    public function get_doc($id,documents $doc)
    {
        $doc = $doc->where('task',$id)->get();
        return Res_documents::collection($doc);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(documents $doc,Request $request)
    {
        if ($request->url) {
            $exploded = explode(',',$request->url);
            $decoded = base64_decode($exploded[1]);

            if (str_contains($exploded[0],'docx')) {
                $extension = 'xlx`x';
            } else {
                $extension = 'pdf';
            }
            
            $filename = str_random().'.'.$extension;

            $path = public_path().'/'.$filename;

            file_put_contents($path,$decoded);
        } else {
            $filename = '';
        }
        
        
            $doc = $doc->create([
                'url' => $filename,
                'nama_document' => $request->nama_document,
                'task'  => $request->task,
                'deskripsi'  => $request->deskripsi,
            ]);

            if (!$doc) {
                return response()->json([
                    'success'   => false,
                    'message'   => 'data could not added'   
                ],500);
            } else {
                $response = new Res_documents($doc);
                return response()->json($response,201);
            }

       
        
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function download($id,documents $doc,Request $request)
    {
        
        $doc = $doc->where('id','=',$id);
        $filename=$doc->value(
            'url' 
        );
        
        $path = public_path().'/'. $filename;
           
                        
        return Response::download($path);
        }

      
        // return Response::download($path,$doc,$headers);
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
    public function update($id)
    {
       
       
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
