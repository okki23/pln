<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style>
.invoice-title h2, .invoice-title h3 {
    display: inline-block;
}

.table > tbody > tr > .no-line {
    border-top: none;
}

.table > thead > tr > .no-line {
    border-bottom: none;
}

.table > tbody > tr > .thick-line {
    border-top: 2px solid;
}
</style>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
    <div class="row">
	<div align="center"> 
		<img src="<?php echo base_url('assets/images/kop_listrik.png'); ?>" width="350" height="80">
		<h2>BUKTI TAGIHAN LISTRIK PASAR CIPANAS</h2>
	</div>
        <div class="col-xs-12">
    		 
    		 
    		<div class="row">
    			<div class="col-xs-6">
    				<address>
    				<strong>Billed To:</strong><br>
    					<?php echo $list->nama; ?><br>
    					<?php echo $list->alamat; ?><br>
    					<?php echo $list->blok; ?><br>
    					<?php echo $list->telp; ?>
    				</address>
    			</div>
    			 
    		</div>
    		<div class="row"> 
    			<div class="col-xs-6 text-right">
    				<address>
    					<strong>Due Date:</strong><br>
    					<?php echo tanggalan($list->due_date); ?><br><br>
    				</address>
    			</div>
    		</div>

            <h3 class="panel-title"><strong>Detail Payment</strong></h3>
            <div class="row"> 
    			
                
            <div class="table-responsive">
    					<table class="table table-condensed">
    						<thead>
                                <tr>
        							<td class="text-center"><strong>Last KWH</strong></td>
        							<td class="text-center"><strong>Current KWH</strong></td>
        							<td class="text-center"><strong>Used KWH</strong></td>
                                    <td class="text-center"><strong>Base KwH</strong></td>
                                    <td class="text-center"><strong>Admin Fee KWH</strong></td>
                                    <td class="text-center"><strong>Abodemen Fee</strong></td>
        							<td class="text-center"><strong>Totals</strong></td>
                                </tr>
    						</thead>
    						<tbody>
    							<!-- foreach ($order->lineItems as $line) or some such thing here -->
    							<tr>
    							 
    								<td class="text-center"> <?php echo $list->last_use_kwh; ?> </td>
    								<td class="text-center"> <?php echo $list->current_use_kwh; ?> </td>
    								<td class="text-center"> <?php echo $list->used_kwh; ?> </td>
                                    <td class="text-center"> Rp . <?php echo number_format($list->base_kwh); ?> </td>
    								<td class="text-center"> Rp . <?php echo number_format($list->admin); ?> </td>
    								<td class="text-center"> Rp . <?php echo number_format($list->abodemen); ?> </td>
                                    <td class="text-center"> Rp . <?php echo number_format($list->payment); ?> </td>
    							</tr>
                               <tr>
                               <td colspan="7"> <h3 align="center"><b> <i>Terbilang : <?php echo kekata($list->payment); ?> rupiah</i> </b> </h3> </td>
                               </tr>
    						</tbody>
    					</table>
    				</div>


    		</div>
    	</div>
    </div>
 
</div>
 
 