<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\alternatifsDataTable;
use App\Models\User;
use App\Helpers\AuthHelper;
use Spatie\Permission\Models\Role;
use App\Models\Alternatif;
use App\Models\Pv_Alternatif;
use App\Models\Pv_Kriteria;
use App\Models\Kriteria;
use App\Models\Rangking;
use Illuminate\Support\Facades\DB;

class RangkingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( )
    {
        
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

        
        function getAlternatifID($no_urut) {
	
            $results = Alternatif::select('id')->get();
                foreach ($results as $s) {
                     $listID[] =  $s->id;
                    }
                    return $listID[$no_urut];
        
        }
            
        function getKriteriaID($no_urut) {
	
            $results = Kriteria::select('id')->get();
                foreach ($results as $s) {
                     $listID[] =  $s->id;
        }
         return $listID[$no_urut];
        
        }

        function getAlternatifPV($id_alternatif,$id_kriteria) {
            $results = PV_Alternatif::select('nilai')
            ->where([
            ['id_alternatif', $id_alternatif],
            ['id_kriteria',$id_kriteria]
            ])->get();
           
            foreach ($results as $s) {
                $pv =  $s->nilai;
                        }

            return $pv;
        }

              
        // mencari priority vector kriteria
        function getKriteriaPV($id_kriteria) {
        
        $results = PV_Kriteria::select('nilai')->where('id_kriteria',$id_kriteria)->get();
        
        foreach ($results as $s) {
            $pv =  $s->nilai;
                    }


        return $pv;
    }


        $jmlKriteria = Kriteria::select('*')->count();
        $jmlAlternatif = Alternatif::select('*')->count();
        $alternatifs = Alternatif::select('nama')->get();
        $kriterias = Kriteria::select('nama')->get();

        $nilai			= array();

        // mendapatkan nilai tiap alternatif
        for ($x=0; $x <= ($jmlAlternatif-1); $x++) {
            // inisialisasi
            $nilai[$x] = 0;

            for ($y=0; $y <= ($jmlKriteria-1); $y++) {
                $id_alternatif 	= getAlternatifID($x);
                $id_kriteria	= getKriteriaID($y);

                $pv_alternatif	= getAlternatifPV($id_alternatif,$id_kriteria);
                $pv_kriteria	= getKriteriaPV($id_kriteria);

                $nilai[$x]	 	+= ($pv_alternatif * $pv_kriteria);
            }
        }

        // update nilai ranking
        for ($i=0; $i <= ($jmlAlternatif-1); $i++) { 
             $id_alternatif = getAlternatifID($i);
             DB::statement("INSERT INTO ranking VALUES ($id_alternatif,$nilai[$i]) ON DUPLICATE KEY UPDATE nilai=$nilai[$i]"); 
          
        }

        
        $nilaiDs = Rangking::select('nilai')->orderBy('nilai','DESC')->get();
        $langs = [];
        foreach($nilaiDs as $row)
        {
            $langs[]=  round($row->nilai*100);
        }
      
      
      
        $assets = ['chart', 'animation','langs'];
        $alternatifDbs = Rangking::select('alternatif.nama')->join('alternatif', 'alternatif.id','=','ranking.id_alternatif')->orderBy('nilai','DESC')->get();
        $alternatifChart = [];
        foreach($alternatifDbs as $row)
        {
            $alternatifChart[] = $row->nama;
        }
      
        

        $rangking = Rangking::select('ranking.id_alternatif', 'alternatif.nama','ranking.nilai', 'alternatif.id')
        ->join('alternatif', 'alternatif.id','=','ranking.id_alternatif')->orderBy('nilai','DESC')->get();

        return view('perbandingan.hasil.hasilakhir', [
            'alternatifs' => $alternatifs,
            // 'assets' => $assets,
            'kriterias' => $kriterias,
            'jmlKriteria' => $jmlKriteria,
            'jmlAlternatif' => $jmlAlternatif,
            'nilai' => $nilai,
            'rangking' => $rangking,
            'langs' => $langs,
            'alternatifChart' => $alternatifChart,

        ]);
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
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
      
    }
}
