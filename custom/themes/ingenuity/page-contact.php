<?php /* Template Name: Contact Page */ ?>

<?php get_header(); ?>	

	<?php // The loop starts here
	    if ( have_posts() ) : while ( have_posts() ) : the_post();
	?>

	<section id="contact-map">
		
	</section>

	<section class="contact-moving">
		<div class="contact-moving__half move-arrow">
			<h3>We've moved!</h3>
			<!-- <h6>(but not <em>that</em> far away)</h6> -->
			<p>
				Effective <span class="bolded-text">Feb 22nd, 2016</span>.</br>
				Please mail and visit us at our new home:</p>
			<p>
				<a href="https://www.google.com/maps/place/Ingenuity/@43.523322,-79.7135727,17z/data=!3m1!4b1!4m5!3m4!1s0x0:0x390b5b52408b8c40!8m2!3d43.523322!4d-79.711384?hl=en" target="_blank">
					<span class="new-address">
						3800A Laird Rd. - Unit 1 </br>
						Mississauga, ON </br>
						L5L 0B2
					</span>
				</a>
			</p>
		</div>
		<div class="contact-moving__half" id="move-map">
		</div>		
	</section>

		<div class="contact-container">
			<?php // bring in the team members!
		
				$query = new WP_Query( array( 'post_type' => 'contact' ) );
		
				if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
		
					<?php // Get custom meta values 
						$contacts = get_post_meta($post->ID,'_contact',true);
					?>
					
						<?php // For loop -  cycle through array
		
							if($contacts) {
						    foreach($contacts as $contact) {
		
						    // Get custom meta values    
						    $photoid  	= $contact['_photo'];
						    $photourl	= wp_get_attachment_image_src($photoid,'contact', true);
						    $heading 	= $contact['_heading'];
						    $text 		= $contact['_text'];
						    $email 		= $contact['_email'];
						    $emailt 	= $contact['_emailtext'];
						    $phone 		= $contact['_phone'];
						    $phoned		= $contact['_displayphone'];
		
						?>
		
						 <div class="contact__single wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.5s">
						 	<div class="contact__single__copy">
						 		<?php if ($heading) { ?>
						 			<h4>
						 				<?php echo $heading; ?>
						 			</h4>
						 		<?php } ?>
						 		<?php if ($text) { ?>
						 			<div>
						 				<?php echo $text; ?>
						 			</div>
						 		<?php } ?>
						 	</div>
						 	<div class="contact__single__buttons">
						 		<?php if ($phone) { ?>
						 			<a href="tel:<?php echo $phone; ?>"><button>
						 					<?php echo $phoned; ?>
						 				</button></a>
						 		<?php } ?>
						 		<?php if ($email) { ?>
						 			<a href="mailto:<?php echo $email; ?>">
						 				<h3><span class="contact-border"><?php echo $emailt; ?></span></h3>
						 			</a>
						 		<?php } ?>
						 	</div>
						 </div>
						
						<?php
						        }
						    }
						?>
		
			<?php endwhile; endif; ?>	
		</div>

	<?php endwhile; else : ?>
	    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
	<?php endif; ?>


<?php get_footer(); ?>