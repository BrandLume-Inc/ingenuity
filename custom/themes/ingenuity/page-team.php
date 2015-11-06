<?php /* Template Name: Team Page */ ?>

<?php get_header(); ?>	
<section class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right" id="push-panel">
	
</section>

<?php // The loop starts here
	if ( have_posts() ) : while ( have_posts() ) : the_post();
?>
		
	<?php // Get custom meta values 

      // Hero Banner
      $banner     = get_post_meta( $post->ID, '_banner_image', true );
      $bannerurl  = wp_get_attachment_image_src( $banner,'banner', true );
      $heading    = get_post_meta( $post->ID, '_banner_heading', true );
      $subheading = get_post_meta( $post->ID, '_banner_subheading', true );
  	
  	?>

	<div class="default-hero" style="background-image: url('<?php echo $bannerurl[0] ?>'); background-size: cover;">
		<hgroup>
			<h1 class="team__hero-heading"><?php echo $heading; ?></h1>
			<h2 class="team__hero-subheading"><?php echo $subheading; ?></h2>
		</hgroup>
	</div>


		<div class="team__container">
		<?php // bring in the team members!

			$query = new WP_Query( array( 'post_type' => 'team' ) );

			if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>

				<?php // Get custom meta values 
					$members = get_post_meta($post->ID,'_teammember',true);
				?>
				
					<?php // For loop -  cycle through array

						if($members) {
					    foreach($members as $member) {

					    // Get custom meta values    
					    $photoid  	= $member['_photo'];
					    $photourl	= wp_get_attachment_image_src($photoid,'services', true);
					    $name 		= $member['_name'];
					    $creds 		= $member['_creds'];
					    $title 		= $member['_jobtitle'];
					    $profile 	= $member['_profile'];
					    $longbio 	= $member['_longbio'];
					    $flag		= $member['_flag'];

					?>

					<?php if ($flag == 'value3') { ?>

						<figure class="team__single trigger-push-panel wow fadeIn" data-name="<?php echo $name; ?>" data-longbio="<?php echo $longbio; ?>">
						<?php if (wp_attachment_is_image($photoid) == true) { ?>
							<figure style="background-image: url('<?php echo $photourl[0]; ?>');"></figure>
						<?php } ?>
							<hgroup>
								<h3 class="team__name"><?php echo $name; ?>
									<?php if ($creds) { ?>
										<span class="team__creds">
											<?php echo $creds; ?>
										</span>
									<?php } ?>
								</h3>
								<h4 class="team__title"><?php echo $title; ?></h4>
								<!-- <figcaption><?php echo $profile; ?></figcaption> -->
							</hgroup>
						</figure>

					<?php } else { ?>

						<figure class="team__single wow fadeIn" data-name="<?php echo $name; ?>" data-longbio="<?php echo $longbio; ?>">
						<?php if (wp_attachment_is_image($photoid) == true) { ?>
							<figure style="background-image: url('<?php echo $photourl[0]; ?>');"></figure>
						<?php } ?>
							<hgroup>
								<h3 class="team__name"><?php echo $name; ?>
									<?php if ($creds) { ?>
										<span class="team__creds">
											<?php echo $creds; ?>
										</span>
									<?php } ?>
								</h3>
								<h4 class="team__title"><?php echo $title; ?></h4>
								<!-- <figcaption><?php echo $profile; ?></figcaption> -->
							</hgroup>
						</figure>
						<hgroup class="drop-down-panel">
							<div class="push__longbio animated fadeIn">
								<?php echo $longbio; ?>
							</div>
							<button id="close-push-panel">CLOSE</button>
						</hgroup>

					<?php } ?> 
					
					<?php
					        }
					    }
					?>

		<?php endwhile; endif; ?>	
		</div>

<?php endwhile; endif; ?>

<?php get_footer(); ?>









