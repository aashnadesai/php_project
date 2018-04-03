<?php 
	
	require_once("includes/header.php");
	require_once('config.php');

	// pre($_SESSION);

	if (isset($_POST) && !empty($_POST))
	{
		function addtocart($pid,$q)
		{
			if(is_array($_SESSION['shoppingCart']))
			{
				$arr = array_column($_SESSION['shoppingCart'], 'product_code');
				if (!in_array($pid, $arr))
				{
					// echo 'here';
					$thisproduct = product_info($pid);
					// pre($thisproduct);
				    $_SESSION['shoppingCart'][] = [
				    		'product_name' => $thisproduct[0]['product_title'],
				    		'product_desc' => $thisproduct[0]['product_description'],
				    		'product_price' => $thisproduct[0]['product_selling_price'],
				    		'product_img' => $thisproduct[0]['product_image_link'],
				    		'product_code' => $pid,
				    		'qty' => 1
					];
				}
				else
				{
					// echo 'there';
				}
			}
			else
			{
			    $_SESSION['shoppingCart'] = array();
			    $thisproduct = product_info($pid);
			    $_SESSION['shoppingCart'][0]['product_name']=$thisproduct[0]['product_title'];
			    $_SESSION['shoppingCart'][0]['product_desc']=$thisproduct[0]['product_description'];
			    $_SESSION['shoppingCart'][0]['product_price']=$thisproduct[0]['product_selling_price'];
			    $_SESSION['shoppingCart'][0]['product_img']=$thisproduct[0]['product_image_link'];
			    $_SESSION['shoppingCart'][0]['product_code']=$pid;
			    $_SESSION['shoppingCart'][0]['qty']=1;
			}
		}

		addtocart($_POST['product_id'], 1);
		echo "<span style='margin-left:2%'>product added successfully</span>";
	}
?>
		<style type="text/css">
			#glasscase{
			display: none;
			}
			strike small{
			color: #ccc;
			}
			#single-shop .select_qty .btn-number{
			background: #f9f9f9!important;
			border: none!important;
			font-weight: 100!important;
			color: #bd8a66!important;
			}
			#quantity{
			margin-top: 2px;
			padding-top: 10px;
			}
			#single-shop .select_qty .input-group{
			width: 122px;
			}
			@charset "UTF-8";
			.star-cb-group {
			/* remove inline-block whitespace */
			font-size: 0;
			/* flip the order so we can use the + and ~ combinators */
			unicode-bidi: bidi-override;
			direction: rtl;
			/* the hidden clearer */
			}
			.star-cb-group * {
			font-size: 2rem;
			}
			.star-cb-group > input {
			display: none;
			}
			.star-cb-group > input + label {
			/* only enough room for the star */
			display: inline-block;
			overflow: hidden;
			text-indent: 9999px;
			width: 1em;
			white-space: nowrap;
			cursor: pointer;
			}
			.star-cb-group > input + label:before {
			display: inline-block;
			text-indent: -9999px;
			content: "☆";
			color: #888;
			}
			.star-cb-group > input:checked ~ label:before, .star-cb-group > input + label:hover ~ label:before, .star-cb-group > input + label:hover:before {
			content: "★";
			color: #e52;
			text-shadow: 0 0 1px #333;
			}
			.star-cb-group > .star-cb-clear + label {
			text-indent: -9999px;
			width: .5em;
			margin-left: -.5em;
			}
			.star-cb-group > .star-cb-clear + label:before {
			width: .5em;
			}
			.star-cb-group:hover > input + label:before {
			content: "☆";
			color: #888;
			text-shadow: none;
			}
			.star-cb-group:hover > input + label:hover ~ label:before, .star-cb-group:hover > input + label:hover:before {
			content: "★";
			color: #e52;
			text-shadow: 0 0 1px #333;
			}
			
			fieldset {
			border: 0;  
			border-radius: 1px;
			/* padding: 1em 1.5em 0.9em;*/
			}
			
			#log {
			margin: 1em auto;
			width: 5em;
			text-align: center;
			background: transparent;
			}
			#Reviewform h3{
			color: #d8703f;
			font-size: 16px;
			text-transform: uppercase;
			margin-right: -1px;
			border-radius: 0 !important;
			text-transform: uppercase;
			font-family: Montserrat;
			font-size: 13px;
			padding: 0 4px;
			line-height: 1;
			border: 0 solid #e6e6e6 !important;
			font-weight: 500;
			margin: 0;
			}
		</style>
		<link rel="stylesheet" type="text/css" href="css/glasscase.css">
		
		<section class="section banner nopadbot" style="background-image:url('upload/parallax_02.jpg');" data-img-width="2000" data-img-height="1508" data-diff="100">
			<div class="overlay"></div>
			<div class="container">
				<div class="page-header">
					
			</div>
		</section>
		
		<section class="section">
			<?php

				$get_productinfo = product_info($_GET['product_id']);
				if(is_array($get_productinfo))
				{
			?>
				<div class="container">
					<div class="row">
						<div id="content" class="col-md-12 col-xs-12">
							<div id="single-shop" class="row">
								<div class="col-md-5">
									<div class="shop-images">
										<ul id="glasscase" class="gc-start" >
											<li><img class="img-responsive" alt="<?php echo $get_productinfo[0]['product_title']?>" src="<?php echo $get_productinfo[0]['product_image_link']?>" /></li>
										</ul>
									</div><!-- End Slider -->
								</div><!-- end col -->
								<div><?php ?></div>
								<div class="col-md-7">
									<div class="shop-item-title clearfix">
										<h4><?php echo $get_productinfo[0]['product_title']?></h4>
										<div class="shopmeta clearfix">
											<span class="price"><i class="fa fa-dollar" aria-hidden="true"></i>
												<?php echo $get_productinfo[0]['product_selling_price']?> 
												<!--<strike><small><i class="fa fa-inr" aria-hidden="true"></i><?php echo $get_productinfo[0]['product_mrp']?></small></strike>-->
											</span>
										</div><!-- end shop-meta -->
										
										
										<div class="shop-desc-style">
											
											<?php echo $get_productinfo[0]['product_description']?>
											<hr>
											<form action="" method="post">
												<div class="row">
													
													<input type="hidden" name="product_id" value="<?php echo $_GET['product_id']; ?>">
													<input type="submit" value="Add to Cart" class="btn custombutton button--isi btn-primary">
												</div><!-- end row -->
											</form>
										</div>
									</div>
								</div><!-- end col -->
							</div><!-- end single-shop -->
							
							<hr class="invis">
							
						</div><!-- end content -->
					</div>
				</div>    
				<?php               
				} 
			?>
		</section>
		
		<?php require_once("includes/footer.php");?>
		
		<script src="js/jquery.glasscase.min.js"></script>
		<script type="text/javascript"> 
			(function($){
				"use strict"; 
				$(document).ready(function(){
					//If your <ul> has the id "glasscase"
					$("#glasscase").glassCase({
						'widthDisplay': 1500, 
						'isDownloadEnabled': false, 
						'heightDisplay': 2098, 
						'nrThumbsPerRow': 4, 
						'isSlowZoom': true, 
						'isZoomDiffWH': true, 
						'zoomWidth': 400, 
						'zoomHeight': 559, 
						'zoomAlignment':
					'displayArea' });
				});
			})(jQuery);
		</script>
		
		<script src="js/bootstrap-select.min.js"></script>
		<script type="text/javascript">
			$('.selectpicker').selectpicker({
				style: 'btn-default'
			});
		</script>
		<script type="text/javascript">
			$(document).ready(function(){
				
				var quantitiy=0;
				$('.quantity-right-plus').click(function(e){
					e.preventDefault();
					var curr_id = $(this).attr("id");
					qty_append = curr_id.substring(3);
					var quantity = parseInt($('#quantity_'+qty_append).val());
					if(isNaN(quantity) || quantity == 0){
						var quantity = parseInt($('#quantity_'+qty_append).val(1));
					}
					if(quantity>0){
						$('#quantity_'+qty_append).val(parseInt(quantity + 1));
					}
					
				});
				
				$('.quantity-left-minus').click(function(e){
					e.preventDefault();
					var curr_id = $(this).attr("id");
					qty_append = curr_id.substring(3);
					var quantity = parseInt($('#quantity_'+qty_append).val());
					if(isNaN(quantity) || quantity == 0){
						var quantity = parseInt($('#quantity_'+qty_append).val(1));
					}
					if(quantity>1){
						$('#quantity_'+qty_append).val(parseInt(quantity - 1));
					}
				});
				
			});
		</script>
</body>
</html>