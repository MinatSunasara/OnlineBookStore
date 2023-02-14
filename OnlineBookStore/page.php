<?php
get_header();
?>
			
				<?php
				
				if ( have_posts() ) : 
				    while ( have_posts() ) : the_post(); 
				    	?>

				    	<?php 
				         the_content();
				         
				    endwhile; 
				endif; 	
				
?>
<?php echo do_shortcode("[book_grid]"); ?>
<?php echo do_shortcode("[may_be_you_like]"); ?>
<?php
get_footer();
?>