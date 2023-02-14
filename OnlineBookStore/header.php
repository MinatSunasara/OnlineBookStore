<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
     <!-- Header Section Start -->
     <section>
    	<header class="header book_header">
                <!-- <img  class="header-logo-img" src="<?php echo header_image(); ?>" alt=""> -->
                <img  class="header-logo-img" src="<?php bloginfo('template_url'); ?>/assets/images/logo.png" alt="">
    			<p class="menu_text">Menu<img class="arrow_img" src="<?php bloginfo('template_url'); ?>/assets/images/arrrow.png"></p>
                <span id="search"><input type="text" name="search" class="header_search book_search_header" placeholder="Find Books here"></span>
                <img src="<?php bloginfo('template_url'); ?>/assets/images/cart.png" class="header-cart" alt="">
                <button class="header_signin_btn">Sign in</button>
				<button class="header_account_btn h_btn acc_btn">Create account</button>
    	</header>
    </section>

</body>
</html>