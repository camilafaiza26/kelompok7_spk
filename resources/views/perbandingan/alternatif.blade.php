<x-app-layout>
    <div class="row">
        <div class="col-sm-12">
           <div class="card">
              <div class="card-header d-flex justify-content-between">
                 <div class="header-title">
                     @php
                     $jenis = $id;
                     function getKriteriaNama($no_urut) {
                        $results = App\Models\Kriteria::select('nama')->orderBy('id', 'ASC')->get();
                        foreach ($results as $s) {
                          $nama[] =  $s->nama;
                         }
                        return $nama[($no_urut)];
                        }
                         
                     @endphp
                    <h4 class="card-title">Perbandingan Alternatif Dengan <?php echo getKriteriaNama($jenis-1) ?> </h4>
                 </div>
              </div>
              <div class="card-body p-0">
                 <div class="table-responsive mt-4">
                    <table id="basic-table" class="table table-striped mb-0" role="grid">
                        <thead>
                            <tr>
                                <th colspan="2" class="text-center">Pilih yang lebih penting</th>
                                <th>Nilai perbandingan</th>
                            </tr>
                        </thead>
        <tbody>

            @php
            function getKriteriaID($no_urut) {
               
            $results = App\Models\Kriteria::select('id')->orderBy('id','ASC')->get();
            foreach ($results as $s) {
                $listID[] =  $s->id;
            }
            return $listID[$no_urut];
    
            }
    
            function getAlternatifID($no_urut) {
               
            $results = App\Models\Alternatif::select('id')->orderBy('id','ASC')->get();
            foreach ($results as $s) {
                $listID[] =  $s->id;
            }
            return $listID[$no_urut];
    
            }

            function getNilaiPerbandinganAlternatif ($alternatif1,$alternatif2,$pembanding) {
    
                $id_alternatif1 = getAlternatifID($alternatif1);
	            $id_alternatif2 = getAlternatifID($alternatif2);
	            $id_pembanding  = getKriteriaID($pembanding);
    
                $puns = App\Models\Perbandingan_Alternatif::select('nilai')->where([
					['alternatif1', $id_alternatif1],
					['alternatif2',$id_alternatif2],
                    ['pembanding', $id_pembanding]
				    ])->count();
                
                if($puns ==0){
                    $nilai=1;
                }

                else{
                    $nilais = App\Models\Perbandingan_Alternatif::select('nilai')->where([
                    ['alternatif1', $id_alternatif1],
                    ['alternatif2',$id_alternatif2],
                    ['pembanding', $id_pembanding]
                    ])->get();

                    foreach ($nilais as $s) {
                        $nilai =  $s->nilai;
                    }

                }
              return $nilai;
            }   
             @endphp
    <?php

    //inisialisasi
    $urut = 0;

    for ($x=0; $x <= ($n - 2); $x++) {
        for ($y=($x+1); $y <= ($n - 1) ; $y++) {

      $urut++;

    ?>
    
    <form method="POST" action="{{Route('perbandingan-alternatif.store')}}">
        @csrf
            <tr>
                <td>
                    <div class="field">
                        <div class="ui radio checkbox">
                            <input name="pilih<?php echo $urut?>" value="1" checked="" class="hidden" type="radio">
                            <label><?php echo $pilihan[$x]->nama; ?></label>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="form-group">
                        <div class="ui radio checkbox">
                            <input name="pilih<?php echo $urut?>" value="2" class="hidden" type="radio">
                            <label><?php echo $pilihan[$y]->nama; ?></label>
                            
                        </div>
                    </div>
                </td>
                
                <td>
                    <?php
                  
                     $nilai = getNilaiPerbandinganAlternatif($x,$y,($jenis-1));
                     
                    ?>
                    <div class="form-group">
                        <input type="text" name="bobot<?php echo $urut?>" value="<?php echo $nilai?>" required>
                    </div>
                </td>
            </tr>
            <?php
        }
    }

    ?>
   
        </tbody>
    </table>
    <input type="text" name="jenis" value="<?php echo $jenis; ?>" hidden>

</div>
</div>
</div>
<button type="submit" class="btn btn-primary"   >
Lanjut
</button>
</form>
</div>
</div>
</div>
</x-app-layout>