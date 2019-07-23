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
                              Selamat Datang di <?php echo $judul; ?>
                            </h2>
                            <br>
                            
                        <div class="body">
                           
            	<div class="row clearfix">
                <!-- Line Chart -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>List Pembayaran Terakhir Per Tanggal <?php echo tanggalan(date('Y-m-d')); ?> </h2>
                            
                        </div>
                        <div class="body">
                        <div class="table-responsive">
                               <table class="table table-bordered table-striped table-hover js-basic-example" id="example" >
                               
                                    <thead>
                                        <tr>
                                            <th style="width:1%;">#</th>  
                                            <th style="width:1%;">Nama Customer</th>  
                                            <th style="width:5%;">Blok</th>
                                            <th style="width:5%;">Daya</th>   
                                            <th style="width:5%;">Last KWH</th>  
                                            <th style="width:5%;">Current KWH</th>  
                                            <th style="width:5%;">Used KWH</th>  
                                            <th style="width:5%;">Payment</th>  
                                            
                                        </tr>
                                    </thead> 
                                    <tbody>
                                    <?php
                                    $no = 1;
                                    foreach($listing as $key=>$val){
                                        echo ' <tr>
                                        <td>'.$no.'</td>  
                                        <td>'.$val->nama.'</td>  
                                        <td>'.$val->blok.'</td>  
                                        <td>'.$val->kapasitas_daya.'</td>  
                                        <td>'.$val->last_use_kwh.'</td>  
                                        <td>'.$val->current_use_kwh.'</td>  
                                        <td>'.$val->used_kwh.'</td>  
                                        <td> Rp. '.number_format($val->payment).'</td>  
                                        
                                        </tr>';
                                    $no++;
                                    }
                                    ?>
                                    </tbody>
                                </table> 
                            </div>

                        </div>
                    </div>
                </div>

              
            
                

                </div>
             
          
                
            </div>

 
                        
                              
                        </div>
                    </div>
                </div>
            </div>
         


        </div>
</section>

 
<script src="http://code.highcharts.com/highcharts.js"></script>

<script type="text/javascript" src="<?php echo base_url('assets/'); ?>grouped-categories.js"></script>

<script src="http://code.highcharts.com/modules/exporting.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/'); ?>html2canvas.js"></script>
 
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
<link rel="stylesheet" href="<?php echo base_url('assets/orgchart/'); ?>org_new.css">
<link rel="stylesheet" href="<?php echo base_url('assets/css/'); ?>css_chart.css">
<script type="text/javascript" src="<?php echo base_url('assets/orgchart/'); ?>org.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/orgchart/'); ?>orgExtras.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/orgchart/'); ?>scripts.js"></script>
 
 