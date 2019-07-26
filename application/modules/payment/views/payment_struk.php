<div align="center"> 
		<img src="<?php echo base_url('assets/images/kop_listrik.png'); ?>" width="450" height="80">
		  
	</div>
			<div style="background-color:#4287f5; width:70%; height:60%;">
		  		<h2 align="center">BUKTI PEMBAYARAN LISTRIK PASAR CIPANAS</h2>  
		  	</div>

			 <br>
			 &nbsp;
			 <br>
			 &nbsp;
			 
    		 
			 <table border="0" cellpadding="0" cellspacing="0">

			 <tr>
			 <td style="width:20%; text-align:left;"> ID PEL </td>
			 <td style="width:1%; text-align:left; line-height:50%;" >  : </td>
			 <td style="width:25%; text-align:left;"> <?php echo $list->id_pelanggan;?>  </td> 
			 <td style="width:8%; "> &nbsp; </td> 
			 <td style="width:20%; text-align:left;"> REKENING BULAN </td>
			 <td style="width:1%; text-align:left; line-height:50%;">  : </td>
			 <td style="width:25%; text-align:left;"> <?php echo tanggalan_mod($list->due_date);?>  </td> 
			 </tr>

			 <tr>
			 <td style="width:20%; text-align:left;"> NAMA </td>
			 <td style="width:1%; text-align:left; line-height:50%;" >  : </td>
			 <td style="width:25%; text-align:left;"> <?php echo $list->nama;?> </td> 
			 <td style="width:8%; "> &nbsp; </td> 
			 <td style="width:20%; text-align:left;"> STAND AWAL </td>
			 <td style="width:1%; text-align:left; line-height:50%;">  : </td>
			 <td style="width:25%; text-align:left;"> <?php echo $list->last_use_kwh;?> </td> 
			 </tr>

			 <tr>
			 <td style="width:20%; text-align:left;"> LOKASI </td>
			 <td style="width:1%; text-align:left; line-height:50%;" >  : </td>
			 <td style="width:25%; text-align:left;"> <?php echo $list->blok;?> </td> 
			 <td style="width:8%; "> &nbsp; </td> 
			 <td style="width:20%; text-align:left;"> STAND AKHIR </td>
			 <td style="width:1%; text-align:left; line-height:50%;">  : </td>
			 <td style="width:25%; text-align:left;"> <?php echo $list->current_use_kwh;?> </td> 
			 </tr>

			 <tr>
			 <td style="width:20%; text-align:left;"> TRP/DAYA </td>
			 <td style="width:1%; text-align:left; line-height:50%;" >  : </td>
			 <td style="width:25%; text-align:left;"> <?php echo $list->kapasitas_daya;?> </td> 
			 <td style="width:8%; "> &nbsp; </td> 
			 <td style="width:20%; text-align:left;"> KWH PAKAI </td>
			 <td style="width:1%; text-align:left; line-height:50%;">  : </td>
			 <td style="width:25%; text-align:left;"> <?php echo $list->used_kwh;?> </td> 
			 </tr>

			 </table>
    		<br>
			&nbsp;
			<br>
			&nbsp;
			<br>
			&nbsp;
			
	 		<table border="0" cellpadding="0" cellspacing="0">

			 <tr>
			 <td style="width:50%; text-align:right; line-height:120%;"> TAGIHAN LISTRIK </td>
			 
			 <td style="width:50%; text-align:left; line-height:120%;"> : Rp. <?php echo number_format($list->used_kwh * $list->base_kwh) ;?> </td> 
			 </tr>
			 <tr>
			 <td style="width:50%; text-align:right; line-height:120%;"> ABUDEMEN </td>
		 
			 <td style="width:50%; text-align:left; line-height:120%;"> : Rp.  <?php echo number_format($list->abodemen) ;?> </td> 
			 </tr>
			 <tr>
			 <td style="width:50%; text-align:right; line-height:120%;"> BI ADM  </td>
			 
			 <td style="width:50%; text-align:left; line-height:120%;"> : Rp.  <?php echo number_format($list->admin) ;?> </td> 
			 </tr>
			 <tr>
			 <td style="width:50%; text-align:right; line-height:120%;"> <b>TOTAL </b> </td>
			  
			 <td style="width:50%; text-align:left; line-height:120%;"> <b> : Rp.  <?php echo number_format(($list->used_kwh * $list->base_kwh) + ($list->abodemen + $list->admin)); ?> </b> </td> 
			 </tr>
 
			 </table>
 
		  		<p style="font-size:10px; font-weight:bold;" align="center">  <i>// <?php echo kekata(($list->used_kwh * $list->base_kwh) + ($list->abodemen + $list->admin)); ?> rupiah // </i>  <br> STRUK INI MERUPAKAN BUKTI PEMBAYARAN YANG SAH  </p>  
				  
			 