<div class="mainbox">
  <div class="inerbigbox">
	<div  class="top-textbox" >
		<span style="font-size:24px"><?php echo isset($data['name']) ? $data['name'] : '';  ?></span>
	</div>
	 <div class="list-top list-top1">
		<table border="0" width="100%" align="center">
		<tr>
		   <td align="center">Arrive</td>
		   <td align="center">Country</td>
		   <td align="center">Place</td>
		   <td align="center">Transport</td>
		   <td align="center">Depart</td>
		   <td align="center">Accom</td>
		   <td align="center">Activites</td>
		</tr>		   
		   <?php 
		   if(!empty($data['trip'])){
			   foreach($data['trip'] as $edit){ $readOnly = '';
			   ?>
				<tr>
					<td align="center" style="padding: 5px 0;">
						<?php echo $edit['arrive']; ?>
					</td>
					<td align="center" style="padding: 5px 0;">
						<?php echo $edit['country'] ?>
					</td>
					<td align="center" style="padding: 5px 0;">
						<?php echo $edit['place'] ?>
					</td>
					<td align="center" style="padding: 5px 0;">						
						<img  height="22" src="<?php echo WEBSITE_IMG_URL.'tripicn/'.((isset($edit['method'])) ? $edit['method'] : 'plane').'.png'; ?>" alt="<?php echo (isset($edit['method'])) ? $edit['method'] : 'plane' ?>"/>				
					</td>
					<td align="center" style="padding: 5px 0;">
						<?php echo isset($edit['depart']) ? $edit['depart'] : ''; ?>
					</td>
					<td align="center" style="padding: 5px 0;">
						<?php echo isset($edit['accom_title']) ? $edit['accom_title'] : ''; ?>
					</td>
					<td align="center" style="padding: 5px 0;">
						
						<?php echo isset($edit['activites']) ? $edit['activites'] : ''; ?>
					</td>	
				</tr>
<?php 
			   }
		   } ?>
		</table>	
	 </div>	 
  </div>
  <div class="tripviewmy">
	   <div class="inerbigbox">
		  <h6><?php echo isset($data['name']) ? $data['name'] : '';  ?></h6>
		  <?php 
		   if(!empty($data['trip'])){
			   foreach($data['trip'] as $edit){ $readOnly = '';  ?>
		  <div class="europe2016 full-detailbox box-wd">
			 <table border="0" width="100%">
				<tr>
				   <td >
					  <p style="color:#f9ca0f"><?php echo $edit['arrive']; ?></p>
				   </td>
				   <td >
					  <p style="color:#f9ca0f"><?php echo $edit['country']; ?></p>
				   </td>
				   <td>
					  <p  style="color:#f9ca0f"><?php echo $edit['place']; ?></p>
				   </td>
				   <td >
					  <p style="color:#f9ca0f"><?php echo $edit['depart']; ?></p>
				   </td>
				</tr>
			 </table>
			 <table>
				<tr>
				   <td width="100%" style="display:block; margin:0 0 22px 0;">
					  <span class="color1" style="color:#f9ca0f;">Transport :</span><br /><br />
					  <p class="pco" style="line-height:inherit;">
						<img height="22" src="<?php echo WEBSITE_IMG_URL.'tripicn/'.((isset($edit['method'])) ? $edit['method'] : 'plane').'.png'; ?>" alt="<?php echo (isset($edit['method'])) ? $edit['method'] : 'plane' ?>"/><br /><br />
						 <span><?php echo $edit['method_description']; ?></span><br />
					  </p>
				   </td>
				</tr>
			 </table>
			 <ul style="margin:20px 0 0 0;">
				<li style="display:block; margin:0 0 22px 0;">
				   <span  class="color1"># of Nights :</span><br />
				   <p style="line-height:inherit"><?php echo $edit['night']; ?></p>
				</li>
				<li style="display:block; margin:0 0 22px 0;">
				   <span class="color1">Accom :</span><br />
				   <p class="pco" style="line-height:inherit;"><span><?php echo $edit['accom_title']; ?></span><br />
					  <span><?php echo $edit['accom_description']; ?></span>
				   </p>
				</li>
				<li style="display:block; margin:0 0 22px 0;">
				   <span  class="color1">Activities :</span><br />
				   <p class="pco" style="line-height:inherit;"><span><?php echo $edit['activites']; ?></span><br />
					  <span><?php echo $edit['activites_description']; ?></span>
				   </p>
				</li>
			 </ul>
		  </div>
		   <?php }
		   } ?>
	   </div>
	</div>
	<?php echo $this->cell('Inbox::mainPromotion'); ?>
</div>