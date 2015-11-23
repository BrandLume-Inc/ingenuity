<?php 

// Grab meta
$authors     = get_post_meta( $post->ID, '_authors_authorlist', true );

?>

<aside id="left"> 
	<p>

		<span class="bolded-text">Author(s):</span> 
		<?php if ($authors) { ?>
			<?php echo $authors; ?>
		<?php } else { ?>
			<a href="<?php the_author_link(); ?>"><?php the_author(); ?></a>
		<?php } ?>
		
	</p>
	<p><span class="bolded-text">Date:</span> <?php the_time( 'M j, Y' ); ?> </p>
	<p><span class="bolded-text">Category:</span> <?php echo get_the_category_list(); ?></p>
	<?php if (has_tag()) { ?>
		<p><span class="bolded-text">Tags:</span>the_tags();</p>
	<?php }  else {} ?>
</aside>

