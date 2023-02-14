<?php
	function top_rated_books() {
	ob_start();
	// GEt Book post data
	$args = array(
	    'post_type' => 'book_store',
	    'post_status' => 'publish',
	    'posts_per_page' => 20, 
		'orderby'   => 'meta_value', 
        'order' => 'DESC',
        'meta_key' => 'top_10_star',
	);
	$books = new WP_Query($args);
?>
    	<section class="top_rated_block">
			<div class="container_book">
				<h1>10 Top Rated Books</h1>
    		<div class="view_more_rated_books">View more<i class="fas fa-arrow-right"></i></div>
		    	<div class="rated_block">
		    		<?php
						while($books->have_posts()){
							$books->the_post();
							global $post;
							// To get book image from admin site which is store on variable
							$image = wp_get_attachment_url( get_post_thumbnail_id($post->ID));
					?>
		    		<div class="top_books">
		    			<img class="rated_book_img"src="<?php echo $image; ?>" alt="">		    					
		    			<div class="star-<?php echo esc_html(get_post_meta( $post->ID, 'top_10_star', true )); ?> book_star">
								<?php
									// Get star from admin site using ACF
									$field = get_field_object( 'top_10_star' );
									$value = $field['value'];
									for ($x = 1; $x <= $value; $x++) {
										echo '<span><i class="fas fa-star"></i></span>';
									}
								?>
						</div>
						<h2 class="rated-heading">
							<?php the_title();?>		
						</h2>
						<p class="Book_author">
							<!-- Get book Author which is store in taxonomy-->
							<?php
    							$book_author = get_the_terms( $post->ID, 'book_store_author' );
								if ($book_author){
						    		foreach($book_author as $books_author) {
						    			echo '<span>' . $books_author->name. '</span>';
						    		} 
								}
							?>
    					</p>
						<div class="bottom">
							<!-- Get Book Price Using ACF -->
							 <div class="button"><p><?php echo get_field( "book_price" );?></p><span><?php echo get_field("cancel_price_");?></span>
              				<div class="cart"><i class="fas fa-shopping-basket  basket"></i></div></div>
						</div>
		    		</div>
		    		<?php
					}
					wp_reset_query();
					?>
		    	</div>
			</div>
    		
   		</section>
    <?php
}
add_shortcode('top_rated_books', 'top_rated_books');
?>
