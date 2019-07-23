 
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
                                Customer
                            </h2>
                            <br>
                            <a href="javascript:void(0);" id="addmodal" class="btn btn-primary waves-effect">  <i class="material-icons">add_circle</i>  Tambah Data </a>
 
                        </div>
                        <div class="body">
                                
                            <div class="table-responsive">
                               <table class="table table-bordered table-striped table-hover js-basic-example" id="example" >
  
                                    <thead>
                                        <tr>
                                            <th style="width:1%;">Nama</th>  
                                            <th style="width:5%;">Alamat</th>
                                            <th style="width:5%;">Email</th>   
                                            <th style="width:5%;">Telp</th>  
                                            <th style="width:5%;">Blok</th>  
                                            <th style="width:5%;">Daya</th>  
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
                                            <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Alamat" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="telp" id="telp" class="form-control" placeholder="Telp" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="email" id="email" class="form-control" placeholder="Email" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="blok" id="blok" class="form-control" placeholder="Blok" />
                                        </div>
                                    </div>  
                               
                                     <div class="input-group">
                                                <div class="form-line">
                                                <label class="control-label"> Daya : </label>
                                                    <input type="text" name="daya" id="daya" class="form-control" required readonly="readonly" >
                                                    <input type="hidden" name="id_daya" id="id_daya" required>
                                                  
                                                    
                                                </div> 
                                                <span class="input-group-addon">
                                                    <button type="button" onclick="CariDaya();" class="btn btn-primary"> Pilih daya... </button>
                                                </span>
                                    </div>
                                    

                                   <button type="button" onclick="Simpan_Data();" class="btn btn-success waves-effect"> <i class="material-icons">save</i> Simpan</button>

                                   <button type="button" name="cancel" id="cancel" class="btn btn-danger waves-effect" onclick="javascript:Bersihkan_Form();" data-dismiss="modal"> <i class="material-icons">clear</i> Batal</button>
                             </form>
                       </div>
                     
                    </div>
                </div>
    </div>
 
  
 
    <!-- modal cari daya -->
    <div class="modal fade" id="CariDayaModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" >Daya</h4>
                        </div>
                        <div class="modal-body">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">X Tutup</button>

                                <br>
                                <hr>

                                 <table width="100%" class="table table-bordered table-striped table-hover " id="daftar_daya" >
  
                                    <thead>
                                        <tr>  
                                            <th style="width:98%;">Daya </th> 
                                            <th style="width:98%;">Abodement </th> 
                                            <th style="width:98%;">Admin </th> 
                                            <th style="width:98%;">Base KWH </th> 
                                           
                                        </tr>
                                    </thead> 
                                    <tbody id="daftar_dayax">

                                </tbody>
                                </table> 
                       </div>
                     
                    </div>
                </div>
    </div>

     

  
   <script type="text/javascript">
    
      $('#daftar_daya').DataTable( {
            "ajax": "<?php echo base_url(); ?>customer/fetch_daya"           
    });

     
     
    function CariDaya(){
        $("#CariDayaModal").modal({backdrop: 'static', keyboard: false,show:true});
    } 
    
        var daftar_daya = $('#daftar_daya').DataTable();
     
        $('#daftar_daya tbody').on('click', 'tr', function () {
            
            var content = daftar_daya.row(this).data()
            console.log(content);
            $("#daya").val(content[0]);
     
            $("#id_daya").val(content[4]);
            
            $("#CariDayaModal").modal('hide');
        } );
  
     function Ubah_Data(id){
        $("#defaultModalLabel").html("Form Ubah Data");
        $("#defaultModal").modal({backdrop: 'static', keyboard: false,show:true});
        $('#user_form')[0].reset();
        $.ajax({
             url:"<?php echo base_url(); ?>customer/get_data_edit/"+id,
             type:"GET",
             dataType:"JSON", 
             success:function(result){ 
                  console.log(result);
                 $("#defaultModal").modal('show'); 
                 $("#id").val(result.id);
                 $("#nama").val(result.nama);  
                 $("#alamat").val(result.alamat);
                 $("#telp").val(result.telp); 
                 $("#email").val(result.email);
                 $("#blok").val(result.blok);   
                 $("#daya").val(result.daya);
                 $("#id_daya").val(result.iddaya);
                
                  
             }
         });
     }
     function Detail_Data(id){
 
        $("#DetailcustomerModal").modal({backdrop: 'static', keyboard: false,show:true});
         
        $.ajax({
             url:"<?php echo base_url(); ?>customer/get_data_edit/"+id,
             type:"GET",
             dataType:"JSON", 
             success:function(result){ 
                 console.log(result); 
                 $("#id").val(result.id); 
                 $("#nama_detail").html(result.nama);
                 $("#alamat_detail").html(result.alamat);
                 $("#telp_detail").html(result.telp);
                 $("#email_detail").html(result.email);
                 $("#jam_detail").html(result.jam_operasional);
                 $("#daya_detail").html(result.nama_daya);
                 $("#sub_daya_detail").html(result.child_daya);
                 $("#detail_exp").html(result.detail_daya);
                   
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
            url : "<?php echo base_url('customer/hapus_data')?>/"+id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
               
               $('#example').DataTable().ajax.reload(); 
               $('#user_form')[0].reset();
                 $('#detail_daya').html('');
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

           
        var nama = $("#nama").val();
        var alamat = $("#alamat").val();
        var telp = $("#telp").val();
        var email = $("#email").val();
        var blok = $("#blok").val();
        var id_daya = $("#id_daya").val();
 
        if(nama == ''){
            alert("Nama Belum anda masukkan!");
            $("#nama").parents('.form-line').addClass('focused error');
            $("#nama").focus();
        }else if(alamat == ''){
            alert("Alamat Belum anda masukkan!");
            $("#alamat").parents('.form-line').addClass('focused error');
            $("#alamat").focus();
        }else if(telp == ''){
            alert("Telp Belum anda masukkan!");
            $("#telp").parents('.form-line').addClass('focused error');
            $("#telp").focus();
        }else if(email == ''){
            alert("Email Belum anda masukkan!");
            $("#email").parents('.form-line').addClass('focused error');
            $("#email").focus();
        }else if(id_daya == ''){
            alert("daya Belum anda masukkan!");
            $("#daya").parents('.form-line').addClass('focused error');
            $("#daya").focus();
        
        }else if(blok == ''){
            alert("blok Belum anda masukkan!");
            $("#blok").parents('.form-line').addClass('focused error');
            $("#blok").focus();
        }else{ 

            //transaksi dibelakang layar
            $.ajax({
             url:"<?php echo base_url(); ?>customer/simpan_data",
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
      
 
var g_dataFull = [];

/* Formatting function for row details - modify as you need */
function format ( d ) {
    var html = '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;" width="100%">';
      
    var dataChild = [];
    var hasChildren = false;
    $.each(g_dataFull, function(){
       if(this.id_parent_customer === d.id){
          html += 
            '<tr><td>' + $('<div>').text(this.nama_pelayanan).html() + '</td>' + 
            '<td>' +  $('<div>').text(this.nama_komp_biaya).html() + '</td>' + 
            '<td>' +  $('<div>').text(this.nama_customer).html() +'</td>' + 
            '<td>' +  $('<div>').text(this.nama_satuan).html() + '</td>'+
            '<td>' +  $('<div>').text(this.action).html() + '</td></tr>';

         
          hasChildren = true;
       }
    });
  
    if(!hasChildren){
        html += '<tr><td>There are no items in this view.</td></tr>';
     
    } 
    html += '</table>';
    return html;
}
 

       $(document).ready(function() {
           
        $("#addmodal").on("click",function(){
            $("#defaultModal").modal({backdrop: 'static', keyboard: false,show:true});
            $("#method").val('Add');
            $("#defaultModalLabel").html("Form Tambah Data");
        });
         
      
        
     $('#example').DataTable( {
            "ajax": "<?php echo base_url(); ?>customer/fetch_customer" 
               
        });
 
      
         
      });
  
        
         
    </script>