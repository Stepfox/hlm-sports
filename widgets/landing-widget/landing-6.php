				

	
		
				
		

<li>

		<div class="landing-widget-review-image-wrap">
				<div class="landing-image">
					 <?php if( !empty($image[$i]) ) {?>
							<img src="<?php  
								
								$imageObj = wp_get_attachment_image_src(hlm_sports_get_image_id($image[$i]), 'hlm_sports_40x40');
				                $imageURL = $imageObj[0];
									echo $imageURL;
								
							 ?>" alt="">  							 
						<?php } ?>	
					</div>
			<div class="landing-content">
<?php echo $bonus[$i];	?>
			</div>
		</div>
	</li>
	


