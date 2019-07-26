 
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
                                Report Tagihan
                            </h2>
                             
                        </div>
                        <div class="body">
                                
                            <div class="table-responsive">
                               <table class="table table-bordered table-striped table-hover js-basic-example" id="example" >
                               
                                    <thead>
                                        <tr>
                                            <th style="width:1%;">ID Pelanggan</th> 
                                            <th style="width:1%;">Nama Customer</th>  
                                            <th style="width:5%;">Blok</th>
                                            <th style="width:5%;">Daya</th>   
                                            <th style="width:5%;">Last KWH</th>  
                                            <th style="width:5%;">Current KWH</th>  
                                            <th style="width:5%;">Used KWH</th>  
                                            <th style="width:5%;">Payment</th>  
                                            <th style="width:5%;">Due Date</th>  
                                        
                                            <!-- <th style="width:15%;">Opsi</th>  -->
                                        </tr>
                                    </thead> 
                                    <tfoot>
                                    <tr>
                                        <td colspan="7">  </td>
                                        <td style="text-align:left">Total:</td>
                                        <td></td>
                                         
                                    </tr>
                                </tfoot>
                                </table> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Report Pendapatan Masuk
                            </h2>
                             
                        </div>
                        <div class="body">
                                
                            <div class="table-responsive">
                            
                               <table class="table table-bordered table-striped table-hover js-basic-example" id="examplex" >
                               
                                    <thead>
                                        <tr>
                                            <th style="width:1%;">ID Pelanggan</th>  
                                            <th style="width:1%;">Nama Customer</th>  
                                            <th style="width:5%;">Blok</th>
                                            <th style="width:5%;">Daya</th>   
                                            <th style="width:5%;">Last KWH</th>  
                                            <th style="width:5%;">Current KWH</th>  
                                            <th style="width:5%;">Used KWH</th>  
                                            <th style="width:5%;">Payment</th>  
                                             
                                            <th style="width:5%;">Date Payment</th>  
                                            <!-- <th style="width:15%;">Opsi</th>  -->
                                        </tr>
                                    </thead> 
                                    <tfoot>
                                    <tr>
                                        <th colspan="7" style="text-align:right">  </th>
                                        <th style="text-align:left">Total:</th>
                                        <th></th>
                                         
                                    </tr>
                                </tfoot>
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
                                                    <input type="text" name="id_customer" id="id_customer" required>
                                                  
                                                    
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
                                        <label class="control-label"> Last Due Date:  (Readonly) </label>
                                            <input type="text" readonly="readonly" name="due_datex" id="due_datex" class="form-control"  />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                        <label class="control-label"> Last report :  (Readonly) </label>
                                            <input type="text" readonly="readonly" name="date_reportx" id="date_reportx" class="form-control"  />
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
                                        <label class="control-label"> report (Abodement + Admin + (BaseKwh * UsedKWH)):  (Readonly) </label>
                                            <input type="text"  readonly="readonly"name="report" id="report" class="form-control"  />
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
   
   
  

       $(document).ready(function() {
      
        
            function commaSeparateNumber(val) {
                while (/(\d+)(\d{3})/.test(val.toString())) {
                    val = "Rp. "+val.toString().replace(/(\d+)(\d{3})/, '$1' + ',' + '$2');
                }
                return val;
            }
        $('#example').DataTable( {
            "ajax": "<?php echo base_url(); ?>report/fetch_report_tagihan",
            
            dom: 'Bfrtip',
            buttons: [
                { extend: 'copyHtml5', footer: true, title: 'LAPORAN TAGIHAN PEMBAYARAN LISTRIK', },
                { extend: 'excelHtml5', footer: true, title: 'LAPORAN TAGIHAN PEMBAYARAN LISTRIK', },
                { extend: 'csvHtml5', footer: true, title: 'LAPORAN TAGIHAN PEMBAYARAN LISTRIK', },
                { extend: 'pdfHtml5', footer: true, title: 'LAPORAN TAGIHAN PEMBAYARAN LISTRIK', }
            ],
         
            "columnDefs": [
                {
                    "render": function (data, type, row) {
                        return commaSeparateNumber(data);
                    },
                    "targets": [7]
                },
            ],
            "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;
           
            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
 
            // Total over all pages
            total = api
                .column(7)
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total over this page
            pageTotal = api
                .column(7, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Update footer
            $( api.column(7).footer() ).html(
                commaSeparateNumber(pageTotal)
            );
        }
               
        });

        $('#examplex').DataTable( {
            "ajax": "<?php echo base_url(); ?>report/fetch_report_pendapatan",
            dom: 'Bfrtip',
            buttons: [
                { extend: 'copyHtml5', footer: true, title: 'LAPORAN PENDAPATAN / PEMASUKAN PEMBAYARAN LISTRIK', },
                { extend: 'excelHtml5', footer: true, title: 'LAPORAN PENDAPATAN / PEMASUKAN PEMBAYARAN LISTRIK', },
                { extend: 'csvHtml5', footer: true, title: 'LAPORAN PENDAPATAN / PEMASUKAN PEMBAYARAN LISTRIK', },
                { extend: 'pdfHtml5', footer: true, title: 'LAPORAN PENDAPATAN / PEMASUKAN PEMBAYARAN LISTRIK', }
            ],
            "columnDefs": [
                {
                    "render": function (data, type, row) {
                        return commaSeparateNumber(data);
                    },
                    "targets": [7]
                },
            ],
            "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;
           
            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
 
            // Total over all pages
            total = api
                .column(7)
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total over this page
            pageTotal = api
                .column( 7, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Update footer
            $( api.column(7).footer() ).html(
                commaSeparateNumber(pageTotal)
            );
        }
               
        });
 
      
         
      });
  
        
         
    </script>