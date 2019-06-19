 
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                 
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Daya
                            </h2>
                            <br>
                            <a href="javascript:void(0);" id="addmodal" class="btn btn-primary waves-effect">  <i class="material-icons">add_circle</i>  Tambah Data </a>
 
                        </div>
                        <div class="body">
                                
                            <div class="table-responsive">
                               <table class="table table-bordered table-striped table-hover js-basic-example" id="example" >
                              
                                    <thead>
                                        <tr>
                                            <th style="width:1%;">No</th>  
                                            <th style="width:5%;">Kapasitas Daya</th>
                                            <th style="width:3%;">Abodemen</th>   
                                            <th style="width:5%;">Admin</th>
                                            <th style="width:5%;">Base KWH</th>  
                                            <th style="width:10%;">Opsi</th> 
                                        </tr>
                                    </thead> 
                                </table> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         


        </div>
    </section>

   
    <!-- form tambah dan ubah data -->
    <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Form Tambah Data</h4>
                        </div>
                        <div class="modal-body">
                              <form method="post" id="user_form" enctype="multipart/form-data">   
                        
                                    <input type="hidden" name="id" id="id">    

                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="kapasitas_daya" id="kapasitas_daya" class="form-control" placeholder="Kapasitas Daya" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="abodemen" id="abodemen" class="form-control" placeholder="Abodemen" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="admin" id="admin" class="form-control" placeholder="Admin" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="base_kwh" id="base_kwh" class="form-control" placeholder="Base KWH" />
                                        </div>
                                    </div>
                                 
                                   
                                   <button type="button" onclick="Simpan_Data();" class="btn btn-success waves-effect"> <i class="material-icons">save</i> Simpan</button>

                                   <button type="button" name="cancel" id="cancel" class="btn btn-danger waves-effect" onclick="javascript:Bersihkan_Form();" data-dismiss="modal"> <i class="material-icons">clear</i> Batal</button>
                             </form>
                       </div>
                     
                    </div>
                </div>
    </div>

  
   <script type="text/javascript">
      
     function Ubah_Data(id){
        $("#defaultModalLabel").html("Form Ubah Data");
        $("#defaultModal").modal({backdrop: 'static', keyboard: false,show:true});
         
        $('#user_form')[0].reset();
        $.ajax({
             url:"<?php echo base_url(); ?>daya/get_data_edit/"+id,
             type:"GET",
             dataType:"JSON", 
             success:function(result){ 
                  console.log(result);
                 $("#defaultModal").modal('show'); 
                 $("#id").val(result.id); 
                 $("#kapasitas_daya").val(result.kapasitas_daya);
                 $("#abodemen").val(result.abodemen);
                 $("#admin").val(result.admin);
                 $("#base_kwh").val(result.base_kwh);
               
             }
         });
     }
 
     function Bersihkan_Form(){
        $(':input').val('');  
         
     }

     function Hapus_Data(id){
        if(confirm('Anda yakin ingin menghapus data ini?'))
        {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo base_url('daya/hapus_data')?>/"+id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
               
               $('#example').DataTable().ajax.reload(); 
               
                $.notify("Data berhasil dihapus!", {
                    animate: {
                        enter: 'animated fadeInRight',
                        exit: 'animated fadeOutRight'
                    }  
                 },{
                    type: 'success'
                    });
                 
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });
   
    }
    }
     
    function Simpan_Data(){
        //setting semua data dalam form dijadikan 1 variabel 
        var formData = new FormData($('#user_form')[0]);  
        var kapasitas_daya = $("#kapasitas_daya").val();
        var abodemen = $("#abodemen").val();
        var admin = $("#admin").val();
        var base_kwh = $("#base_kwh").val();
      
	 
        if(kapasitas_daya == ''){
            alert("Kapasitas Daya Belum anda masukkan!");
            $("#kapasitas_daya").parents('.form-line').addClass('focused error');
            $("#kapasitas_daya").focus();
        }else if(abodemen == ''){
            alert("Abodemen Belum anda masukkan!");
            $("#abodemen").parents('.form-line').addClass('focused error');
            $("#abodemen").focus();
        }else if(admin == ''){
            alert("Admin Belum anda masukkan!");
            $("#admin").parents('.form-line').addClass('focused error');
            $("#admin").focus();
        }else if(base_kwh == ''){
            alert("Base KWH Belum anda masukkan!");
            $("#base_kwh").parents('.form-line').addClass('focused error');
            $("#base_kwh").focus();
        }else{ 
            //transaksi dibelakang layar
            $.ajax({
             url:"<?php echo base_url(); ?>daya/simpan_data",
             type:"POST",
             data:formData,
             contentType:false,  
             processData:false,   
             success:function(result){ 
                
                 $("#defaultModal").modal('hide');
                 $('#example').DataTable().ajax.reload(); 
                 $('#user_form')[0].reset();
                 Bersihkan_Form();
                 $.notify("Data berhasil disimpan!", {
                    animate: {
                        enter: 'animated fadeInRight',
                        exit: 'animated fadeOutRight'
                 } 
                 },{
                    type: 'success'
                });
             }
            }); 

  
        }
            

    }
      
  
       $(document).ready(function() {
           
        $("#addmodal").on("click",function(){
            $("#defaultModal").modal({backdrop: 'static', keyboard: false,show:true});
            $("#method").val('Add');
            $("#defaultModalLabel").html("Form Tambah Data");
        });
         
      
        
        $('#example').DataTable( {
            "ajax": "<?php echo base_url(); ?>daya/fetch_daya" 
               
        });
 
      
         
      });
  
        
         
    </script>