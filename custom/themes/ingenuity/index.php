<?php get_header(); ?>	

	 
  <?php // The loop starts here 
  	if ( have_posts() ) : while ( have_posts() ) : the_post(); 
  ?>

  
  <?php // Grabbing meta variables
    $pullquote  = wpautop(get_post_meta($post->ID,'_blogadd_pullquote',true));
    $url        =  wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
  ?>

	<div class="default-hero" style="background-image: url('<?php echo $url[0] ?>'); background-size: cover;">
		<hgroup>
			<h1>Insert Main Heading Here</h1>
			<h2>Insert sub heading/intro here.</h2>
		</hgroup>
	</div>
	
	<div class="content-wrapper"> 
		<section class="main-content"> 
			
			

		</section> <!-- ARTICLE WRAP ends here -->
	</div> <!-- contentWrapper ends here -->

	<?php endwhile; else : ?>
	  <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
	<?php endif; ?>

<?php get_footer(); ?>