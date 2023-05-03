<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\KriteriasDataTable;
use App\Models\User;
use App\Helpers\AuthHelper;
use Spatie\Permission\Models\Role;
use App\Models\Kriteria;
use App\Models\Alternatif;
use App\Models\IR;
use App\Models\Perbandingan_Kriteria;
use App\Models\Pv_Kriteria;

class SpkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( )
    {
        $n = Kriteria::select('nama')->count();
        $pilihan =  Kriteria::select('nama')->get();
        $listID = Kriteria::select('id')->get();
        return view('perbandingan.kriteria', [
            'n' => $n,
            'pilihan' => $pilihan, 
            'listID' => $listID
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

        function getKriteriaID($no_urut) {
	
            $results = Kriteria::select('id')->get();
                foreach ($results as $s) {
                     $listID[] =  $s->id;
        }
         return $listID[$no_urut];
        
        }

        
        function getAlternatifID($no_urut) {
	
            $results = Alternatif::select('id')->get();
                foreach ($results as $s) {
                     $listID[] =  $s->id;
                    }
                    return $listID[$no_urut];
        
        }

        function inputKriteriaPV ($id_kriteria,$pv) {
        
            $nupv = Pv_Kriteria::select('*')->where('id_kriteria',$id_kriteria)->count();
            // jika result kosong maka masukkan data baru
            // jika telah ada maka diupdate
            if ($nupv==0) {
                $pv_kriteria = Pv_Kriteria::create([
                    'id_kriteria' =>$id_kriteria,
                    'nilai' => $pv
                 ]);
            } else {
                 Pv_Kriteria::where('id_kriteria', $id_kriteria)
                ->update([
                    'nilai' => $pv
                ]);
            }
        
        
        }

        function getNilaiIR($jmlKriteria) {
            $nilaiIRS = IR::select('nilai')->where('jumlah', $jmlKriteria)->first();
            $nilaiIR = $nilaiIRS->nilai;
            return $nilaiIR;
        }

        
       // mencari Principe Eigen Vector (λ maks)
        function getEigenVector($matrik_a,$matrik_b,$n) {
	    $eigenvektor = 0;
	    for ($i=0; $i <= ($n-1) ; $i++) {
		$eigenvektor += ($matrik_a[$i] * (($matrik_b[$i]) / $n));
	    }

        	return $eigenvektor;
        }   

        // mencari Cons Index
        function getConsIndex($matrik_a,$matrik_b,$n) {
        	$eigenvektor = getEigenVector($matrik_a,$matrik_b,$n);
        	$consindex = ($eigenvektor - $n)/($n-1);

	    return $consindex;
        }

        // Mencari Consistency Ratio
        function getConsRatio($matrik_a,$matrik_b,$n) {
	     $consindex = getConsIndex($matrik_a,$matrik_b,$n);
	     $consratio = $consindex / getNilaiIR($n);

	        return $consratio;
        }


        $n = Kriteria::select('nama')->count();
        
        $matrik = array();
        $urut 	= 0;
        for ($x=0; $x <= ($n-2) ; $x++) {
            for ($y=($x+1); $y <= ($n-1) ; $y++) {
                $urut++;
                $pilih	= "pilih".$urut;
                $bobot 	= "bobot".$urut;
             
                if ($_POST[$pilih] == 1) {
                    $matrik[$x][$y] = $_POST[$bobot];
                    $matrik[$y][$x] = 1 / $_POST[$bobot];
                } else {
                    $matrik[$x][$y] = 1 / $_POST[$bobot];
                    $matrik[$y][$x] = $_POST[$bobot];
                }
           
           
              $id_kriteria1 = getKriteriaID($x);
              $id_kriteria2 = getKriteriaID($y);
              $nu = Perbandingan_Kriteria::select('*')->where('kriteria1', $id_kriteria1)->where('kriteria2', $id_kriteria2)->count();
              //kalau belum ada ya buat
              if($nu==0){
              $perbandingan_kriteria = Perbandingan_Kriteria::create([
                'kriteria1' =>$id_kriteria1,
                'kriteria2' =>$id_kriteria2,
                'nilai' => $matrik[$x][$y]
             ]);
             }
             else{
                Perbandingan_Kriteria::where('kriteria1', $id_kriteria1)->where('kriteria2', $id_kriteria2)
                ->update([
                    'nilai' => $matrik[$x][$y]
                ]);
             }
             
            }
           
        }

    // diagonal --> bernilai 1
	for ($i = 0; $i <= ($n-1); $i++) {
		$matrik[$i][$i] = 1;
	}

	// inisialisasi jumlah tiap kolom dan baris kriteria
	$jmlmpb = array();
	$jmlmnk = array();
	for ($i=0; $i <= ($n-1); $i++) {
		$jmlmpb[$i] = 0;
		$jmlmnk[$i] = 0;
	}

	// menghitung jumlah pada kolom kriteria tabel perbandingan berpasangan
	for ($x=0; $x <= ($n-1) ; $x++) {
		for ($y=0; $y <= ($n-1) ; $y++) {
			$value		= $matrik[$x][$y];
			$jmlmpb[$y] += $value;
		}
	}


    $jenis='kriteria';
	// menghitung jumlah pada baris kriteria tabel nilai kriteria
	// matrikb merupakan matrik yang telah dinormalisasi
	for ($x=0; $x <= ($n-1) ; $x++) {
		for ($y=0; $y <= ($n-1) ; $y++) {
			$matrikb[$x][$y] = $matrik[$x][$y] / $jmlmpb[$y];
			$value	= $matrikb[$x][$y];
			$jmlmnk[$x] += $value;
	    }

		// nilai priority vektor
		    $pv[$x]	 = $jmlmnk[$x] / $n;

		// memasukkan nilai priority vektor ke dalam tabel pv_kriteria dan pv_alternatif
            if ($jenis == 'kriteria') {
                $id_kriteria = getKriteriaID($x);
                inputKriteriaPV($id_kriteria,$pv[$x]);
            } 
            //else {
            // 	$id_kriteria	= getKriteriaID($jenis-1);
            // 	$id_alternatif	= getAlternatifID($x);
            // 	inputAlternatifPV($id_alternatif,$id_kriteria,$pv[$x]);
            // }
	}

	  // cek konsistensi
	  $eigenvektor = getEigenVector($jmlmpb,$jmlmnk,$n);
	  $consIndex   = getConsIndex($jmlmpb,$jmlmnk,$n);
	  $consRatio   = getConsRatio($jmlmpb,$jmlmnk,$n);


   
        $alternatifs = Alternatif::select('nama')->get();
        $kriterias = Kriteria::select('nama')->get();
        return view('perbandingan.hasil_kriteria', [
             'n' => $n,
             'kriterias' => $kriterias,
             'jmlmpb' =>$jmlmpb,
             'matrik' => $matrik,
             'matrikb' => $matrikb,
             'jmlmnk'=>$jmlmnk,
             'pv'=>$pv,
             'eigenvektor' => $eigenvektor,
             'consIndex' => $consIndex,
             'consRatio' => $consRatio
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
