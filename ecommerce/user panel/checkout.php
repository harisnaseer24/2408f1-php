<?php 
include_once "./components/header.php";
if(!isset($_SESSION["role"]) || $_SESSION["role"]!="user"){
echo'
<script>alert("Please login first")
location.href= "./login.php"
</script>
';
}
require_once "../config/config.php";
$userId=$_SESSION["user_id"];
$grandTotal=0;


 
?>

		<!-- NAVIGATION -->
		<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
						<li class="active"><a href="#">Home</a></li>
						<li><a href="#">Hot Deals</a></li>
						<li><a href="#">Categories</a></li>
						<li><a href="#">Laptops</a></li>
						<li><a href="#">Smartphones</a></li>
						<li><a href="#">Cameras</a></li>
						<li><a href="#">Accessories</a></li>
					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
		<!-- /NAVIGATION -->

		<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<h3 class="breadcrumb-header">Checkout</h3>
						<ul class="breadcrumb-tree">
							<li><a href="#">Home</a></li>
							<li class="active">Checkout</li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<div class="col-md-7">
						<!-- Billing Details -->
						 <form action="processorder.php" method="post">
						<div class="billing-details">
							<div class="section-title">
								<h3 class="title">Billing address</h3>
							</div>
						
							<div class="form-group">
								<input class="input" name="address"  required type="text"  placeholder="Address">
							</div>
							<div class="form-group">
								
								<input class="input" name="userId" type="hidden" value="<?=$userId?>">
							</div>
							<div class="form-group">
								<input class="input" name="city" required type="text"  placeholder="City">
							</div>
							
							<div class="form-group">
								<input class="input" name="contact" required type="tel"  placeholder="Contact no">
							</div>
							
						</div>

						<!-- /Billing Details -->

						

					
					</div>

					<!-- Order Details -->
					<div class="col-md-5 order-details">
						<div class="section-title text-center">
							<h3 class="title">Your Order</h3>
						</div>
						<div class="order-summary">
							<div class="order-col">
								<div><strong>PRODUCT</strong></div>
								<div><strong>TOTAL</strong></div>
							</div>
							
							<div class="order-products">
								<?php 
								  $getCartItems= "SELECT * FROM `cart` as c 
INNER JOIN `products` as p
ON c.product_id= p.product_id where c.user_id= $userId;";
  $getCartItemsResult= mysqli_query($conn,$getCartItems);
 if(mysqli_num_rows($getCartItemsResult) > 0)
{
    while($row= mysqli_fetch_assoc($getCartItemsResult)){
    

   
      $image= $row["image"];
        $grandTotal += $row['total'];

							
						echo	
					'	<div class="order-col">
									<div>'.$row["qty"].' X '.$row["title"].'</div>
									<div>'.$row["total"].'</div>
								</div>';
	}
}else{

    echo '
     <tr>
      Please add something to cart first.
    </tr>
    ';
}
	?>
							
							</div>
							<div class="order-col">
								<div>Shiping</div>
								<div><strong>Rs. 150</strong></div>
							</div>
							<div class="order-col">
								<div><strong>TOTAL</strong></div>
								<div><strong class="order-total">Rs. <?=$grandTotal?></strong></div>
							</div>
						</div>
						<div class="payment-method">
							<div class="input-radio">
								<input type="radio" name="payment" id="payment-1" required>
								<label for="payment-1">
									<span></span>
									Cash on Delivery
								</label>
								<div class="caption">
									<p>Shipping charges are included in total.</p>
								</div>
							</div>
							
						</div>
						<div class="input-checkbox">
							<input type="checkbox" id="terms" required>
							<label for="terms">
								<span></span>
								I've read and accept the <a href="#">terms & conditions</a>
							</label>
						</div>
						<input class="input" name="amount" type="hidden" value="<?=$grandTotal?>">
						<button type="submit" name="checkout" class="primary-btn order-submit">Place order</button>
					</div>
					</form>
					<!-- /Order Details -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- NEWSLETTER -->
		<div id="newsletter" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="newsletter">
							<p>Sign Up for the <strong>NEWSLETTER</strong></p>
							<form>
								<input class="input" type="email" placeholder="Enter Your Email">
								<button class="newsletter-btn"><i class="fa fa-envelope"></i> Subscribe</button>
							</form>
							<ul class="newsletter-follow">
								<li>
									<a href="#"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-twitter"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-instagram"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-pinterest"></i></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /NEWSLETTER -->

	<?php 
include_once './components/footer.php';
?>