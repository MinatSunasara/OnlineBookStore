<?php wp_head();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OnlineBookStore</title>
</head>
<body>
  <div class="body_container">
    <?php get_header();?>
    <!-- Search bar -->
    <?php echo do_shortcode("[home_search]"); ?>
    <!-- trending section start -->
    <?php echo do_shortcode("[trending_this_week]"); ?>
    <!-- StoreFeatures section start -->
    <section class="store_features">
      <div class="feature">
        <img class="store_img" src="<?php bloginfo('template_url'); ?>/assets/images/StoreFeature_quick-delivery.png" alt="">
        <h3 class="store_title">Quick Delivery</h3>
        <p class="store_description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
      </div>
      <div class="feature">
        <img class="store_img" src="<?php bloginfo('template_url'); ?>/assets/images/StoreFeature_secure-payment.png" alt="">
        <h3 class="store_title">Quick Delivery</h3>
        <p class="store_description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
      </div>
      <div class="feature">
        <img class="store_img" src="<?php bloginfo('template_url'); ?>/assets/images/StoreFeature_best-quality.png" alt="" style="width:43px; height:60px;">
        <h3 class="store_title">Quick Delivery</h3>
        <p class="store_description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
      </div>
      <div class="feature">
        <img class="store_img" src="<?php bloginfo('template_url'); ?>/assets/images/StoreFeature_return-guarantee.png" alt="" style="width:56px; height:60px;">
        <h3 class="store_title">Quick Delivery</h3>
        <p class="store_description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
      </div>
    </section>
    <!-- End -->
    <!-- category section start -->
    <?php echo do_shortcode("[category_section]"); ?>
    <!-- End -->
    <!-- top 10 rated books section start -->
    <?php echo do_shortcode("[top_rated_books]"); ?>
    <?php echo do_shortcode("[feature_book_shortcode]"); ?>
  </div>
  
    
    <?php get_footer();?>
</body>
</html>