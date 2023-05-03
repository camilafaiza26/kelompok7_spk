<x-app-layout >
    <div class="row">
        <div class="col-sm-12">
           <div class="card">
              <div class="card-header d-flex justify-content-between">
                 <div class="header-title">
                    <h4 class="card-title">Hasil Perbandingan Alternatif dengan Kriteria : {{$nama_kriteria->nama}}</h4>
                 </div>
              </div>
              <div class="card-body p-0">
                <section class="content">
                   
                    <div class="px-5">
                        <p class="mt-3">Matriks Perbandingan Berpasangan</p>
                    <table class="table table-bordered">      
                        <thead>
                            <tr>
                                <th>Kriteria</th>
                            @foreach($alternatifs as $alternatif)
                                 <th> {{$alternatif->nama}}</th>
                            @endforeach
                            </tr>
                        </thead>
                        <tbody>       
                  <?php
                    for ($x=0; $x <= ($n-1); $x++) {
                        echo "<tr>";
                        echo "<td>".$alternatifs[$x]->nama."</td>";
                            for ($y=0; $y <= ($n-1); $y++) {
                                echo "<td>".round($matrik[$x][$y],5)."</td>";
                            }
                
                        echo "</tr>";
                    }
                ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Jumlah</th>
                <?php
                        for ($i=0; $i <= ($n-1); $i++) {
                            echo "<th>".round($jmlmpb[$i],5)."</th>";
                        }
                ?>
                            </tr>
                        </tfoot>
                    </table>
                    </div>
                
                
                    <div class="px-5 py-1">
                    <table class="table table-bordered">
                        <p >Matriks Nilai Kriteria</p>
                        <thead>
                            <tr>
                                <th>Kriteria</th>
                                @foreach($alternatifs as $alternatif)
                                <th> {{$alternatif->nama}}</th>
                           @endforeach
                                <th>Jumlah</th>
                                <th>Priority Vector</th>
                            </tr>
                        </thead>
                        <tbody>
                       
                            <?php
                            for ($x=0; $x <= ($n-1); $x++) { 
                                echo "<tr>";
                                    echo "<td>".$alternatifs[$x]->nama."</td>";
                                    for ($y=0; $y <= ($n-1); $y++) { 
                                        echo "<td>".round($matrikb[$x][$y],5)."</td>";
                                    }
                        
                                echo "<td>".round($jmlmnk[$x],5)."</td>";
                                echo "<td>".round($pv[$x],5)."</td>";
                                echo "</tr>";
                            }
                        ?>
                
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="<?php echo ($n+2)?>">Principe Eigen Vector (λ maks)</th>
                                <th><?php echo (round($eigenvektor,5))?></th>
                            </tr>
                            <tr>
                                <th colspan="<?php echo ($n+2)?>">Consistency Index</th>
                                <th><?php echo (round($consIndex,5))?></th>
                            </tr>
                            <tr>
                                <th colspan="<?php echo ($n+2)?>">Consistency Ratio</th>
                                <th><?php echo (round(($consRatio * 100),2))?> %</th>
                            </tr>
                        </tfoot>
                    </table>   
                    </div>      
            </div>
            <?php
            if ($consRatio > 0.1) {
             ?>
             <div class="px-5 py-1">
             <div class="alert alert-danger " role="alert">
                Nilai Consistency Ratio melebihi 10% !!!
                <p>Mohon input kembali tabel perbandingan...</p>
              </div>
             </div>
</div>

</div>
</div>

<a  class="btn btn-primary" href="javascript:history.back()">
    Kembali
</a>
<?php
	}
     else {

        $akhir =  App\Models\Kriteria::select('*')->count();
        if ($jenis ==  $akhir) {
?>
<a  class="btn btn-primary" href="{{Route('rangking.store')}}">
    Hasil
</a>
<?php 
	}
    else {

?>
</div>
	<a href="{{Route('perbandingan-alternatif', $jenis+1)}}">
	<button class="btn btn-primary " style="float: right;">
		<i class="right arrow icon"></i>
		Lanjut
	</button>
	</a>

<?php

		}
	}

    ?>
</div>
</div>
</div>
</x-app-layout>