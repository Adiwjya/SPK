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
            url = "<?php echo base_url(); ?>nkriteria/ajax_add";
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
                alert(data.status);
                $('#modal_form').modal('hide');
                lanjut()
                $('#btnSave').text('Simpan'); //change button text
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
        window.location.href = "<?php echo base_url(); ?>nkriteria/detail";
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
                            <h4 class="card-title">Penilaian Kriteria</h4>
                        </div>
                        <hr>
                        <div class="card-content">
                            <div class="card-body">
                                <form action="#" id="form" name="form">
                                <div class="col-md-12 col-xs-12 col-sm-12" style="margin: 10px;">
                                <label class="col-sm-4 col-form-label" style="text-align: right;"><?php echo $k1; ?></label>
                                <select class="col-sm-3 form-control" style="display: unset;" id="pa1" name="pa1">
                                <?php
                                foreach ($np->result() as $row) {
                                    ?>
                                <option value="<?php echo $row->nilai; ?>"><?php echo $row->nama; ?></option>
                                    <?php
                                }
                                ?>
                                </select>
                                <label class="col-sm-4 col-form-label" style="text-align: left;" ><?php echo $k2; ?></label>
                                </div>
                                <div class="col-md-12 col-xs-12 col-sm-12" style="margin: 10px;">
                                <label class="col-sm-4 col-form-label" style="text-align: right;"><?php echo $k1; ?></label>
                                <select class="col-sm-3 form-control" style="display: unset;" id="pa2" name="pa2">
                                <?php
                                foreach ($np->result() as $row) {
                                    ?>
                                <option value="<?php echo $row->nilai; ?>"><?php echo $row->nama; ?></option>
                                    <?php
                                }
                                ?>
                                </select>
                                <label class="col-sm-4 col-form-label" style="text-align: left;" ><?php echo $k3; ?></label>
                                </div>
                                <div class="col-md-12 col-xs-12 col-sm-12" style="margin: 10px;">
                                <label class="col-sm-4 col-form-label" style="text-align: right;"><?php echo $k1; ?></label>
                                <select class="col-sm-3 form-control" style="display: unset;" id="pa3" name="pa3">
                                <?php
                                foreach ($np->result() as $row) {
                                    ?>
                                <option value="<?php echo $row->nilai; ?>"><?php echo $row->nama; ?></option>
                                    <?php
                                }
                                ?>
                                </select>
                                <label class="col-sm-4 col-form-label" style="text-align: left;" ><?php echo $k4; ?></label>
                                </div>
                                <div class="col-md-12 col-xs-12 col-sm-12" style="margin: 10px;">
                                <label class="col-sm-4 col-form-label" style="text-align: right;"><?php echo $k1; ?></label>
                                <select class="col-sm-3 form-control" style="display: unset;" id="pa4" name="pa4">
                                <?php
                                foreach ($np->result() as $row) {
                                    ?>
                                <option value="<?php echo $row->nilai; ?>"><?php echo $row->nama; ?></option>
                                    <?php
                                }
                                ?>
                                </select>
                                <label class="col-sm-4 col-form-label" style="text-align: left;" ><?php echo $k5; ?></label>
                                </div>
                                <div class="col-md-12 col-xs-12 col-sm-12" style="margin: 10px;">
                                <label class="col-sm-4 col-form-label" style="text-align: right;"><?php echo $k2; ?></label>
                                <select class="col-sm-3 form-control" style="display: unset;" id="pa5" name="pa5">
                                <?php
                                foreach ($np->result() as $row) {
                                    ?>
                                <option value="<?php echo $row->nilai; ?>"><?php echo $row->nama; ?></option>
                                    <?php
                                }
                                ?>
                                </select>
                                <label class="col-sm-4 col-form-label" style="text-align: left;" ><?php echo $k3; ?></label>
                                </div>
                                <div class="col-md-12 col-xs-12 col-sm-12" style="margin: 10px;">
                                <label class="col-sm-4 col-form-label" style="text-align: right;"><?php echo $k2; ?></label>
                                <select class="col-sm-3 form-control" style="display: unset;" id="pa6" name="pa6">
                                <?php
                                foreach ($np->result() as $row) {
                                    ?>
                                <option value="<?php echo $row->nilai; ?>"><?php echo $row->nama; ?></option>
                                    <?php
                                }
                                ?>
                                </select>
                                <label class="col-sm-4 col-form-label" style="text-align: left;" ><?php echo $k4; ?></label>
                                </div>
                                <div class="col-md-12 col-xs-12 col-sm-12" style="margin: 10px;">
                                <label class="col-sm-4 col-form-label" style="text-align: right;"><?php echo $k2; ?></label>
                                <select class="col-sm-3 form-control" style="display: unset;" id="pa7" name="pa7">
                                <?php
                                foreach ($np->result() as $row) {
                                    ?>
                                <option value="<?php echo $row->nilai; ?>"><?php echo $row->nama; ?></option>
                                    <?php
                                }
                                ?>
                                </select>
                                <label class="col-sm-4 col-form-label" style="text-align: left;" ><?php echo $k5; ?></label>
                                </div>
                                <div class="col-md-12 col-xs-12 col-sm-12" style="margin: 10px;">
                                <label class="col-sm-4 col-form-label" style="text-align: right;"><?php echo $k3; ?></label>
                                <select class="col-sm-3 form-control" style="display: unset;" id="pa8" name="pa8">
                                <?php
                                foreach ($np->result() as $row) {
                                    ?>
                                <option value="<?php echo $row->nilai; ?>"><?php echo $row->nama; ?></option>
                                    <?php
                                }
                                ?>
                                </select>
                                <label class="col-sm-4 col-form-label" style="text-align: left;" ><?php echo $k4; ?></label>
                                </div>
                                <div class="col-md-12 col-xs-12 col-sm-12" style="margin: 10px;">
                                <label class="col-sm-4 col-form-label" style="text-align: right;"><?php echo $k3; ?></label>
                                <select class="col-sm-3 form-control" style="display: unset;" id="pa9" name="pa9">
                                <?php
                                foreach ($np->result() as $row) {
                                    ?>
                                <option value="<?php echo $row->nilai; ?>"><?php echo $row->nama; ?></option>
                                    <?php
                                }
                                ?>
                                </select>
                                <label class="col-sm-4 col-form-label" style="text-align: left;" ><?php echo $k5; ?></label>
                                </div>
                                <div class="col-md-12 col-xs-12 col-sm-12" style="margin: 10px;">
                                <label class="col-sm-4 col-form-label" style="text-align: right;"><?php echo $k4; ?></label>
                                <select class="col-sm-3 form-control" style="display: unset;" id="pa10" name="pa10">
                                <?php
                                foreach ($np->result() as $row) {
                                    ?>
                                <option value="<?php echo $row->nilai; ?>"><?php echo $row->nama; ?></option>
                                    <?php
                                }
                                ?>
                                </select>
                                <label class="col-sm-4 col-form-label" style="text-align: left;" ><?php echo $k5; ?></label>
                                </div>
                               
                                </form>
                                 <div class="card-footer">
                                    <button id="btnSave" type="button" class="btn btn-primary" onclick="add();">Simpan </button>
                                    <button id="btnSave" type="button" class="btn btn-primary float-right" onclick="lanjut();">Detail Normalisasi yang sudah ada &nbsp;<span class="fa fa-arrow-right"></span></button>
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

