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
    
    function reload(){
        table.ajax.reload(null,false); //reload datatable ajax
    }
    
    function add(){
        save_method = 'add';
        save();
        // $('#form')[0].reset(); // reset form on modals
        // $('#modal_form').modal('show'); // show bootstrap modal
        // $('.modal-title').text('Tambah alternatif'); // Set Title to Bootstrap modal title
    }
    
    function save(){
        $('#btnSave').text('Saving...'); //change button text
        $('#btnSave').attr('disabled',true); //set button disable 
        
        var url;
        if(save_method === 'add') {
            url = "<?php echo base_url(); ?>alternatif/ajax_add";
        } else {
            url = "<?php echo base_url(); ?>alternatif/ajax_edit";
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
                reload();
                    
                $('#btnSave').text('Save'); //change button text
                $('#btnSave').attr('disabled',false); //set button enable 
            },
            error: function (jqXHR, textStatus, errorThrown){
                alert("Error json " + errorThrown);
                
                $('#btnSave').text('Save'); //change button text
                $('#btnSave').attr('disabled',false); //set button enable 
            }
        });
    }
    
    function hapus(id, nama){
        if(confirm("Apakah anda yakin menghapus " + nama + " ?")){
            // ajax delete data to database
            $.ajax({
                url : "<?php echo base_url(); ?>alternatif/hapus/" + id,
                type: "POST",
                dataType: "JSON",
                success: function(data){
                    alert(data.status);
                    reload();
                },error: function (jqXHR, textStatus, errorThrown){
                    alert('Error hapus data');
                }
            });
        }
    }
    
    function ganti(id){
        save_method = 'update';
        $('#form')[0].reset(); // reset form on modals
        $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
        $('.modal-title').text('Ganti Alternatif'); // Set title to Bootstrap modal title
        
        //Ajax Load data from ajax
        $.ajax({
            url : "<?php echo base_url(); ?>alternatif/ganti/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data){
                $('[name="id"]').val(data.id );
                $('[name="nama"]').val(data.nama);
            },
            error: function (jqXHR, textStatus, errorThrown){
                alert('Error get data');
            }
        });
    }

    function showbarang(){
        $('#modal_barang').modal('show'); // show bootstrap modal
        tbbarang = $('#tbbarang').DataTable( {
            ajax: "<?php echo base_url(); ?>alternatif/ajax_barang",
            retrieve:true
        });
        tbbarang.destroy();
        tbbarang = $('#tbbarang').DataTable( {
            ajax: "<?php echo base_url(); ?>alternatif/ajax_barang",
            retrieve:true
        });
    }

    function pilih(kode, nama){
        $('[name="id"]').val(kode);
        $('[name="nama"]').val(nama);

        add();
        
        $('#modal_barang').modal('hide');
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
                            <h4 class="card-title">Penilaian Alternatif</h4>
                            <label class=" card-title" style="text-align: right; margin-top:20px;">Pilih Kriteria</label>
                                <select class=" form-control" style="display: unset;" id="kr" name="kr">
                                <?php
                                foreach ($kriteria->result() as $row) {
                                    ?>
                                <option value="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
                                    <?php
                                }
                                ?>
                                </select>
                        </div>
                        <div class="card-content">
                        
                                <hr>
                            <div class="card-body">

                                <div class="col-md-12 col-xs-12 col-sm-12" style="margin: 10px;">
                                <label class="col-sm-4 col-form-label" style="text-align: right;"><?php echo $a1; ?></label>
                                <select class="col-sm-3 form-control" style="display: unset;" id="pa1" name="pa1">
                                <?php
                                foreach ($np->result() as $row) {
                                    ?>
                                <option value="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
                                    <?php
                                }
                                ?>
                                </select>
                                <label class="col-sm-4 col-form-label" style="text-align: left;" ><?php echo $a2; ?></label>
                                </div>

                                <div class="col-md-12 col-xs-12 col-sm-12" style="margin: 10px;">
                                <label class="col-sm-4 col-form-label" style="text-align: right;"><?php echo $a1; ?></label>
                                <select class="col-sm-3 form-control" style="display: unset;" id="pa2" name="pa2">
                                <?php
                                foreach ($np->result() as $row) {
                                    ?>
                                <option value="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
                                    <?php
                                }
                                ?>
                                </select>
                                <label class="col-sm-4 col-form-label" style="text-align: left;" ><?php echo $a3; ?></label>
                                </div>

                                <div class="col-md-12 col-xs-12 col-sm-12" style="margin: 10px;">
                                <label class="col-sm-4 col-form-label" style="text-align: right;"><?php echo $a1; ?></label>
                                <select class="col-sm-3 form-control" style="display: unset;" id="pa3" name="pa3">
                                <?php
                                foreach ($np->result() as $row) {
                                    ?>
                                <option value="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
                                    <?php
                                }
                                ?>
                                </select>
                                <label class="col-sm-4 col-form-label" style="text-align: left;" ><?php echo $a4; ?></label>
                                </div>

                                <div class="col-md-12 col-xs-12 col-sm-12" style="margin: 10px;">
                                <label class="col-sm-4 col-form-label" style="text-align: right;"><?php echo $a1; ?></label>
                                <select class="col-sm-3 form-control" style="display: unset;" id="pa4" name="pa4">
                                <?php
                                foreach ($np->result() as $row) {
                                    ?>
                                <option value="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
                                    <?php
                                }
                                ?>
                                </select>
                                <label class="col-sm-4 col-form-label" style="text-align: left;" ><?php echo $a5; ?></label>
                                </div>

                                <div class="col-md-12 col-xs-12 col-sm-12" style="margin: 10px;">
                                <label class="col-sm-4 col-form-label" style="text-align: right;"><?php echo $a2; ?></label>
                                <select class="col-sm-3 form-control" style="display: unset;" id="pa5" name="pa5">
                                <?php
                                foreach ($np->result() as $row) {
                                    ?>
                                <option value="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
                                    <?php
                                }
                                ?>
                                </select>
                                <label class="col-sm-4 col-form-label" style="text-align: left;" ><?php echo $a3; ?></label>
                                </div>

                                <div class="col-md-12 col-xs-12 col-sm-12" style="margin: 10px;">
                                <label class="col-sm-4 col-form-label" style="text-align: right;"><?php echo $a2; ?></label>
                                <select class="col-sm-3 form-control" style="display: unset;" id="pa6" name="pa6">
                                <?php
                                foreach ($np->result() as $row) {
                                    ?>
                                <option value="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
                                    <?php
                                }
                                ?>
                                </select>
                                <label class="col-sm-4 col-form-label" style="text-align: left;" ><?php echo $a4; ?></label>
                                </div>

                                <div class="col-md-12 col-xs-12 col-sm-12" style="margin: 10px;">
                                <label class="col-sm-4 col-form-label" style="text-align: right;"><?php echo $a2; ?></label>
                                <select class="col-sm-3 form-control" style="display: unset;" id="pa7" name="pa7">
                                <?php
                                foreach ($np->result() as $row) {
                                    ?>
                                <option value="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
                                    <?php
                                }
                                ?>
                                </select>
                                <label class="col-sm-4 col-form-label" style="text-align: left;" ><?php echo $a5; ?></label>
                                </div>

                                <div class="col-md-12 col-xs-12 col-sm-12" style="margin: 10px;">
                                <label class="col-sm-4 col-form-label" style="text-align: right;"><?php echo $a3; ?></label>
                                <select class="col-sm-3 form-control" style="display: unset;" id="pa8" name="pa8">
                                <?php
                                foreach ($np->result() as $row) {
                                    ?>
                                <option value="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
                                    <?php
                                }
                                ?>
                                </select>
                                <label class="col-sm-4 col-form-label" style="text-align: left;" ><?php echo $a4; ?></label>
                                </div>

                                <div class="col-md-12 col-xs-12 col-sm-12" style="margin: 10px;">
                                <label class="col-sm-4 col-form-label" style="text-align: right;"><?php echo $a3; ?></label>
                                <select class="col-sm-3 form-control" style="display: unset;" id="pa9" name="pa9">
                                <?php
                                foreach ($np->result() as $row) {
                                    ?>
                                <option value="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
                                    <?php
                                }
                                ?>
                                </select>
                                <label class="col-sm-4 col-form-label" style="text-align: left;" ><?php echo $a5; ?></label>
                                </div>
                                <div class="col-md-12 col-xs-12 col-sm-12" style="margin: 10px;">
                                <label class="col-sm-4 col-form-label" style="text-align: right;"><?php echo $a4; ?></label>
                                <select class="col-sm-3 form-control" style="display: unset;" id="pa10" name="pa10">
                                <?php
                                foreach ($np->result() as $row) {
                                    ?>
                                <option value="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
                                    <?php
                                }
                                ?>
                                </select>
                                <label class="col-sm-4 col-form-label" style="text-align: left;" ><?php echo $a5; ?></label>
                                </div>
                                <div class="card-footer">
                                    <button id="btnSave" type="button" class="btn btn-primary" onclick="save();">Lanjutkan Perhitungan  &nbsp;<span class="fa fa-arrow-right"></span></button>
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

