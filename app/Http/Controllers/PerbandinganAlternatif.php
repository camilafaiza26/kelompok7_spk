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
use App\Models\Perbandingan_Alternatif;
use App\Models\Perbandingan_Kriteria;
use App\Models\Pv_Alternatif;
use App\Models\Pv_Kriteria;

class PerbandinganAlternatif extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $n = Alternatif::select('nama')->count();
        $pilihan =  Alternatif::select('nama')->get();
        $listID = Alternatif::select('id')->get();
        return view('perbandingan.alternatif', [
            'id' => $id,
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

        $jenis = $_POST['jenis'];
        
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

        function inputAlternatifPV($id_alternatif,$id_kriteria,$pv){
            $nupv = Pv_Alternatif::where('id_kriteria', $id_kriteria)->where('id_alternatif',$id_alternatif)->count();
            // jika result kosong maka masukkan data baru
            // jika telah ada maka diupdate
            if ($nupv==0) {
                $pv_alternatif = Pv_Alternatif::create([
                    'id_alternatif' =>$id_alternatif,
                    'id_kriteria' =>$id_kriteria,
                    'nilai' => $pv
                 ]);
            } else {
                 Pv_Alternatif::where('id_kriteria', $id_kriteria)->where('id_alternatif',$id_alternatif)
                ->update([
                    'nilai' => $pv
                ]);
            }
        }



        $n = Alternatif::select('nama')->count();
        
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
           
        
                // inputDataPerbandinganAlternatif($x,$y,($jenis-1),$matrik[$x][$y]);

           
              $id_alternatif1 = getAlternatifID($x);
	          $id_alternatif2 = getAlternatifID($y);
	          $id_pembanding  = getKriteriaID($jenis-1);

              $nu= Perbandingan_Alternatif::where('alternatif1', $id_alternatif1)->where('alternatif2', $id_alternatif2)->where('pembanding', $id_pembanding)->count();
   
              //kalau belum ada ya buat
              if($nu==0){
              $perbandingan_alternatif = Perbandingan_Alternatif::create([
                'alternatif1' =>$id_alternatif1,
                'alternatif2' =>$id_alternatif2,
                'pembanding' => $id_pembanding,
                'nilai' => $matrik[$x][$y]
             ]);
             }
             else{
                Perbandingan_Alternatif::where('alternatif1', $id_alternatif1)->where('alternatif2', $id_alternatif2)->where('pembanding', $id_pembanding)
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

		//emasukkan nilai priority vektor ke dalam tabel pv_kriteria dan pv_alternatif
          
            	$id_kriteria	= getKriteriaID($jenis-1);
            	$id_alternatif	= getAlternatifID($x);
            	inputAlternatifPV($id_alternatif,$id_kriteria,$pv[$x]);
            
	}

	  // cek konsistensi
	  $eigenvektor = getEigenVector($jmlmpb,$jmlmnk,$n);
	  $consIndex   = getConsIndex($jmlmpb,$jmlmnk,$n);
	  $consRatio   = getConsRatio($jmlmpb,$jmlmnk,$n);


   
        $alternatifs = Alternatif::select('nama')->get();
        $kriterias = Kriteria::select('nama')->get();
        $nama_kriteria = Kriteria::select('nama')->where('id', $jenis)->first();

        return view('perbandingan.hasil_alternatif', [
             'n' => $n,
             'alternatifs' => $alternatifs,
             'nama_kriteria' => $nama_kriteria,
             'kriterias' => $kriterias,
             'jenis' => $jenis,
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
