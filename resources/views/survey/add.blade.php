<x-app-layout :assets="$assets ?? []">
    <div class="row">
        <div class="col-sm-12">
           <div class="card">
              <div class="card-header d-flex justify-content-between">
                 <div class="header-title">
                    <h4 class="card-title">Survey</h4>
                 </div>
              </div>
              <div class="card-body p-0">
                <section class="content">
                    <div class="px-5">
    <form action="" method="POST" >
            <br><br>
    <font size="5">Prioritas Elemen</font><br>
    <font size="4">Menurut anda Kriteria mana yang sesuai dengan pilihan anda ?</font><br>
    <table class="table table-bordered"  >
                    <thead align="center">
                        <tr>
                            <th colspan="3">Kriteria</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                              	<td align="left"><input type="radio" id="" name="kriteria" value="">
      							<label for="">Antrian</label><br></td>
                                <td align="center">
                                <select class="form-select" name="kriteria" aria-label="Default select example" required>
                                <option value="" selected>-----</option> 
                                <option value="1">Kedua kriteria sama pentingnya</option>
                                <option value="2">Kriteria kiri mendekati sedikit lebih penting dari kanan</option>
                                <option value="3">Kriteria kiri sedikit lebih penting dari kanan</option>
                                <option value="4">Kriteria kiri mendekati lebih penting dari kanan</option>
                                <option value="5">Kriteria kiri lebih penting dari kanan</option>
                                <option value="6">Kriteria kiri mendekati sangat penting dari kanan</option>
                                <option value="7">Kriteria kiri sangat penting dari kanan</option>
                                <option value="8">Kriteria kiri mendekati mutlak sangat penting dari kanan</option>
                                <option value="9">Kriteria kiri mutlak sangat penting dari kanan</option>
                                </select></td>
      							<td align="left"><input type="radio" id="" name="kriteria" value="">
      							<label for="">Harga</label><br></td>
    
                        </tr>
                        <tr>
                              	<td align="left"><input type="radio" id="" name="kriteria2" value="">
      							<label for="">Antrian</label><br/></td>
                                <td align="center">
                                <select class="form-select" name="kriteria2" aria-label="Default select example" required>
                                <option value="" selected>-----</option> 
                                <option value="1">Kedua kriteria sama pentingnya</option>
                                <option value="2">Kriteria kiri mendekati sedikit lebih penting dari kanan</option>
                                <option value="3">Kriteria kiri sedikit lebih penting dari kanan</option>
                                <option value="4">Kriteria kiri mendekati lebih penting dari kanan</option>
                                <option value="5">Kriteria kiri lebih penting dari kanan</option>
                                <option value="6">Kriteria kiri mendekati sangat penting dari kanan</option>
                                <option value="7">Kriteria kiri sangat penting dari kanan</option>
                                <option value="8">Kriteria kiri mendekati mutlak sangat penting dari kanan</option>
                                <option value="9">Kriteria kiri mutlak sangat penting dari kanan</option>
                                </select></td>
      							<td align="left"><input type="radio" id="" name="kriteria2" value="">
      							<label for="">Kualitas</label><br></td>
                        </tr>
                        <tr>
                              	<td align="left"><input type="radio" id="" name="kriteria3" value="">
    							<label for="">Harga</label><br></td>
                                <td align="center">
                                <select class="form-select" name="kriteria3" aria-label="Default select example" required>
                                <option value="" selected>-----</option> 
                                <option value="1">Kedua kriteria sama pentingnya</option>
                                <option value="2">Kriteria kiri mendekati sedikit lebih penting dari kanan</option>
                                <option value="3">Kriteria kiri sedikit lebih penting dari kanan</option>
                                <option value="4">Kriteria kiri mendekati lebih penting dari kanan</option>
                                <option value="5">Kriteria kiri lebih penting dari kanan</option>
                                <option value="6">Kriteria kiri mendekati sangat penting dari kanan</option>
                                <option value="7">Kriteria kiri sangat penting dari kanan</option>
                                <option value="8">Kriteria kiri mendekati mutlak sangat penting dari kanan</option>
                                <option value="9">Kriteria kiri mutlak sangat penting dari kanan</option>
                                </select></td>
      							<td align="left"><input type="radio" id="" name="kriteria3" value="">
    							<label for="">Kualitas</label><br></td>
                        </tr>
                    </tbody>
    </table>
    <font size="4">Menurut anda Alternatif mana yang sesuai dengan pilihan anda ?</font><br>
    <font size="3">Berdasarkan Antrian</font><br>
    <table class="table table-bordered"  >
                    <thead align="center">
                        <tr>
                            <th colspan="3">Alternatif</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                              	<td align="left"><input type="radio" id="" name="alternatif" value="">
      							<label for="">Pertalite</label><br></td>
                                <td align="center">
                                <select class="form-select" name="alternatif" aria-label="Default select example" required>
                                <option value="" selected>-----</option> 
                                <option value="1">Kedua alternatif sama pentingnya</option>
                                <option value="2">Alternatif kiri mendekati sedikit lebih penting dari kanan</option>
                                <option value="3">Alternatif kiri sedikit lebih penting dari kanan</option>
                                <option value="4">Alternatif kiri mendekati lebih penting dari kanan</option>
                                <option value="5">Alternatif kiri lebih penting dari kanan</option>
                                <option value="6">Alternatif kiri mendekati sangat penting dari kanan</option>
                                <option value="7">Alternatif kiri sangat penting dari kanan</option>
                                <option value="8">Alternatif kiri mendekati mutlak sangat penting dari kanan</option>
                                <option value="9">Alternatif kiri mutlak sangat penting dari kanan</option>
                                </select></td>
      							<td align="left"><input type="radio" id="" name="alternatif" value="">
      							<label for="">Pertamax</label><br></td>
                        </tr>
                        <tr>
                              	<td align="left"><input type="radio" id="" name="alternatif2" value="">
      							<label for="">Pertalite</label><br></td>
                                <td align="center">
                                <select class="form-select" name="alternatif2" aria-label="Default select example" required>
                                <option value="" selected>-----</option> 
                                <option value="1">Kedua alternatif sama pentingnya</option>
                                <option value="2">Alternatif kiri mendekati sedikit lebih penting dari kanan</option>
                                <option value="3">Alternatif kiri sedikit lebih penting dari kanan</option>
                                <option value="4">Alternatif kiri mendekati lebih penting dari kanan</option>
                                <option value="5">Alternatif kiri lebih penting dari kanan</option>
                                <option value="6">Alternatif kiri mendekati sangat penting dari kanan</option>
                                <option value="7">Alternatif kiri sangat penting dari kanan</option>
                                <option value="8">Alternatif kiri mendekati mutlak sangat penting dari kanan</option>
                                <option value="9">Alternatif kiri mutlak sangat penting dari kanan</option>
                                </select></td>
      							<td align="left"><input type="radio" id="" name="alternatif2" value="">
      							<label for="">Pertamax Turbo</label><br></td>
                        </tr>
                        <tr>
                              	<td align="left"><input type="radio" id="" name="alternatif3" value="">
      							<label for="">Pertamax</label><br></td>
                                <td align="center">
                                <select class="form-select" name="alternatif3" aria-label="Default select example" required>
                                <option value="" selected>-----</option> 
                                <option value="1">Kedua alternatif sama pentingnya</option>
                                <option value="2">Alternatif kiri mendekati sedikit lebih penting dari kanan</option>
                                <option value="3">Alternatif kiri sedikit lebih penting dari kanan</option>
                                <option value="4">Alternatif kiri mendekati lebih penting dari kanan</option>
                                <option value="5">Alternatif kiri lebih penting dari kanan</option>
                                <option value="6">Alternatif kiri mendekati sangat penting dari kanan</option>
                                <option value="7">Alternatif kiri sangat penting dari kanan</option>
                                <option value="8">Alternatif kiri mendekati mutlak sangat penting dari kanan</option>
                                <option value="9">Alternatif kiri mutlak sangat penting dari kanan</option>
                                </select></td>
      							<td align="left"><input type="radio" id="" name="alternatif3" value="">
      							<label for="">Pertamax Turbo</label><br></td>
                        </tr>
                    </tbody>
    </table>
    <font size="3">Berdasarkan Harga</font><br>
    <table class="table table-bordered"  >
                    <thead align="center">
                        <tr>
                            <th colspan="3">Alternatif</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                              	<td align="left"><input type="radio" id="" name="alternatif4" value="">
      							<label for="">Pertalite</label><br></td>
                                <td align="center">
                                <select class="form-select" name="alternatif4" aria-label="Default select example" required>
                                <option value="" selected>-----</option> 
                                <option value="1">Kedua alternatif sama pentingnya</option>
                                <option value="2">Alternatif kiri mendekati sedikit lebih penting dari kanan</option>
                                <option value="3">Alternatif kiri sedikit lebih penting dari kanan</option>
                                <option value="4">Alternatif kiri mendekati lebih penting dari kanan</option>
                                <option value="5">Alternatif kiri lebih penting dari kanan</option>
                                <option value="6">Alternatif kiri mendekati sangat penting dari kanan</option>
                                <option value="7">Alternatif kiri sangat penting dari kanan</option>
                                <option value="8">Alternatif kiri mendekati mutlak sangat penting dari kanan</option>
                                <option value="9">Alternatif kiri mutlak sangat penting dari kanan</option>
                                </select></td>
      							<td align="left"><input type="radio" id="" name="alternatif4" value="">
      							<label for="">Pertamax</label><br></td>
                        </tr>
                        <tr>
                              	<td align="left"><input type="radio" id="" name="alternatif5" value="">
      							<label for="">Pertalite</label><br></td>
                                <td align="center">
                                <select class="form-select" name="alternatif5" aria-label="Default select example" required>
                                <option value="" selected>-----</option> 
                                <option value="1">Kedua alternatif sama pentingnya</option>
                                <option value="2">Alternatif kiri mendekati sedikit lebih penting dari kanan</option>
                                <option value="3">Alternatif kiri sedikit lebih penting dari kanan</option>
                                <option value="4">Alternatif kiri mendekati lebih penting dari kanan</option>
                                <option value="5">Alternatif kiri lebih penting dari kanan</option>
                                <option value="6">Alternatif kiri mendekati sangat penting dari kanan</option>
                                <option value="7">Alternatif kiri sangat penting dari kanan</option>
                                <option value="8">Alternatif kiri mendekati mutlak sangat penting dari kanan</option>
                                <option value="9">Alternatif kiri mutlak sangat penting dari kanan</option>
                                </select></td>
      							<td align="left"><input type="radio" id="" name="alternatif5" value="">
      							<label for="">Pertamax Turbo</label><br></td>
                        </tr>
                        <tr>
                              	<td align="left"><input type="radio" id="" name="alternatif6" value="">
      							<label for="">Pertamax</label><br></td>
                                <td align="center">
                                <select class="form-select" name="alternatif6" aria-label="Default select example" required>
                                <option value="" selected>-----</option> 
                                <option value="1">Kedua alternatif sama pentingnya</option>
                                <option value="2">Alternatif kiri mendekati sedikit lebih penting dari kanan</option>
                                <option value="3">Alternatif kiri sedikit lebih penting dari kanan</option>
                                <option value="4">Alternatif kiri mendekati lebih penting dari kanan</option>
                                <option value="5">Alternatif kiri lebih penting dari kanan</option>
                                <option value="6">Alternatif kiri mendekati sangat penting dari kanan</option>
                                <option value="7">Alternatif kiri sangat penting dari kanan</option>
                                <option value="8">Alternatif kiri mendekati mutlak sangat penting dari kanan</option>
                                <option value="9">Alternatif kiri mutlak sangat penting dari kanan</option>
                                </select></td>
      							<td align="left"><input type="radio" id="" name="alternatif6" value="">
      							<label for="">Pertamax Turbo</label><br></td>
                        </tr>
                    </tbody>
    </table>
    <font size="3">Berdasarkan Kualitas</font><br>
    <table class="table table-bordered"  >
                    <thead align="center">
                        <tr>
                            <th colspan="3" >Alternatif</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                              	<td align="left"><input type="radio" id="" name="alternatif7" value="">
      							<label for="">Pertalite</label><br></td>
                                <td align="center">
                                <select class="form-select" name="alternatif7" aria-label="Default select example" required>
                                <option value="" selected>-----</option> 
                                <option value="1">Kedua alternatif sama pentingnya</option>
                                <option value="2">Alternatif kiri mendekati sedikit lebih penting dari kanan</option>
                                <option value="3">Alternatif kiri sedikit lebih penting dari kanan</option>
                                <option value="4">Alternatif kiri mendekati lebih penting dari kanan</option>
                                <option value="5">Alternatif kiri lebih penting dari kanan</option>
                                <option value="6">Alternatif kiri mendekati sangat penting dari kanan</option>
                                <option value="7">Alternatif kiri sangat penting dari kanan</option>
                                <option value="8">Alternatif kiri mendekati mutlak sangat penting dari kanan</option>
                                <option value="9">Alternatif kiri mutlak sangat penting dari kanan</option>
                                </select></td>
      							<td align="left"><input type="radio" id="" name="alternatif7" value="">
      							<label for="">Pertamax</label><br></td>
                        </tr>
                        <tr>
                              	<td align="left"><input type="radio" id="" name="alternatif8" value="">
      							<label for="">Pertalite</label><br></td>
                                <td align="center">
                                <select class="form-select" name="alternatif8" aria-label="Default select example" required>
                                <option value="" selected>-----</option> 
                                <option value="1">Kedua alternatif sama pentingnya</option>
                                <option value="2">Alternatif kiri mendekati sedikit lebih penting dari kanan</option>
                                <option value="3">Alternatif kiri sedikit lebih penting dari kanan</option>
                                <option value="4">Alternatif kiri mendekati lebih penting dari kanan</option>
                                <option value="5">Alternatif kiri lebih penting dari kanan</option>
                                <option value="6">Alternatif kiri mendekati sangat penting dari kanan</option>
                                <option value="7">Alternatif kiri sangat penting dari kanan</option>
                                <option value="8">Alternatif kiri mendekati mutlak sangat penting dari kanan</option>
                                <option value="9">Alternatif kiri mutlak sangat penting dari kanan</option>
                                </select></td>
      							<td align="left"><input type="radio" id="" name="alternatif8" value="">
      							<label for="">Pertamax Turbo</label><br></td>
                        </tr>
                        <tr>
                              	<td align="left"><input type="radio" id="" name="alternatif9" value="">
      							<label for="">Pertamax</label><br></td>
                                <td align="center">
                                <select class="form-select" name="alternatif9" aria-label="Default select example" required>
                                <option value="" selected>-----</option> 
                                <option value="1">Kedua alternatif sama pentingnya</option>
                                <option value="2">Alternatif kiri mendekati sedikit lebih penting dari kanan</option>
                                <option value="3">Alternatif kiri sedikit lebih penting dari kanan</option>
                                <option value="4">Alternatif kiri mendekati lebih penting dari kanan</option>
                                <option value="5">Alternatif kiri lebih penting dari kanan</option>
                                <option value="6">Alternatif kiri mendekati sangat penting dari kanan</option>
                                <option value="7">Alternatif kiri sangat penting dari kanan</option>
                                <option value="8">Alternatif kiri mendekati mutlak sangat penting dari kanan</option>
                                <option value="9">Alternatif kiri mutlak sangat penting dari kanan</option>
                                </select></td>
      							<td align="left"><input type="radio" id="" name="alternatif9" value="">
      							<label for="">Pertamax Turbo</label><br></td>
                        </tr>
                    </tbody>
    </table>
    <br><br>
            <center><button type="submit" name="submit" class="btn btn-primary">Kirim Survey</button></center>
    </form>
</div>
           </div>
        </div>
    </div>
    </x-app-layout>