<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<?php 
		$email='';
		$emailErr='';
		if(isset($_POST['submit'])) {
			if($_SERVER["REQUEST_METHOD"] == "POST"){

				if (empty($_POST["email"])) {
					$emailErr = "Email is required";
				} else {
					// check if e-mail address is well-formed
					if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
					$emailErr = "Invalid email format";
					}
				}
			}
		}
	?>
	<body>
		<form action="" method="POST">
			<footer class="footer foo">
				<div class="footer_block_1">
					<div class="newslater_block">
						<div class="news_content">
							<h1 class="sunscribe-footer-heading">Subscribe our newsletter for<br> newest books updates</h1>
						</div>
						<div class="news">
							<input type="text"  class="subscribe_input" placeholder="Type your email here" name="email">
							<span class="error"><?php echo $emailErr;?></span>
							<button class="subscribe_button" name="submit">subscribe</button>
						</div>
					</div>
				</div>
				<div class="footer_block_2">
					<div class="footer_row">
						<div class="footer_cols col1">
							<div class="div1">
								<img src="<?php bloginfo('template_url'); ?>/assets/images/logo.png" class="logo-footer-btn">
								<p class="footer_para">Clevr is a online bookstore website who sells all genres of books from around the world. Find your book here now</p>
							</div>
							<div class="div2 hide">
								<h1 class="Footer_heading">Follow Us</h1>
								<div class="footer_logos">
									<p class="logo"><i class="fab fa-facebook-f logos"></i></p>
									<p class="logo"><i class="fab fa-youtube logos"></i></p>
									<p class="logo"><i class="fa fa-twitter logos"></i></i></p>
									<p class="logo"><i class="fab fa-linkedin logos"></i></p>
									<p class="logo"><i class="fab fa-instagram logos"></i></p>
								</div>
							</div>
							
						</div>
						<div class="Quick_links">
							<h1 class="quick_link_heading">Quick Links</h1>
							<ul class="Quick_link_footer">
								<li>About us</li>
								<li>Contact us</li>
								<li>Products</li>
								<li>Login</li>
								<li>Sign Up</li>
							</ul>
						</div>
						<div class="customer_area">
							<h1 class="customer_area_heading">Customer Area</h1>
							<ul class="Customer_area_footer">
								<li>My Account</li>
								<li>Orders</li>
								<li>Tracking List</li>
								<li>Terms</li>
								<li>Privacy Policy</li>
								<li>FAQ</li>
							</ul>
						</div>
						<div class="subscribe hide">
							<div class="div3">
								<h1 class="notice_heading">Don’t miss the newest books</h1>
								<p class="notice_para">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut</p>
							</div>
							<div class="sub_subscribe">
								<input type="text" class="footer_input" placeholder="Type your email here">
								<button class="footer_button">Subscribe</button>
							</div>
						</div>
					</div>
					<div class="footer_2">
						<div class="div2 show">
							<h1 class="Footer_heading">Follow Us</h1>
							<div class="footer_logos">
								<p class="logo"><i class="fab fa-facebook-f logos"></i></p>
								<p class="logo"><i class="fab fa-youtube logos"></i></p>
								<p class="logo"><i class="fa fa-twitter logos"></i></i></p>
								<p class="logo"><i class="fab fa-linkedin logos"></i></p>
								<p class="logo"><i class="fab fa-instagram logos"></i></p>
							</div>
							<button class="header_account_btn create_button">Create account</button>
						</div>
						<div class="subscribe show">
							<div class="div3">
								<h1 class="notice_heading">Don’t miss the newest books</h1>
								<p class="notice_para">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut</p>
							</div>
							<div class="sub_subscribe">
								<input type="text" class="footer_input" placeholder="Type your email here">
								<button class="footer_button">Subscribe</button>
							</div>
						</div>
						
					</div>
					
					<div class="clevr-copyright-footer">
						<p class="copyright-footer">CLEVR  -   © 2020 All Rights Reserved</p>
						<p class="peterdraw-footer">Made with ♥ by Peterdraw</p>
					</div>
				</div>
			</footer>
		</form>
		
	</body>
</html>
<?php wp_footer(); ?>