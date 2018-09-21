<?php

namespace App\Http\Controllers;

use Validator;
use App\Hmm;
use Illuminate\Http\Request;
use Yajra\Datatables\Html\Builder;
use Yajra\DataTables\Datatables;

class HmmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function json(){
        return Datatables::of(Hmm::all())->make(true);
    }


    public function index()
    {
        return view('hmm.index2');
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

    public function tabeljumlah(){
        $tabeljumlah = Hmm::all();
        return Datatables::of($tabeljumlah)
        ->addColumn('jumlah',function($bebas){
            return ($bebas->nilai+$bebas->nilai1);
        })
        ->addColumn('keterangan',function($ket){
            $hasil = ($ket->nilai+$ket->nilai1);
            return $ket->nama.', nilai yang anda peroleh adalah '.$hasil;
        })
        ->rawColumns(['jumlah','keterangan'])
        ->toJson();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'nama' => 'required|unique:hmms,nama',
            'kelas'  => 'required',
            'jurusan' => 'required',
            'nilai' => 'required|numeric|max:100',
            'nilai1' => 'required|numeric|max:100'
        ]);
        $error_array = array();
        $success_output = '';
        if ($validation->fails())
        {
            foreach($validation->messages()->getMessages() as $field_name => $messages)
            {
                $error_array[] = $messages;
            }
        }
        else
        {
            if($request->get('button_action') == "insert")
            {
                $student = new Hmm([
                    'nama'    =>  $request->get('nama'),
                    'kelas'   =>  $request->get('kelas'),
                    'jurusan' => $request->get('jurusan'),
                    'nilai'   => $request->get('nilai'),
                    'nilai1'  => $request->get('nilai1')
                ]);
                $student->save();
                $success_output = '<div class="alert alert-success">Data Inserted</div>';
            }
        }
        $output = array(
            'error'     =>  $error_array,
            'success'   =>  $success_output
        );
        echo json_encode($output);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Hmm  $hmm
     * @return \Illuminate\Http\Response
     */
    public function show(Hmm $hmm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Hmm  $hmm
     * @return \Illuminate\Http\Response
     */
    public function edit(Hmm $hmm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Hmm  $hmm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hmm $hmm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Hmm  $hmm
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hmm $hmm)
    {
        //
    }
}
