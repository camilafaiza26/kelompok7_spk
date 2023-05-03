<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\alternatifsDataTable;
use App\Models\User;
use App\Helpers\AuthHelper;
use Spatie\Permission\Models\Role;
use App\Models\Alternatif;

class AlternatifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( )
    {
        $alternatif = Alternatif::select('*')->get();
        return view('alternatif.list', [
            'alternatifs' => $alternatif,
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
            'nama' => ['required', 'unique:alternatif', 'max:255'],
         
        ]);

        $book = Alternatif::create([
            'nama' =>$request->nama,
        ]);
        return redirect()->route('alternatif.index')->withSuccess(__('Data Berhasil Ditambahkan',['name' => __('alternatif.store')]));;
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
        $alternatif = Alternatif::find($id);
        $alternatif->nama = $request->nama;
         $alternatif->save();
         return redirect()->back()->withSuccess('Data alternatif Berhasil Teredit');
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
        $message= __('global-message.delete_form', ['form' => __('Data alternatif')]);
        $alternatif = Alternatif::destroy($id);
        return redirect()->back()->with($status,$message);
      
    }
}
