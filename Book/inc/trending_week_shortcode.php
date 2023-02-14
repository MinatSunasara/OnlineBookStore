<?php
function trending_week(){
      ob_start();

	// Get Trending week post
	$args = array(
	    'post_type' => 'book_store',
	    'post_status' => 'publish',
	    'posts_per_page' => 5,
	    'orderby'   => 'meta_value', 
        'order' => 'DESC',
        'meta_key' => 'trending_star',
	);
	$Book = new WP_Query($args);
	?>
 	<section class="trending_week_banner">
    	<div class="heading">
	        <h1 class="banner_heading">Trending this week</h1>
	        <p class="banner-para">Lorem sicing elit. Nihil suscipit qui asperiores dolorum veritatis? Expedita aliquid soluta incidunt nostrum suscipit saepe exercitationem adipisci quod error, qui, tempora molestias quas vitae!</p>
      	</div>
     	<div class="trending_items">
		<?php
			while($Book->have_posts()){
				$Book->the_post();

				global $post;
				// Store post thumbnail image in $image variable.
				$image = wp_get_attachment_url( get_post_thumbnail_id($post->ID));
		?>			
				<div class="item">
					<div class="trending_star">
						<div class="star_back">
							<span class="fa fa-star trend_star"></span>
							<p class="trending_rating"><?php echo get_field("trending_star");?></p>
						</div>
					</div>
					<div class="trending_image">
						<img class="Trending_book_img" src="<?php echo $image; ?>" alt="">
					</div>
						<h3 class="trending_book">
							<?php
								// Get book category like Biography.. Advanture...
								$book_category = get_the_terms( $post->ID, 'book_store_category' );
								if ($book_category) {
									foreach($book_category as $books_category) {
										echo '<span>' . $books_category->name. '</span>';
									} 
								}
							?>
						</h3>
						<!-- Get the book Title like The advanture -->
						<h2 class="trending_description"><?php the_title(); ?></h2>
						<h3 class="Trending_author">
							<!-- Get book name author like James Sulivan -->
							<?php
								$book_author = get_the_terms( $post->ID, 'book_store_author' );
								if ($book_author) {
									foreach($book_author as $books_author) {
										echo '<span>' . $books_author->name. '</span>';
									} 
								}
							?>
						</h3>
						<!-- Get book price using ACF -->
						<button type="submit" class="trending_price"><?php echo get_field( "book_price" ); ?></button>
					</div>
	<?php 	} ?>
		</div>
    </section>
<?php
}
add_shortcode('trending_this_week', 'trending_week');
?>