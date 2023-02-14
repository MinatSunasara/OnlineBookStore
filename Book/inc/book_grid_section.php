<?php 

function book_grid(){
    ob_start();
    // Search Book Categroy from lacation
    $book_catArray=[];
    $get_category=isset($_GET['category']);
    if($get_category){
        foreach($_GET['category'] as $location){
            if(!empty($location)){
                array_push($book_catArray,$location);
            }
        }
    }
    if(isset($book_catArray)&& !empty($book_catArray)){
        $category_taxonomy=array(
            'taxonomy'=>'book_store_category',
            'field'=>'slug',
            'terms'=>$book_catArray,
        );
    }else{
        $category_taxonomy='';
    }
    // Query for search publisher
    $book_publisherArray =[];
    $get_publisher = isset($_GET['publisher']);
    if($get_publisher){
        foreach($_GET['publisher'] as $location){
            if(!empty($location)){
                array_push($book_publisherArray,$location);
            }  
        }
    }
    if(isset($book_publisherArray)&& !empty($book_publisherArray)){
        $publisher_tax_query=array(
            'taxonomy'=>'book_store_publisher',
            'field'=>'slug',
            'terms'=>$book_publisherArray
        );
    }else{
        $publisher_tax_query='';
    }
    // Query for search year
    $book_YearArray =[];
    $get_year = isset($_GET['Year']);
    if($get_year){
        foreach($_GET['Year'] as $location){
            if(!empty($location)){
                array_push($book_YearArray,$location);
            }
        }
    }
    if(isset($book_YearArray)&& !empty($book_YearArray)){
        $Year_tax_query=array(
            'taxonomy'=>'book_store_year',
            'field'=>'slug',
            'terms'=>$book_YearArray
        );
    }else{
        $Year_tax_query='';
    }
    // Query for Search Book name 
    $book_Title ="";
    $get_title = isset($_GET['title']);
    if($get_title){

        $book_Title = $_GET['title'];
    }
    if(!empty($book_Title)){
        $Title_tax_query=array(
            'post_type'=>'book_store',
            'name'=>'Title',
            'terms'=>$book_Title
        );
    }else{
        $Title_tax_query='';
        // echo "title is empty";
    }
    $args = array(
        'post_type'=>'book_store',
        'post_status'=>'publish',
        'post_per_page'=>'',
        'orderby'   => 'meta_value', 
        'order' => 'DESC',
        'meta_key' => 'trending_star',
        'tax_query'=>array(
            'relation'=>'And',
            $publisher_tax_query,
            $category_taxonomy,
            $Year_tax_query,
        ),
        's'=>$book_Title,
    );
    $books=new WP_query($args);
    ?>
        <section class="book_grid_header">
            <div class="book_grid_menu">
                <div class="links">
                <a href="https://training-exercise-minatfatemas.md-staging.com/" class="home_menu">Home / </a>
                <a href="http://training-exercise-minatfatemas.md-staging.com/book" class="book_menu">Books</a>
                </div>
                <div class="count">
                    <h1>
                        <?php
                            echo $books->found_posts." Books Found";
                        ?>
                    </h1>
                </div>
            </div>
        </section>
        <div class="book_row_wrap">
            <section class="book_listing_wrap">
                <form method="GET" action="https://training-exercise-minatfatemas.md-staging.com/book/" class="filter_col">
                    <h1 class="book_filter">Filter</h1>
                    <h2 class="book_cat">Categories</h2>
                    <div class="category_filter">
                        <!-- GEt category list -->
                        <?php 
                            $book_category = get_terms(
                                array(
                                    'taxonomy'=>'book_store_category',
                                    'hide_empty'=>true,
                                )
                            );
                            if($book_category){
                                foreach($book_category as $books_category){
                                    echo '<label><input name="category[]" type="checkbox" value="'.$books_category->slug.'" />'.$books_category->name.'<span class="checkbutton"></span></label>';
                                }
                            }
                        ?>
                    </div>
                    <h2 class="publisher_heading">Publisher</h2>
                    <!-- Get publisher list -->
                    <div class="publisher_filter">
                        <?php
                            $book_publisher=get_terms(array(
                                'taxonomy'=>'book_store_publisher',
                                'hide_empty'=>true,
                            ));
                            if($book_publisher){
                                foreach($book_publisher as $books_publisher){
                                    echo '<label><input name="publisher[]" type="checkbox" value="'.$books_publisher->slug.'">'.$books_publisher->name.'<span class="checkbutton"></span></label>';
                                }
                            }
                        ?>
                    </div>
                    <h2 class="book_year">Year</h2>
                    <!-- Get book year list -->
                    <div class="get_year">
                        <?php
                            $book_store_years=get_terms(array(
                                'taxonomy'=>'book_store_year',
                                'hide_empty'=>true,
                            ));
                            if($book_store_years){
                                foreach($book_store_years as $books_store_years){
                                    echo '<label><input name="Year[]" type="checkbox" value="'.$books_store_years->slug.'">'.$books_store_years->name.'<span class="checkbtn"></span></label>';
                                }
                            }
                        ?>
                    </div>
                    <button type="submit" class="refine_search_button">Refine Search</button>
                    <button type="submit" class="refine_search_button">Reset Filters</button>    
                </form>
            </section>
            <section class="book_list_row">
                <div class="list_row_head">
                    <h1 class="heading_book">
                        Books
                    </h1>
                    <p class="book_para">Over 475+ books available here, find it now!</p>
                </div>
                <div class="book_rows">
                    <?php 
                        // Get all book which is store in admin pannel
                        while($books->have_posts()){
                            $books->the_post();
                            global $post;
                            $image=wp_get_attachment_url(get_post_thumbnail_id($post->ID));
                    ?>
                            <div class="book_filter_cols">
                                <div class="filter_book_image">
                                    <img src="<?php echo $image;?>" class="filter_books" alt="">
                                    <div class="book_icons_hover">
                                        <i class="fas fa-heart icon_heart"></i>
                                        <i class="fas fa-search icon_search"></i>
                                        <i class="fas fa-shopping-basket icon_basket"></i>
                                    </div>
                                </div>
                                <div class="bookContent">
                                      <div class="books_star">
                                    <span class="fa fa-star book_grid_star"></span>
                                    <?php 
                                     echo get_field("trending_star");
                                    ?>
                                </div>
                                <h2 class="books_category">
                                    <?php 
                                        $book_category=get_the_terms($post->ID,'book_store_category');
                                        if($book_category){
                                            foreach($book_category as $books_category){
                                                echo $books_category->name;
                                            }
                                        }
                                    ?>
                                </h2>
                                <h2 class="book_title">
                                    <?php the_title();?>
                                </h2>
                                <p class="para_book">
                                    <?php 
                                        $book_author=get_the_terms($post->ID,'book_store_author');
                                        if($book_author){
                                            foreach($book_author as $books_author){
                                                echo '<span>'.$books_author->name.'</span>';
                                            }
                                        }
                                    
                                    ?>
                                </p>
                                <h3 class="book_publish">By <?php 
                                        $book_publish=get_the_terms($post->ID,'book_store_publisher');
                                        if($book_publish){
                                            foreach($book_publish as $books_publish){
                                                echo '<span class="publish">'.$books_publish->name.'</span>';
                                            }
                                        }
                                    
                                    ?> / 
                                    <?php 
                                         $book_store_years_=get_the_terms($post->ID,'book_store_year');
                                         if($book_store_years_){
                                             foreach($book_store_years_ as $books_store_year){
                                                 echo '<span class="year">'.$books_store_year->name.'</span>';
                                             }
                                         } 
                                    ?>
                                </h3>
                                <!-- print book price -->
                                <button type="submit" class="trending_price"><?php echo get_field( "book_price" ); ?></button>
                                </div>
                            </div>
                    <?php
                        }
                    ?>
                </div>
            </section>
        </div>
    <?php
}
add_shortcode('book_grid', 'book_grid');
?>



<?php
function may_be_you_like(){
    ob_start();
    $args = array(
        'post_type'=>'book_store',
        'post_status'=>'publish',
        'post_per_page'=>'',
        'orderby'=>'title',
        'order'=>'ASC',
    );
    $books=new WP_query($args);
    ?>
    <section class="maybe_you_likeIt">
        <div class="section_start">
            <h1 class="maybe_like_heading">Maybe You Like It</h1>
            <div class="view-more-featured">View more<i class="fas fa-arrow-right"></i></div>
        </div>
        <div class="maybe_like_slider">
            <?php
                while($books->have_posts()){
                    $books->the_post();
                    global $post;
                    $image=wp_get_attachment_url(get_post_thumbnail_id($post->ID));
                ?>

                <div class="maybe_like_slides">
                    <div class="maybe_slide_row">
                        <div class="maybe_like_image">
                            <img class="maybe_like_books" src="<?php echo $image;?>" alt="">
                        </div>
                    </div>
                    <div class="maybe_like_row second">
                        <div class="row_1">
                            <div class="maybe_category">
                                <?php
                                    $book_category=get_the_terms($post->ID,'book_store_category');
                                    if($book_category){
                                        foreach($book_category as $books_category){
                                            echo $books_category->name;
                                        }
                                    }
                                ?>
                            </div>
                            <div class="maybe_star">
                                <span class="fa fa-star maybe_rating_star"></span>
                                <p class="maybe_rating_number"><?php 
                                     echo get_field("trending_star");
                                ?></p>
                            </div>
                        </div>
                        
                        <h2 class="maybe_title"><?php the_title(); ?></h2>
                        <div class="maybe_like_author">
                            <h2 class="maybe_author">
                                <?php
                                    $book_author = get_the_terms( $post->ID, 'book_store_author' );
                                    if ($book_author){
                                        foreach($book_author as $books_author) {
                                            echo '<span>' . $books_author->name. '</span>';
                                        } 
                                    }
                                ?>
                            </h2>
                        </div>
                        <div class="maybe_button"><p class="maybe_price"><?php echo get_field( "book_price" );?></p><span class="maybe_span"><?php echo get_field("cancel_price_");?></span></div>
                    </div>
                </div>
                <?php }?>
        </div>
    </section>
    <?php 
} 
add_shortcode("may_be_you_like","may_be_you_like");
?>

