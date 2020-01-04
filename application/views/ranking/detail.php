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
    
    function add(){
        save_method = 'add';
        save();
    }
    
    function save(){
        $('#btnSave').text('Saving...'); //change button text
        $('#btnSave').attr('disabled',true); //set button disable 
        
        var url;
        if(save_method === 'add') {
            url = "<?php echo base_url(); ?>nkriteria/ajax_add_bobot";
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
                            <h4 class="card-title">Perbandingan Kriteria</h4>
                        </div>
                        <hr>
                        <div class="card-content">
                            <div class="card-body">
                                <form action="#" id="form" name="form">
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

