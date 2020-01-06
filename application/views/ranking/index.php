<script type="text/javascript"> 
    
    var save_method; //for save method string
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
        add();
    });

 
var e = jQuery.Event( "keydown", { keyCode: 80 } ); //80 itu kode  huruf "P" keydown itu ctrl
$('#form')[0].contentWindow.print();
jQuery( "form" ).trigger( e );



 function init(){
  var printContents = document.getElementById("form").innerHTML;
  var originalContents = document.body.innerHTML;
  document.body.innerHTML = printContents;

  window.print();
  document.body.innerHTML = originalContents;
 };



    
    function add(){
        save_method = 'add';
        save();
    }
    
    function save(){
        
        var url;
        if(save_method === 'add') {
            url = "<?php echo base_url(); ?>ranking/ajax_add";
        } else {
            url = "<?php echo base_url(); ?>nkriteria/ajax_edit";
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

            },
            error: function (jqXHR, textStatus, errorThrown){
                alert("Error json " + errorThrown);
                
                $('#btnSave').text('Save'); //change button text
                $('#btnSave').attr('disabled',false); //set button enable 
            }
        });
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
                            <h4 class="card-title">Perbandingan Kriteria</h4>
                        </div>
                        <hr>
                        <div class="card-content">
                            <div class="card-body">
                                <form  id="form" name="form">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                        <th scope="col">Nilai Eigen</th>
                                        <th scope="col"><?php echo $k1; ?></th>
                                        <th scope="col"><?php echo $k2; ?></th>
                                        <th scope="col"><?php echo $k3; ?></th>
                                        <th scope="col"><?php echo $k4; ?></th>
                                        <th scope="col"><?php echo $k5 ; ?></th>
                                        <th scope="col">Eigen Kriteria</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        <th scope="row"><?php echo $a1; ?></th>
                                            <td><?php echo $bk11; ?></td>
                                            <td><?php echo $bk21; ?></td>
                                            <td><?php echo $bk31; ?></td>
                                            <td><?php echo $bk41; ?></td>
                                            <td><?php echo $bk51; ?></td>
                                            <td><?php echo $bk1; ?></td>
                                        </tr>
                                        <tr>
                                        <th scope="row"><?php echo $a2; ?></th>
                                            <td><?php echo $bk12; ?></td>
                                            <td><?php echo $bk22; ?></td>
                                            <td><?php echo $bk32; ?></td>
                                            <td><?php echo $bk42; ?></td>
                                            <td><?php echo $bk52; ?></td>
                                            <td><?php echo $bk2; ?></td>
                                        </tr>
                                        <tr>
                                        <th scope="row"><?php echo $a3; ?></th>
                                            <td><?php echo $bk13; ?></td>
                                            <td><?php echo $bk23; ?></td>
                                            <td><?php echo $bk33; ?></td>
                                            <td><?php echo $bk43; ?></td>
                                            <td><?php echo $bk53; ?></td>
                                            <td><?php echo $bk3; ?></td>
                                        </tr>
                                        <tr>
                                        <th scope="row"><?php echo $a4; ?></th>
                                            <td><?php echo $bk14; ?></td>
                                            <td><?php echo $bk24; ?></td>
                                            <td><?php echo $bk34; ?></td>
                                            <td><?php echo $bk44; ?></td>
                                            <td><?php echo $bk54; ?></td>
                                            <td><?php echo $bk4; ?></td>
                                        </tr>
                                        <tr>
                                        <th scope="row"><?php echo $a5; ?></th>
                                            <td><?php echo $bk15; ?></td>
                                            <td><?php echo $bk25; ?></td>
                                            <td><?php echo $bk35; ?></td>
                                            <td><?php echo $bk45; ?></td>
                                            <td><?php echo $bk55; ?></td>
                                            <td><?php echo $bk5; ?></td>
                                        </tr>
                                        <tr>
                                        
                                    </tbody>
                                </table>
                                <div class="card-header">
                                    <h4 class="card-title">Nilai Ranking</h4>
                                </div>

                                

                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                        <th scope="col">Produk</th>
                                        <th scope="col">Nilai</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        <th scope="row"><?php echo $a1; ?></th>
                                            <td><?php $nr1 = ($bk11*$bk1)+($bk21*$bk2)+($bk31*$bk3)+($bk41*$bk4)+($bk51*$bk5); echo number_format($nr1,3) ; ?></td>
                                           
                                            <input type="hidden" name="nb1" value="<?php echo $nr1 ?>">
                                            <input type="hidden" name="ns1" value="<?php echo $a1 ?>"> 
                                        </tr>
                                        <tr>
                                        <th scope="row"><?php echo $a2; ?></th>
                                            <td><?php $nr2 = ($bk12*$bk1)+($bk22*$bk2)+($bk32*$bk3)+($bk42*$bk4)+($bk52*$bk5); echo number_format($nr2,3) ; ?></td>
                                          
                                            <input type="hidden" name="nb2" value="<?php echo $nr2 ?>">
                                            <input type="hidden" name="ns2" value="<?php echo $a2 ?>"> 
                                        </tr>
                                        <tr>
                                        <th scope="row"><?php echo $a3; ?></th>
                                            <td><?php $nr3 = ($bk13*$bk1)+($bk23*$bk2)+($bk33*$bk3)+($bk43*$bk4)+($bk53*$bk5); echo number_format($nr3,3) ; ?></td>
                                           
                                            <input type="hidden" name="nb3" value="<?php echo $nr3 ?>">
                                            <input type="hidden" name="ns3" value="<?php echo $a3 ?>"> 
                                        </tr>
                                        <tr>
                                        <th scope="row"><?php echo $a4; ?></th>
                                            <td><?php $nr4 = ($bk14*$bk1)+($bk24*$bk2)+($bk34*$bk3)+($bk44*$bk4)+($bk54*$bk5); echo number_format($nr4,3) ; ?></td>
                                            
                                            <input type="hidden" name="nb4" value="<?php echo $nr4 ?>">
                                            <input type="hidden" name="ns4" value="<?php echo $a4 ?>"> 
                                        </tr>
                                        <tr>
                                        <th scope="row"><?php echo $a5; ?></th>
                                            <td><?php $nr5 = ($bk15*$bk1)+($bk25*$bk2)+($bk35*$bk3)+($bk45*$bk4)+($bk55*$bk5); echo number_format($nr5,3) ; ?></td>
                                            
                                            <input type="hidden" name="nb5" value="<?php echo $nr5 ?>">
                                            <input type="hidden" name="ns5" value="<?php echo $a5 ?>"> 
                                        </tr>
                                    </tbody>
                                </table>
                                </form>
                                <div class="card-footer">
                                <button id="btnSave" type="button" class="btn btn-primary "></button>
                                    <button id="btnPrint" type="button" class="btn btn-primary float-right" onClick="init()">Print/Cetak &nbsp;<span class="fa fa-print"></span></button>
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

