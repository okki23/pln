 
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
                                Payment
                            </h2>
                            <br>
                            <a href="javascript:void(0);" id="addmodal" class="btn btn-primary waves-effect">  <i class="material-icons">add_circle</i>  Tambah Data </a>
 
                        </div>
                        <div class="body">
                                
                            <div class="table-responsive">
                               <table class="table table-bordered table-striped table-hover js-basic-example" id="example" >
                               
                                    <thead>
                                        <tr>
                                            <th style="width:1%;">Nama Customer</th>  
                                            <th style="width:5%;">Blok</th>
                                            <th style="width:5%;">Daya</th>   
                                            <th style="width:5%;">Last KWH</th>  
                                            <th style="width:5%;">Current KWH</th>  
                                            <th style="width:5%;">Used KWH</th>  
                                            <th style="width:5%;">Payment</th>  
                                            <th style="width:5%;">Date Payment</th>  
                                            <th style="width:15%;">Opsi</th> 
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

                                    <div class="input-group">
                                                <div class="form-line">
                                                <label class="control-label"> Customer : </label>
                                                    <input type="text" name="nama_customer" id="nama_customer" class="form-control" required readonly="readonly" >
                                                    <input type="hidden" name="id_customer" id="id_customer" required>
                                                  
                                                    
                                                </div> 
                                                <span class="input-group-addon">
                                                    <button type="button" onclick="CariCustomer();" class="btn btn-primary"> Pilih Customer... </button>
                                                </span>
                                    </div>
                                    <div class="label label-danger" id="infobar"> </div>
                                    <input type="hidden" name="kapasitas_daya" id="kapasitas_daya"  class="form-control">
                                    <input type="hidden" name="base_kwh" id="base_kwh"  class="form-control">
                                    <input type="hidden" name="abodemen" id="abodemen"  class="form-control">
                                    <input type="hidden" name="admin" id="admin"  class="form-control">
                                
                                    <br>
                                    &nbsp;
                                    <div class="form-group">
                                        <div class="form-line">
                                        <label class="control-label"> Last KWH : (Readonly) </label>
                                            <input type="text" readonly="readonly" name="last_use_kwh" id="last_use_kwh" class="form-control"  />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                        <label class="control-label"> Last Payment :  (Readonly) </label>
                                            <input type="text" readonly="readonly" name="date_paymentx" id="date_paymentx" class="form-control"  />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                        <label class="control-label"> Currrent KWH : </label>
                                            <input type="text" name="current_use_kwh" id="current_use_kwh" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                        <label class="control-label"> Used KWH :  (Readonly) </label>
                                            <input type="text" readonly="readonly" name="used_kwh" id="used_kwh" class="form-control" />
                                        </div>
                                    </div>
                                   
                                    <div class="form-group">
                                        <div class="form-line">
                                        <label class="control-label"> Payment (Abodement + Admin + (BaseKwh * UsedKWH)):  (Readonly) </label>
                                            <input type="text"  readonly="readonly"name="payment" id="payment" class="form-control"  />
                                        </div>
                                    </div>
                                   
                                      <h5 style="font-color:red;" id="saysid">  </h5> 
                                    
                                    <hr>
                                  
                                    
                                    <button type="button" onclick="Calculate();" class="btn btn-default waves-effect"> <i class="material-icons">aspect_ratio</i> Calculate</button>
                                   <button type="button" onclick="Simpan_Data();" class="btn btn-success waves-effect"> <i class="material-icons">save</i> Simpan</button>

                                   <button type="button" name="cancel" id="cancel" class="btn btn-danger waves-effect" onclick="javascript:Bersihkan_Form();" data-dismiss="modal"> <i class="material-icons">clear</i> Batal</button>
                                    <br>
                                    &nbsp;
                             </form>
                       </div>
                     
                    </div>
                </div>
    </div>
 
  
 
    <!-- modal cari daya -->
    <div class="modal fade" id="CariCustomerModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" >Customer</h4>
                        </div>
                        <div class="modal-body">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">X Tutup</button>

                                <br>
                                <hr>

                                 <table width="100%" class="table table-bordered table-striped table-hover " id="daftar_customer" >
                                
                                    <thead>
                                        <tr>  
                                            <th style="width:98%;">Nama </th> 
                                            <th style="width:98%;">Alamat </th> 
                                            <th style="width:98%;">Email </th> 
                                            <th style="width:98%;">Telp </th> 
                                           
                                        </tr>
                                    </thead> 
                                    <tbody id="daftar_customerx">

                                </tbody>
                                </table> 
                       </div>
                     
                    </div>
                </div>
    </div>

     

  
   <script type="text/javascript">
   
    function Calculate(){
        var last_use_kwh = $("#last_use_kwh").val();
        var current_use_kwh = $("#current_use_kwh").val();
        var base_kwh = $("#base_kwh").val();
        var admin = $("#admin").val();
        var abodemen = $("#abodemen").val();

       

        var isi = (parseInt(current_use_kwh) -  parseInt(last_use_kwh));
        var ipay =  ( (parseInt(isi) * parseInt(base_kwh)) + parseInt(admin) + parseInt(abodemen)); 
        $("#used_kwh").val(isi);
        $("#payment").val(ipay);
        $.get("<?php echo base_url(); ?>payment/says/"+ipay,function(ter){
          
            $("#saysid").html(ter);
        });
         
    }


    function currencyFormatDE(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }


    $('#daftar_customer').DataTable( {
            "ajax": "<?php echo base_url(); ?>customer/fetch_customer"           
    });

     
     
    function CariCustomer(){
        $("#CariCustomerModal").modal({backdrop: 'static', keyboard: false,show:true});
    } 
    
        var daftar_customer = $('#daftar_customer').DataTable();
     
        $('#daftar_customer tbody').on('click', 'tr', function () {
            
            var content = daftar_customer.row(this).data() 
            
            $.get("<?php echo base_url('payment/last_payment/'); ?>"+content[7],function(res){
                console.log(res); 
                var isi = JSON.parse(res);
                $("#last_use_kwh").val(isi.last_use_kwh);
                $("#date_paymentx").val(isi.date_payment);
                $("#infobar").html('Info  Biaya Admin : Rp. '+currencyFormatDE(content[9])+' Abodemen : Rp.'+ currencyFormatDE(content[8]) +' Base KWH : Rp. ' + currencyFormatDE(content[10]) + ' Kapasitas Daya : ' + content[5] + ' Watt');
            });

            $("#nama_customer").val(content[0]);
            $("#kapasitas_daya").val(content[5]);
            $("#admin").val(content[9]);
            $("#abodemen").val(content[8]);
            $("#base_kwh").val(content[10]);
            
            $("#id_customer").val(content[7]);
            
            $("#CariCustomerModal").modal('hide');
        } );
  
     function Ubah_Data(id){
        $("#defaultModalLabel").html("Form Ubah Data");
        $("#defaultModal").modal({backdrop: 'static', keyboard: false,show:true});
        $('#user_form')[0].reset();
        $.ajax({
             url:"<?php echo base_url(); ?>payment/get_data_edit/"+id,
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
 
        $("#DetailpaymentModal").modal({backdrop: 'static', keyboard: false,show:true});
         
        $.ajax({
             url:"<?php echo base_url(); ?>payment/get_data_edit/"+id,
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
            url : "<?php echo base_url('payment/hapus_data')?>/"+id,
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

           
        var id_customer = $("#id_customer").val();
        var last_use_kwh = $("#last_use_kwh").val();
        var current_use_kwh = $("#current_use_kwh").val();
        var used_kwh = $("#used_kwh").val();
        var payment = $("#payment").val();
        
        if(id_customer == ''){
            alert("Customer Belum anda masukkan!");
            $("#nama_customer").parents('.form-line').addClass('focused error');
            $("#nama_customer").focus();
        }else if(current_use_kwh == ''){
            alert("Current Use Kwh Belum anda masukkan!");
            $("#current_use_kwh").parents('.form-line').addClass('focused error');
            $("#current_use_kwh").focus();
        
        }else{ 

            //transaksi dibelakang layar
            $.ajax({
             url:"<?php echo base_url(); ?>payment/simpan_data",
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
       if(this.id_parent_payment === d.id){
          html += 
            '<tr><td>' + $('<div>').text(this.nama_pelayanan).html() + '</td>' + 
            '<td>' +  $('<div>').text(this.nama_komp_biaya).html() + '</td>' + 
            '<td>' +  $('<div>').text(this.nama_payment).html() +'</td>' + 
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
            "ajax": "<?php echo base_url(); ?>payment/fetch_payment" 
               
        });
 
      
         
      });
  
        
         
    </script>