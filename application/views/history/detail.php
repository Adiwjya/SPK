<script type="text/javascript"> 
    
    var save_method; //for save method string
    var table;
    
    $(document).ready(function() {
        
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

    function save2(){
        
        var url = "<?php echo base_url(); ?>ranking/ajax_add_history";
        
        // ajax adding data to database
        $.ajax({
            url : url,
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function(data)
            {
                alert(data.status);
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
                            <h4 class="card-title">History Perbandingan Kriteria | ID : <?php echo $id ; ?></h4>
                            <h5></h5>
                            <h5>Tanggal : <?php echo $tanggal ; ?></h5>
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
                                            <td><?php echo $b11; ?></td>
                                            <td><?php echo $b12; ?></td>
                                            <td><?php echo $b13; ?></td>
                                            <td><?php echo $b14; ?></td>
                                            <td><?php echo $b15; ?></td>
                                            <td><?php echo $b16; ?></td>
                                
                                        </tr>
                                        <tr>
                                        <th scope="row"><?php echo $a2; ?></th>
                                            <td><?php echo $b21; ?></td>
                                            <td><?php echo $b22; ?></td>
                                            <td><?php echo $b23; ?></td>
                                            <td><?php echo $b24; ?></td>
                                            <td><?php echo $b25; ?></td>
                                            <td><?php echo $b26; ?></td>
                                       
                                        </tr>
                                        <tr>
                                        <th scope="row"><?php echo $a3; ?></th>
                                            <td><?php echo $b31 ; ?></td>
                                            <td><?php echo $b32 ; ?></td>
                                            <td><?php echo $b33 ; ?></td>
                                            <td><?php echo $b34 ; ?></td>
                                            <td><?php echo $b35 ; ?></td>
                                            <td><?php echo $b36 ; ?></td>
                                       
                                        </tr>
                                        <tr>
                                        <th scope="row"><?php echo $a4; ?></th>
                                            <td><?php echo $b41 ; ?></td>
                                            <td><?php echo $b42 ; ?></td>
                                            <td><?php echo $b43 ; ?></td>
                                            <td><?php echo $b44 ; ?></td>
                                            <td><?php echo $b45 ; ?></td>
                                            <td><?php echo $b46 ; ?></td>
                                        
                                        </tr>
                                        <tr>
                                        <th scope="row"><?php echo $a5; ?></th>
                                            <td><?php echo $b11 ; ?></td>
                                            <td><?php echo $b12 ; ?></td>
                                            <td><?php echo $b13 ; ?></td>
                                            <td><?php echo $b14 ; ?></td>
                                            <td><?php echo $b15 ; ?></td>
                                            <td><?php echo $b16 ; ?></td>
                                        
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
                                        <th scope="row"><?php echo $nama_1; ?></th>
                                        <td><?php echo $nilai_1 ; ?></td>
                                           
                                            
                                        </tr>
                                        <tr>
                                        <th scope="row"><?php echo $nama_2; ?></th>
                                        <td><?php echo $nilai_2 ; ?></td>
                                            
                                        </tr>
                                        <tr>
                                        <th scope="row"><?php echo $nama_2; ?></th>
                                        <td><?php echo $nilai_2 ; ?></td>
                                           
                                        </tr>
                                        <tr>
                                        <th scope="row"><?php echo $nama_2; ?></th>
                                        <td><?php echo $nilai_2 ; ?></td>
                                            
                                        </tr>
                                        <tr>
                                        <th scope="row"><?php echo $nama_2; ?></th>
                                        <td><?php echo $nilai_2 ; ?></td>
                                            
                                        </tr>
                                    </tbody>
                                </table>
                                </form>
                                <div class="card-footer">
                                    <button id="btnSave" type="button" class="btn btn-primary " ></button>
                                    <button id="btnPrint" type="button" class="btn btn-primary float-right" onclick="init()">Print/Cetak &nbsp;<span class="fa fa-print"></span></button>
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

