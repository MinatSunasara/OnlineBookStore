<?php 

    function home_search(){
        ob_start();
        $args = array(
            'post_type'=>'book_store',
            'post_status'=>'publish',
        );
        $books=new WP_Query($args);
        ?>
            <section>
                <div class="hero-banner">
                    <h1>Welcome to Clevr.</h1>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Deserunt ab repellendus repudiandae similique dolorem, corrupti rerum maiores atque odit repellat culpa doloribus iure itaque tempora necessitatibus nam. Pariatur, possimus qui?</p>
                </div>
            </section>
            <section>
                <div class="search_box">     
                    <form method="GET" action="http://training-exercise-minatfatemas.md-staging.com/book">
                        <!-- Get Year list -->
                        <select name="Year[]" id="books_year">
                        <option disabled selected hidden>Year</option>
                        <?php
                            $book_store_years=get_terms(array(
                                'taxonomy'=>'book_store_year',
                                'hide_empty'=>true,
                            ));
                            if($book_store_years){
                                foreach($book_store_years as $books_store_years){
                                    echo '<option value="'.$books_store_years->slug.'">'.$books_store_years->name.'</option>';
            
                                }
                            }
                        ?>
                        </select>
                        <!-- Get Publisher taxonomy list -->
                        <select class="book_publisher" name="publisher[]" id="book_publisher">
                            <option disabled selected hidden>Publisher</option>
                            <?php
                                $book_publisher=get_terms(array(
                                    'taxonomy'=>'book_store_publisher',
                                    'hide_empty'=>true,
                                ));
                                if($book_publisher){
                                    foreach($book_publisher as $books_publisher){
                                        echo '<option value="'.$books_publisher->slug.'">'.$books_publisher->name.'</option>';
                                    }
                                }
                            ?>
                        </select>
                        <span id="search"><input type="text" name="title" class="book_search" value="<?php ?>" placeholder="Enter Book Name here"></span>
                        <button class="search_button">Search</button>
                    </form>
                </div>
            </section>
        <?php
    }
    add_shortcode('home_search', 'home_search');
?>