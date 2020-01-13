<script type="text/javascript"> 
    
    var save_method = 'add'; //for save method string
    var table;
    
    $(document).ready(function() {
        table = $('#tb').DataTable( {
            ajax: "<?php echo base_url(); ?>alternatif/ajax_list"
        });
        
        $('.datepicker').datepicker({
            autoclose: true,
            format: "yyyy-mm-dd",
            todayHighlight: true,
            orientation: "top auto",
            todayBtn: true 
        });

        save2();

    });
    
    function add(){
        save_method = 'add';
        save();
    }
    
    function save(){
        $('#btnSave').text('Saving...'); //change button text
        $('#btnSave').attr('disabled',true); //set button disable 
        
        var url;
        if(save_method === 'add') {
            url = "<?php echo base_url(); ?>nalternatif/ajax_add_bobot";
        } else {
            url = "<?php echo base_url(); ?>nalternatif/ajax_edit";
        }
        
        // ajax adding data to database
        $.ajax({
            url : url,
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function(data)
            {
                $('#modal_form').modal('hide');
                lanjut()
                $('#btnSave').text('Mengalihkan Halaman'); //change button text
                $('#btnSave').attr('disabled',false); //set button enable 
            },
            error: function (jqXHR, textStatus, errorThrown){
                alert("Error json " + errorThrown);
                
                $('#btnSave').text('Save'); //change button text
                $('#btnSave').attr('disabled',false); //set button enable 
            }
        });
    }

    function save2(){
        $('#btnSave').text('Saving...'); //change button text
        $('#btnSave').attr('disabled',true); //set button disable 
        
        var url;
        if(save_method === 'add') {
            url = "<?php echo base_url(); ?>nalternatif/ajax_add_bobot";
        } else {
            url = "<?php echo base_url(); ?>nalternatif/ajax_edit";
        }
        
        // ajax adding data to database
        $.ajax({
            url : url,
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function(data)
            {
                $('#modal_form').modal('hide');
                $('#btnSave').text('Mengalihkan Halaman'); //change button text
                $('#btnSave').attr('disabled',false); //set button enable 
            },
            error: function (jqXHR, textStatus, errorThrown){
                alert("Error json " + errorThrown);
                
                $('#btnSave').text('Save'); //change button text
                $('#btnSave').attr('disabled',false); //set button enable 
            }
        });
    }

    function lanjut(){
        window.location.href = "<?php echo base_url(); ?>nalternatif";
    }
    
</script>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content" style="margin: 50px;">
      <div class="container-fluid">
      <div class="">
                <div class="col-xl-12 col-lg-12 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Perbandingan Alternatif Berdasarkan <?php echo $kriteria; ?></h4>
                        </div>
                        <hr>
                        <div class="card-content">
                            <div class="card-body">
                                <form action="#" id="form" name="form">
                                    <input type="hidden" name="kri" id="kri" value="<?php echo $idny; ?>">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                        <th scope="col">Antar Kriteria</th>
                                        <th scope="col"><?php echo $k1; ?></th>
                                        <th scope="col"><?php echo $k2; ?></th>
                                        <th scope="col"><?php echo $k3; ?></th>
                                        <th scope="col"><?php echo $k4; ?></th>
                                        <th scope="col"><?php echo $k5 ; ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        <th scope="row"><?php echo $k1; ?></th>
                                            <td>1</td>
                                            <td><?php echo $n1; ?></td>
                                            <td><?php echo $n2; ?></td>
                                            <td><?php echo $n3; ?></td>
                                            <td><?php echo $n4; ?></td>
                                        </tr>
                                        <tr>
                                        <th scope="row"><?php echo $k2; ?></th>
                                            <td><?php $nh1 = 1/$n1; echo number_format($nh1,3); ?></td>
                                            <td>1</td>
                                            <td><?php echo $n5; ?></td>
                                            <td><?php echo $n6; ?></td>
                                            <td><?php echo $n7; ?></td>
                                        </tr>
                                        <tr>
                                        <th scope="row"><?php echo $k3; ?></th>
                                            <td><?php $nh2 = 1/$n2; echo number_format($nh2,3); ?></td>
                                            <td><?php $nh5 = 1/$n5; echo number_format($nh5,3); ?></td>
                                            <td>1</td>
                                            <td><?php echo $n8; ?></td>
                                            <td><?php echo $n9; ?></td>
                                        </tr>
                                        <tr>
                                        <th scope="row"><?php echo $k4; ?></th>
                                            <td><?php $nh3 = 1/$n3; echo number_format($nh3,3); ?></td>
                                            <td><?php $nh6 = 1/$n6; echo number_format($nh6,3); ?></td>
                                            <td><?php $nh8 = 1/$n8; echo number_format($nh8,3); ?></td>
                                            <td>1</td>
                                            <td><?php echo $n10; ?></td>
                                        </tr>
                                        <tr>
                                        <th scope="row"><?php echo $k5; ?></th>
                                            <td><?php $nh4 = 1/$n4; echo number_format($nh4,3); ?></td>
                                            <td><?php $nh7 = 1/$n7; echo number_format($nh7,3); ?></td>
                                            <td><?php $nh9 = 1/$n9; echo number_format($nh9,3); ?></td>
                                            <td><?php $nh10 = 1/$n10; echo number_format($nh10,3); ?></td>
                                            <td>1</td>
                                        </tr>
                                        <tr>
                                        <th scope="row">Jumlah</th>
                                            <td><?php $h1 = 1+$nh1+$nh2+$nh3+$nh4; echo number_format($h1,3); ?></td>
                                            <td><?php $h2 = 1+$n1+$nh5+$nh6+$nh7; echo number_format($h2,3); ?></td>
                                            <td><?php $h3 = 1+$n2+$n5+$nh8+$nh9; echo number_format($h3,3); ?></td>
                                            <td><?php $h4 = 1+$n3+$n6+$n8+$nh10; echo number_format($h4,3); ?></td>
                                            <td><?php $h5 = 1+$n4+$n7+$n9+$n10; echo number_format($h5,3); ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="card-header">
                                    <h4 class="card-title">Normalisasi</h4>
                                </div>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                        <th scope="col">Nilai Bobot</th>
                                        <th scope="col"><?php echo $k1; ?></th>
                                        <th scope="col"><?php echo $k2; ?></th>
                                        <th scope="col"><?php echo $k3; ?></th>
                                        <th scope="col"><?php echo $k4; ?></th>
                                        <th scope="col"><?php echo $k5 ; ?></th>
                                        <th scope="col"><?php echo "Bobot" ; ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        <th scope="row"><?php echo $k1; ?></th>
                                            <td><?php $kamera1 = (1/$h1); echo number_format($kamera1,3); ?></td>
                                            <td><?php $kamera2 = ($n1/$h2); echo number_format($kamera2,3) ; ?></td>
                                            <td><?php $kamera3 = ($n2/$h3); echo number_format($kamera3,3) ; ?></td>
                                            <td><?php $kamera4 = ($n3/$h4); echo number_format($kamera4,3) ; ?></td>
                                            <td><?php $kamera5 = ($n4/$h5); echo number_format($kamera5,3) ; ?></td>
                                            <td><?php $kamera6 = number_format(($kamera1+$kamera2+$kamera3+$kamera4+$kamera5),3)/5; echo $kamera6; ?></td>
                                            <input type="hidden" name="nb1" value="<?php echo $kamera6 ?>"> 
                                        </tr>
                                        <tr>
                                        <th scope="row"><?php echo $k2; ?></th>
                                            <td><?php $harga1 = ($nh1/$h1); echo number_format($harga1,3) ; ?></td>
                                            <td><?php $harga2 = (1/$h2); echo number_format($harga2,3); ?></td>
                                            <td><?php $harga3 = ($n5/$h3); echo number_format($harga3,3); ?></td>
                                            <td><?php $harga4 = ($n6/$h4); echo number_format($harga4,3); ?></td>
                                            <td><?php $harga5 = ($n7/$h5); echo number_format($harga5,3); ?></td>
                                            <td><?php $harga6 = number_format(($harga1+$harga2+$harga3+$harga4+$harga5),3)/5; echo $harga6; ; ?></td> 
                                            <input type="hidden" name="nb2" value="<?php echo $harga6 ?>">
                                        </tr>
                                        <tr>
                                        <th scope="row"><?php echo $k3; ?></th>
                                            <td><?php $pros1 = ($nh2/$h1); echo number_format($pros1,3); ?></td>
                                            <td><?php $pros2 = ($nh5/$h2); echo number_format($pros2,3); ?></td>
                                            <td><?php $pros3 = (1/$h3); echo number_format($pros3,3); ?></td>
                                            <td><?php $pros4 = ($n8/$h4); echo number_format($pros4,3); ?></td>
                                            <td><?php $pros5 = ($n9/$h5); echo number_format($pros5,3); ?></td>
                                            <td><?php $pros6 = number_format(($pros1+$pros2+$pros3+$pros4+$pros5),3)/5; echo $pros6; ?></td>
                                            <input type="hidden" name="nb3" value="<?php echo $pros6 ?>">
                                        </tr>
                                        <tr>
                                        <th scope="row"><?php echo $k4; ?></th>
                                            <td><?php $ram1 = ($nh3/$h1); echo number_format($ram1,3); ?></td>
                                            <td><?php $ram2 = ($nh6/$h2); echo number_format($ram2,3); ?></td>
                                            <td><?php $ram3 = ($nh8/$h3); echo number_format($ram3,3); ?></td>
                                            <td><?php $ram4 = (1/$h4); echo number_format($ram4,3); ?></td>
                                            <td><?php $ram5 = ($n10/$h5); echo number_format($ram5,3); ?></td>
                                            <td><?php $ram6 = number_format(($ram1+$ram2+$ram3+$ram4+$ram5),3)/5; echo $ram6; ?></td>
                                            <input type="hidden" name="nb4" value="<?php echo $ram6 ?>">
                                        </tr>
                                        <tr>
                                        <th scope="row"><?php echo $k5; ?></th>
                                            <td><?php $gc1 = ($nh4/$h1);  echo number_format($gc1,3); ?></td>
                                            <td><?php $gc2 = ($nh7/$h2); echo number_format($gc2,3); ?></td>
                                            <td><?php $gc3 = ($nh9/$h3); echo number_format($gc3,3); ?></td>
                                            <td><?php $gc4 = ($nh10/$h4); echo number_format($gc4,3); ?></td>
                                            <td><?php $gc5 = (1/$h5); echo number_format($gc5,3); ?></td>
                                            <td><?php $gc6 =  number_format(($gc1+$gc2+$gc3+$gc4+$gc5),3)/5; echo $gc6; ?></td>
                                            <input type="hidden" name="nb5" value="<?php echo $gc6 ?>">
                                        </tr>
                                        <tr>
                                        <th scope="row">Jumlah</th>
                                            <td><?php  echo ($kamera1+$harga1+$pros1+$ram1+$gc1); ?></td>
                                            <td><?php  echo ($kamera2+$harga2+$pros2+$ram2+$gc2); ?></td>
                                            <td><?php  echo ($kamera3+$harga3+$pros3+$ram3+$gc3); ?></td>
                                            <td><?php  echo ($kamera4+$harga4+$pros4+$ram4+$gc4); ?></td>
                                            <td><?php  echo ($kamera5+$harga5+$pros5+$ram5+$gc5); ?></td>
                                            <td><?php  echo round(($kamera6+$harga6+$pros6+$ram6+$gc6)); ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                </form>
                                <div class="card-footer">
                                    <button id="btnSave" type="button" class="btn btn-primary" onclick="lanjut();">Lanjutkan Perhitungan Alternatif  &nbsp;<span class="fa fa-arrow-right"></span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

