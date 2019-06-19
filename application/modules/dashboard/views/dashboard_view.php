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
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover dashboard-task-infos">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Customer</th>
                                            <th>Alamat</th>
                                            <th>Total KWH</th>
                                            <th>Abodemen</th>
											<th>Admin</th>
											<th>Total Bayar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Slamet Riyadi A</td>
                                            <td>BS B001</td>
                                            <td>300</td>
											<td>Rp.5000</td>
											<td>Rp.5000</td>
											<td>Rp.170.000</td>
                                            
                                        </tr>
										<tr>
                                            <td>2</td>
                                            <td>Gunawan</td>
                                            <td>BS B002</td>
                                            <td>300</td>
											<td>Rp.5000</td>
											<td>Rp.5000</td>
											<td>Rp.150.000</td>
                                            
                                        </tr>
										<tr>
                                            <td>3</td>
                                            <td>Yahya</td>
                                            <td>BS B003</td>
                                            <td>300</td>
											<td>Rp.5000</td>
											<td>Rp.5000</td>
											<td>Rp.180.000</td>
                                            
                                        </tr>
										<tr>
                                            <td>4</td>
                                            <td>Erna</td>
                                            <td>BS B004</td>
                                            <td>300</td>
											<td>Rp.5000</td>
											<td>Rp.5000</td>
											<td>Rp.100.000</td>
                                            
                                        </tr>
										<tr>
                                            <td>5</td>
                                            <td>Yuni</td>
                                            <td>BS B005</td>
                                            <td>300</td>
											<td>Rp.5000</td>
											<td>Rp.5000</td>
											<td>Rp.160.000</td>
                                            
                                        </tr>
                                         
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
 
 