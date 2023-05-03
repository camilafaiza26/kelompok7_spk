
<x-app-layout :assets="$assets ?? []">
    <div class="row">
        <div class="col-sm-12">
           <div class="card">
              <div class="card-header d-flex justify-content-between">
                 <div class="header-title">
                    <h4 class="card-title">Hasil Akhir Perhitungan</h4>
                 </div>
              </div>
              <div class="card-body p-0">
                <section class="content">
                   
                    <div class="px-5 py-1">
                        <table class="table table-bordered">
                            <p >Hasil Perhitungan</p>
                            <thead>
                                <tr>
                                    <th>Overall Composite Height</th>
                                    <th>Priority Vector (rata-rata)</th>
                                    @foreach ($alternatifs as $alternatif)
                                    <th>{{$alternatif->nama}}</th>
                                    @endforeach
                                 </tr>
                            </thead>
                            <tbody>
                                <?php

function getKriteriaID($no_urut) {
                   
                   $results = App\Models\Kriteria::select('id')->get();
                   foreach ($results as $s) {
                       $listID[] =  $s->id;
                   }
                   return $listID[$no_urut];
           
                   }
                   function getAlternatifID($no_urut) {
                   
                   $results = App\Models\Alternatif::select('id')->get();
                   foreach ($results as $s) {
                       $listID[] =  $s->id;
                   }
                   return $listID[$no_urut];
           
                   }
                   
                   // mencari priority vector kriteria
                function getKriteriaPV($id_kriteria) {
                    
                    $results = App\Models\PV_Kriteria::select('nilai')->where('id_kriteria',$id_kriteria)->get();
                    
                    foreach ($results as $s) {
                        $pv =  $s->nilai;
                                }


                    return $pv;
                }
                // mencari priority vector alternatif
                function getAlternatifPV($id_alternatif,$id_kriteria) {
                    $results = App\Models\PV_Alternatif::select('nilai')
                    ->where([
					['id_alternatif', $id_alternatif],
					['id_kriteria',$id_kriteria]
                    ])->get();
                   
                    foreach ($results as $s) {
                        $pv =  $s->nilai;
                                }
                    return $pv;
                }

                                for ($x=0; $x <= ($jmlKriteria-1) ; $x++) { 
                                    echo "<tr>";
                                    echo "<td>".$kriterias[$x]->nama."</td>";
                                    echo "<td>".round(getKriteriaPV(getKriteriaID($x)),5)."</td>";
                    
                                    for ($y=0; $y <= ($jmlAlternatif-1); $y++) { 
                                        echo "<td>".round(getAlternatifPV(getAlternatifID($y),getKriteriaID($x)),5)."</td>";
                                    }
                    
                    
                                    echo "</tr>";
                                }
                            ?>
                            <tfoot>
                                <tr>
                                    <th colspan="2">Total</th>
                                    <?php
                                    for ($i=0; $i <= ($jmlAlternatif-1); $i++) { 
                                        echo "<th>".round($nilai[$i],5)."</th>";
                                    }
                                    ?>
                                </tr>
                                </tfoot>

                            </tbody>
                        </table>   
                        </div>      

                
                
                    <div class="px-5 py-1">
                    <table class="table table-bordered">
                        <p >Perangkingan</p>
                        <thead>
                            <tr>
                                <th>Peringkat</th>
                                <th>Alternatif</th>
                                <th>Nilai Vector</th>
                            </tr>
                        </thead>
                        <tbody>      
                            @foreach ($rangking as $r)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$r->nama}}</td>
                                <td>{{$r->nilai}}</td>
                            </tr>   
                            @endforeach     
                        </tbody>
                    </table>   
                    </div>  

                   
                    <div class="px-5 py-3">
                        <p>Grafik</p>
                        <div>
                          
                            <div id="d-activity" class="d-activity"></div>
                        

                      </div>
                  
                       

                     

            </div>
         
</div>
</div>
</div>

</x-app-layout>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<script>
    (function (jQuery) {
  "use strict";
var nilai = JSON.parse('{{ json_encode($langs) }}');
var yAlternatif =  <?php echo json_encode($alternatifChart); ?>;
if (document.querySelectorAll('#d-activity').length) {
    const options = {
      series: [{
        name: 'Successful deals',
        data: nilai,
      }],
      chart: {
        type: 'bar',
        height: 230,
        stacked: true,
        toolbar: {
            show:false
          }
      },
      colors: ["#3a57e8"],
      plotOptions: {
        bar: {
          horizontal: false,
          columnWidth: '28%',
          endingShape: 'rounded',
          borderRadius: 5,
        },
      },
      legend: {
        show: false
      },
      dataLabels: {
        enabled: false
      },
      stroke: {
        show: true,
        width: 2,
        colors: ['transparent']
      },
      xaxis: {
        categories: yAlternatif,
        labels: {
          minHeight:20,
          maxHeight:20,
          style: {
            colors: "#8A92A6",
          },
        }
      },
      yaxis: {
        title: {
          text: ''
        },
        labels: {
            minWidth: 19,
            maxWidth: 19,
            style: {
              colors: "#8A92A6",
            },
        }
      },
      fill: {
        opacity: 1
      },
      tooltip: {
        y: {
          formatter: function (val) {
            return "Nilai Vektor " + val + "%"
          }
        }
      }
    };

    const chart = new ApexCharts(document.querySelector("#d-activity"), options);
    chart.render();
    document.addEventListener('ColorChange', (e) => {
    const newOpt = {colors: [e.detail.detail1, e.detail.detail2],}
    chart.updateOptions(newOpt)
    })
  }

})(jQuery)

    </script>