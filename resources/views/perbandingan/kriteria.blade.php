<x-app-layout>
        <div class="row">
            <div class="col-sm-12">
               <div class="card">
                  <div class="card-header d-flex justify-content-between">
                     <div class="header-title">
                        <h4 class="card-title">Perbandingan Kriteria</h4>
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
                   
                $results = App\Models\Kriteria::select('id')->get();
                foreach ($results as $s) {
                    $listID[] =  $s->id;
                }
                return $listID[$no_urut];
        
                }
        
                function getNilaiPerbandinganKriteria($kriteria1,$kriteria2) {
        
                    $id_kriteria1 = getKriteriaID($kriteria1);
                    $id_kriteria2 = getKriteriaID($kriteria2);
        
                    $npn = App\Models\Perbandingan_Kriteria::select('nilai')->where([
					['kriteria1', $id_kriteria1],
					['kriteria2',$id_kriteria2]
				    ])->count();

                    if($npn == 0){
                        $nilai = 1;
                    }
                    else {
                            $nilais = App\Models\Perbandingan_Kriteria::where([
                            ['kriteria1', $id_kriteria1],
                            ['kriteria2',$id_kriteria2]
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
        
        <form method="POST" action="{{Route('perbandingan-kriteria.store')}}">
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
                        @php
                           $nilai = getNilaiPerbandinganKriteria($x,$y);
                        @endphp
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
             
    </div>
</div>
</div>
<button type="submit" class="btn btn-primary" class="" >
    Submit
    </button>
</form>
</div>
</div>
</div>
</x-app-layout>