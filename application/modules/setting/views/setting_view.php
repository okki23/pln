 
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
                                Setting
                            </h2>
                            
 
                        </div>
                        <div class="body">
                                
                            <div class="table-responsive">
                               <table class="table table-bordered table-striped table-hover js-basic-example" id="example" >
                              
                                    <thead>
                                        <tr>
                                            <th style="width:1%;">No</th>  
                                            <th style="width:5%;">Nama Apps</th>
                                            <th style="width:3%;">Author</th>    
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
                                            <input type="text" name="nama_apps" id="nama_apps" class="form-control" placeholder="Kapasitas setting" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="author" id="author" class="form-control" placeholder="Abodemen" />
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
             url:"<?php echo base_url(); ?>setting/get_data_edit/"+id,
             type:"GET",
             dataType:"JSON", 
             success:function(result){ 
                  console.log(result);
                 $("#defaultModal").modal('show'); 
                 $("#id").val(result.id); 
                 $("#nama_apps").val(result.nama_apps);
                 $("#author").val(result.author);
                 
               
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
            url : "<?php echo base_url('setting/hapus_data')?>/"+id,
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
        var nama_apps = $("#nama_apps").val();
        var author = $("#author").val();
       
      
	 
        if(nama_apps == ''){
            alert("Nama Apps setting Belum anda masukkan!");
            $("#nama_apps").parents('.form-line').addClass('focused error');
            $("#nama_apps").focus();
        }else if(author == ''){
            alert("Author Belum anda masukkan!");
            $("#author").parents('.form-line').addClass('focused error');
            $("#author").focus();
        } else{
            //transaksi dibelakang layar
            $.ajax({
             url:"<?php echo base_url(); ?>setting/simpan_data",
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
            "ajax": "<?php echo base_url(); ?>setting/fetch_setting" 
               
        });
 
      
         
      });
  
        
         
    </script>