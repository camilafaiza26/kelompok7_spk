<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\KriteriasDataTable;
use App\Models\User;
use App\Helpers\AuthHelper;
use Spatie\Permission\Models\Role;
use App\Models\Kriteria;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( )
    {
        $kriteria = Kriteria::select('*')->get();
        return view('kriteria.list', [
            'kriterias' => $kriteria,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'nama' => ['required', 'unique:kriteria', 'max:255'],
         
        ]);

        $kriteria = Kriteria::create([
            'nama' =>$request->nama,
        ]);
        return redirect()->route('kriteria.index')->withSuccess(__('Data Berhasil Ditambahkan',['name' => __('kriteria.store')]));;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
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
        $kriteria = Kriteria::find($id);
        $kriteria->nama = $request->nama;
         $kriteria->save();
         return redirect()->back()->withSuccess('Data Kriteria Berhasil Teredit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $status = 'success';
        $message= __('global-message.delete_form', ['form' => __('Data kriteria')]);
        $kriteria = Kriteria::destroy($id);
        return redirect()->back()->with($status,$message);
      
    }
}
