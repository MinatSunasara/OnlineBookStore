<?php 
function feature_book_shortcode(){
    ob_start();
    // GEt feature Book post data
    $args=array(
        'post_type'=>'book_store',
        'post_status'=>'publish',
        'post_per_page'=>20,
        'orderby'   => 'meta_value', 
        'order' => 'DESC',
        'meta_key' => 'top_10_star',
    );
    $books=new Wp_Query($args);
    ?>
    <section class="featured_book_slide">
        <div class="feature_start">
            <h1 class="feature_title">Feature Book</h1>
            <div class="view-more-featured">View more<i class="fas fa-arrow-right"></i></div>
        </div>
        <div class="feature_book_block">
            <div class="feature_book_container">
                <?php
                    while($books->have_posts()){
                        $books->the_post();
                        global $post;
                        // To get book image from admin site which is store on variable
                        $image = wp_get_attachment_url( get_post_thumbnail_id($post->ID));
                ?>
                <div class="feature_book">
                    <div class="feature_book_image">
                        <img class="feature_image" src="<?php echo $image;?>" alt="">
                    </div>
                    <div class="content_slider">
                        <div class="feature_section_1">
                            <h4 class="feature_book_category">
                                <!-- Get book category -->
                                <?php 
                                    $book_category=get_the_terms($post->ID,'book_store_category');
                                    if($book_category){
                                        foreach($book_category as $books_category){
                                            echo $books_category->name;
                                        }
                                    }
                                ?>
                            </h4>
                            <div class="feature_star">
                                <!-- Get star for rating -->
                                <?php
                                    $field = get_field_object( 'top_10_star' );
                                    $value = $field['value'];
                                    for ($x = 1; $x <= $value; $x++) {
                                        echo '<span><i class="fas fa-star"></i></span>';
                                    }
                                ?>
                            </div>
                            <?php $review_count=get_field("review");
                                    if(empty($review_count)){
                                        $review_count=100;
                                    }
                            ?>
                            <span class=feature_review> <?php echo $review_count;?> Review</span>
                        </div>
                        <div class="feature_section_2">
                            <!-- get Book Name -->
                            <h1 class="feature_head"><?php the_title();?></h1>    
                            <p class="feature_books_content">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <div class="feature_price_block">
                                <!-- Get book price using ACF -->
                                <p class="feature_price_1"><?php echo get_field( "book_price" );?><span class="feature_price_2"><?php echo get_field("cancel_price_");?></span></p>
                            </div>
                        </div>
                        <div class="feature_section_3">
                            <button type="submit" class="feature_cart_button"><img class="cart_feature_image" src="<?php bloginfo('template_url'); ?>/assets/images/basket.png" alt=""> Add to cart</button>
                            <div class="books_like">
                                <i class="heart_like fas fa-heart"><?php echo get_field("like");?> </i>
                            </div>
                            <p class="featured_view_detail">View Details</p>
                        </div>
                    </div>
                </div>
             <?php } ?>
            </div>
        </div>  
    </section>
    <?php
}
add_shortcode('feature_book_shortcode', 'feature_book_shortcode');
?>




