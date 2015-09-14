<?php

		$query = new WP_Query( array( 'post_type' => 'templates', 'posts_per_page' => 1 ) );

		if ( $query->have_posts() ) :

		    while ( $query->have_posts() ) : $query->the_post(); ?>

		  		<article id="templates">
		  			<h2 class="sidebar-link">Templates</h2>

          <div class="tone__content"><?php the_content(); ?></div>

          <h3>Templates for download:</h3>

         		<ul class="template-links">

            		<!-- Get custom meta values -->
            		<?php 
            			$temps = get_post_meta($post->ID,'_template',true);
            		?>

                 	<!-- For loop cycle through Array -->
                 	<?php if($temps) {
                 	    foreach($temps as $temp) {

                 	    // Get custom meta values    
                 	    $label   = $temp['_label'];
                 	    $link  = $temp['_upload'];
                 	?>
                 	
                 	<?php if ($label && $link): 
                 	   echo '<li><a href="' . $link . '">' . $label . '</a></li>'; 
                 	endif ?>

                 	<?php
                 	        }
                 	    }
                 	?>
			
						</ul>

					</article>
		   
		    <?php endwhile;

		endif;

?>