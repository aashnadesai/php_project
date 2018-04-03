 <?php
	
		 require_once("includes/header.php");
		 require_once("config.php");
		 // pre($_SESSION);		 ?>
		<style type="text/css">
			.select_qty .btn-number{
			background: #f9f9f9!important;
			border: none!important;
			font-weight: 100!important;
			color: #bd8a66!important;
			}
			.myqty{
			background: #fff!important;
			margin-top: 2px;
			padding-top: 15px;
			}
			.select_qty .input-group{
			width: 122px;
			}
		</style>
		<section class="section banner nopadbot" style="background-image:url('upload/parallax_02.jpg');" data-img-width="2000" data-img-height="14998" data-diff="100">
			<div class="overlay"></div>
			<div class="container">
				<div class="page-header">
					<div class="bread">
						<ol class="breadcrumb">
							<li><a href="index.php">Home</a></li>
							<li class="active">Cart</li>
						</ol>
					</div><!-- end bread -->
					<h1>Cart</h1>
				</div>
			</div>
		</section>
		
		<section class="section border-top">
			<div class="container">
				<div class="row">
					<div class="col-md-10 col-md-offset-1 col-sm-12">
						<div class="row cart-body">
							<form class="form-horizontal" method="post">
								<div class="col-lg-12 col-md-12">
									<!--REVIEW ORDER-->
									<div class="panel panel-info">
										<div class="panel-heading">
											Review Order
										</div>
										<div class="panel-body" id="cart_body">
											 <?php
												$total_cart = 0;
												$get_cart = $_SESSION['shoppingCart'];
												
												if(is_array($get_cart)){
													 foreach($get_cart as $cart_val){
													 ?>
													<div class="form-group">
														<div class="col-sm-2 col-xs-12">
															<img alt="" class="img-responsive" src="<?php echo $cart_val['product_img']; ?>">
														</div>
														<div class="col-sm-8 col-xs-12 col-xs-12">
															<div class="col-xs-12"><h4><?php echo $cart_val['product_name']; ?></h4></div>
														</div>
														<?php
															$total_cart = round($total_cart + (round($cart_val['product_price']*$cart_val['qty'],2)),2);
														?>
														<div class="col-sm-2 col-xs-12 text-right">
															<h6> &#36;  <?php echo round($cart_val['product_price']*$cart_val['qty'],2); ?> </h6>
														</div>
													</div>
													<div class="form-group"><hr /></div>
													 <?php
													}
												}
											 ?>
											<div class="form-group">
												<div class="col-xs-12">
													<strong>Order Total</strong>
													<div class="pull-right">&#36; <?php echo $total_cart; ?></div>
												</div>
											</div>
											<div class="form-group"><hr /></div>
										</div>
										
										<div class="form-group text-right">
											<div class="col-xs-12">
												<strong><a href="products.php" class="btn custombutton button--isi btn-primary">CONTINUE SHOPPING</a></strong>
												
													
													
											</div>
										</div>
									</div>
									<!--REVIEW ORDER END-->
								</div>
							</form>
						</div>
					</div><!-- end col -->
				</div><!-- end row -->
			</div><!-- end container -->
		</section>
		
		<?php require_once("includes/footer.php");?>
		<script type="text/javascript" src="js/idle.js"></script>
		
	
		
	
</body>
</html>