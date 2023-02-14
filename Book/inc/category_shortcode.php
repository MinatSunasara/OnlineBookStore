<?php
	function category_section() {
	ob_start();
    ?>
    <section class="categories">
    	<div class="title"><h1>Categories</h1></div>
    	   <div class="category_slider_block">
					<!-- get categories -->
	    			<?php
	    			$book_terms = get_terms( array(
					    'taxonomy' => 'book_store_category',
					    'hide_empty' => false,
					) );
						if ($book_terms) {
						    foreach($book_terms as $book_term) {
						    	?>
						    	  <div class="category_slider">
	    							<h2 class="slider_title">
	    								<?php
										// category name
	    								  echo  $book_term->name;
	    								?>
	    							</h2>
	    							<p class="slider_items">
	    								<?php
	    								  echo  $book_term->count . '+ item';
	    								?>
	    							</p>
						    	</div>
						   <?php } 
						}
    				?>
	    	</div>
    	</div>
    </section>
<?php
}
add_shortcode('category_section', 'category_section');
?>