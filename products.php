<?php 
	require_once("includes/header.php");
	require_once("config.php");
?>
<style type="text/css">
	.checkbox-btn{
	background: transparent;
	border: none;
	color: #adadad;
	padding-left: 0px;
	font-size: 14px;
	text-transform: capitalize;
	font-weight: normal;
	font-family: "Open Sans", "Helvetica Neue", Helvetica, Arial, sans-serif;
	}
	i.state-icon.fa.fa-check-square-o {
	font-size: 20px;
	margin-right: 6px;
	}
	.checkbox-btn:hover, .checkbox-btn:active, .checkbox-btn, .checkbox-btn.active:focus, .checkbox-btn:visited, .checkbox-btn.active, .checkbox-btn:focus{
	background: transparent!important;
	border: none!important;
	color: #adadad!important;
	box-shadow: none !important;
	outline: none;
	}
	.button-checkbox button i{
	color: #444;
	font-size: 22px;
	margin-right: 10px;
	}
	.button-checkbox{
	display: block;
	}
	#sidebar .widget-title h4, .blog-desc h3 a, .blog-desc h3 {
	padding: 0;
	margin: 0;
	color: #111111;
	font-size: 12px;
	font-weight: 100;
	text-transform: uppercase;
	}
	.loading-div{
	display: none;
	}
	/*.rating{
	display: none;
	}*/
	.pagination > li {
	display: inline-block;
	}
	.pagination > li.active {
	display: inline-block;
	border: 0 none;
	color: #fff;
	/* margin-top: -13px; */
	/* float: left; */
	font-size: 17px;
	/* font-weight: bold; */
	/* line-height: 1.42857; */
	top: -10px;
	/* margin-left: -1px; */
	padding: 2px 8px;
	background: #d8703f;
	/* position: relative; */
	}
</style>
<section class="section banner nopadbot" style="background-image:url('upload/parallax_02.jpg');" data-img-width="2000" data-img-height="1508" data-diff="100">
	<div class="overlay"></div>
	<div class="container">
		<div class="page-header">
			<div class="bread">
				<ol class="breadcrumb">
					<li><a href="index.php">Home</a></li>
					<li class="active">Products</li>
				</ol>
			</div><!-- end bread -->
			<h1>Products</h1>
		</div>
	</div>
</section>

<section class="section border-top">
	<div class="container">
		<div class="row">
			<div id="content" class="col-md-12 col-xs-12 pull-right">
				<div class="row shop-top">
					<div class="col-md-6">
						<!-- <p class="woocommerce-result-count">Showing 1&ndash;12 of 221 results</p> -->
					</div>
					<div class="col-md-6 text-right">
						<!-- <div class="catalog-order">
							<select name="orderby" id="orderby" class="selectpicker">
								<option value="0"> Sort By </option>
								<option value="1">Sort by newness</option>
								<option value="2" >Sort by price: low to high</option>
								<option value="3" >Sort by price: high to low</option>
							</select>
						</div> -->
					</div>
				</div>
				<div class="col-md-12 text-center">
					<div class="loading-div"><img src="images/loader.gif" >
					</div>
				</div>
				
				<div class="row shop-catalog" id="results">
					<?php
						
						$product_arr = products($_GET['design']);

						if(is_array($product_arr)){
							foreach($product_arr as $productlist){
								$pid= $productlist['product_id'];
							?>
							<div class="col-md-4 col-sm-6">
								<div class="shop-item">   
									<div class="entry">
										<?php 
											if($productlist['is_new'] == "1"){
											?>
											<div class="left-button">
												<h4>New!</h4>
											</div>
											<?php 
											}
										?>
										<a class="hover-image" href="single-product.php?product_id=<?php echo $pid; ?>" title="">
											<div class="img-rotate">
												<img src="<?php echo $productlist['product_image_link']?>" class="img-responsive" alt="<?php echo $productlist['product_title']; ?>">
												<img src="<?php echo $productlist['product_image_link']?>" class="img-responsive rotate-image" alt="<?php echo $productlist['product_title']; ?>">
											</div>  
										</a>
										<div class="shop-item-title clearfix">
											<h4><a href="single-product.php?product_id=<?php echo $pid; ?>"><?php echo $productlist['product_title']?></a></h4>
										</div><!-- end shop-item-title -->
									</div><!-- entry -->
								</div><!-- end relative -->
							</div><!-- end col -->
							<?php
							}
						?>
						<?php
						}
						else{
						?>
						<div class="col-md-12 col-sm-12">
							<div class="shop-item">   
								<div class="entry">
									<div class="shop-item-title text-center clearfix">
										<h4>No Products to Display</h4>
									</div>
								</div>
							</div>
						</div>
						<?php
						}
					?>
					</div><!-- end row -->
					
					
					
				</div><!-- end content -->
			</div><!-- end row -->
		</div><!-- end container -->
	</section>     
	
	<?php require_once("includes/footer.php");?>
	<script type="text/javascript">
		// $(function () {
		// $('.button-checkbox').each(function () {
		
		// // Settings
		// var $widget = $(this),
		// $button = $widget.find('button'),
		// $checkbox = $widget.find('input:checkbox'),
		// color = $button.data('color'),
		// settings = {
		// on: {
		// icon: 'fa fa-check-square-o'
		// },
		// off: {
		// icon: 'fa fa-square-o'
		// }
		// };
		
		// // Event Handlers
		// $button.on('click', function () {
		// $checkbox.prop('checked', !$checkbox.is(':checked'));
		// $checkbox.triggerHandler('change');
		// updateDisplay();
		// });
		// $checkbox.on('change', function () {
		// updateDisplay();
		// });
		
		// // Actions
		// function updateDisplay() {
		// var isChecked = $checkbox.is(':checked');
		
		// // Set the button's state
		// $button.data('state', (isChecked) ? "on" : "off");
		
		// // Set the button's icon
		// $button.find('.state-icon')
		// .removeClass()
		// .addClass('state-icon ' + settings[$button.data('state')].icon);
		
		// // Update the button's color
		// if (isChecked) {
		// $button
		// .removeClass('btn-default')
		// .addClass('btn-' + color + ' active');
		// }
		// else {
		// $button
		// .removeClass('btn-' + color + ' active')
		// .addClass('btn-default');
		// }
		// }
		
		// // Initialization
		// function init() {
		
		// updateDisplay();
		
		// // Inject the icon if applicable
		// if ($button.find('.state-icon').length == 0) {
		// $button.prepend('<i class="state-icon ' + settings[$button.data('state')].icon + '"></i> ');
		// }
		// }
		// init();
		// });
		// });
		
		$(".cat_filter").click(function(){
			var curr_str = $(this).attr("id");
			var curr_id = curr_str.substring(4);
			var italic = $(this).find('i');
			if($(this).hasClass("btn-default")){
				$(this).removeClass("btn-default").addClass("btn-primary active");
				italic.removeClass("fa-square-o").addClass("fa-check-square-o");
				$("#cat_"+curr_id).attr("checked","checked");
			}
			else{
				$(this).removeClass("btn-primary active").addClass("btn-default");
				italic.removeClass("fa-check-square-o").addClass("fa-square-o");
				$("#cat_"+curr_id).removeAttr("checked");
			}
			
			var category_val = '';
			$('.cat_filter').each(function(i){
				var curr_string = $(this).attr("id");
				var curr_check_id = curr_string.substring(4);
				if($(this).hasClass("btn-primary active")){
					if(i == 0){
						category_val += curr_check_id;
					}
					else{
						category_val += ","+curr_check_id;   // Or ',' for '1','2'
					}
					category_val = category_val.replace(/^,|,$/g,'');
				}
			});
			$("#category_val").val(category_val);
			$("#page_val").val("1");
			get_products();
		});
		
		$(".brand_filter").click(function(){
			var curr_str = $(this).attr("id");
			var curr_id = curr_str.substring(4);
			var italic = $(this).find('i');
			if($(this).hasClass("btn-default")){
				$(this).removeClass("btn-default").addClass("btn-primary active");
				italic.removeClass("fa-square-o").addClass("fa-check-square-o");
				$("#brand_"+curr_id).attr("checked","checked");
			}
			else{
				$(this).removeClass("btn-primary active").addClass("btn-default");
				italic.removeClass("fa-check-square-o").addClass("fa-square-o");
				$("#brand_"+curr_id).removeAttr("checked");
			}
			
			var brand_val = '';
			$('.brand_filter').each(function(i){
				var curr_string = $(this).attr("id");
				var curr_check_id = curr_string.substring(4);
				if($(this).hasClass("btn-primary active")){
					if(i == 0){
						brand_val += curr_check_id;
					}
					else{
						brand_val += ","+curr_check_id;   // Or ',' for '1','2'
					}
					brand_val = brand_val.replace(/^,|,$/g,'');
				}
			});
			$("#brand_val").val(brand_val);
			$("#page_val").val("1");
			get_products();
		});
		
		$(".design_filter").click(function(){
			var curr_str = $(this).attr("id");
			var curr_id = curr_str.substring(4);
			var italic = $(this).find('i');
			if($(this).hasClass("btn-default")){
				$(this).removeClass("btn-default").addClass("btn-primary active");
				italic.removeClass("fa-square-o").addClass("fa-check-square-o");
				$("#design_"+curr_id).attr("checked","checked");
			}
			else{
				$(this).removeClass("btn-primary active").addClass("btn-default");
				italic.removeClass("fa-check-square-o").addClass("fa-square-o");
				$("#design_"+curr_id).removeAttr("checked");
			}
			
			var design_val = '';
			$('.design_filter').each(function(i){
				var curr_string = $(this).attr("id");
				var curr_check_id = curr_string.substring(4);
				if($(this).hasClass("btn-primary active")){
					if(i == 0){
						design_val += curr_check_id;
					}
					else{
						design_val += ","+curr_check_id;   // Or ',' for '1','2'
					}
					design_val = design_val.replace(/^,|,$/g,'');
				}
			});
			$("#design_val").val(design_val);
			$("#page_val").val("1");
			get_products();
		});
		
		
		// Page Number Click //
		$(".number_box").click(function(){
			var number_box_id = this.id;
			$("#page_val").val(number_box_id);
			get_products();
			return false;
		});
		// Page Number Click //
		
		// Order Change //
		$("#orderby").change(function(){
			$("#orderby_val").val($(this).val());
			$("#page_val").val("1");
			get_products();
		});
		// Order Change //
		
		function get_products(){
			var category_val = $("#category_val").val();
			var device_val = $("#device_val").val();
			var brand_val = $("#brand_val").val();
			var design_val = $("#design_val").val();
			var orderby_val = $("#orderby_val").val();
			var page_val = $("#page_val").val();
			var search_val = $("#search_val").val();
			
			$.ajax({
				type:"post",
				data:"category_val="+category_val+"&device_val="+device_val+"&brand_val="+brand_val+"&design_val="+design_val+"&orderby_val="+orderby_val+"&page_val="+page_val+"&search_val="+search_val,
				url:"get_products.php",
				beforeSend:function(){
					$("#results").html("");
					$("#results").html("<img src='images/ajax_loader.gif' alt='Loader Image' />");
				},
				success:function(msg){
					//alert(msg);
					$("#results").html("");
					$("#results").html(msg);
					$('html, body').animate({scrollTop:$('#results').position().top}, 'slow');
				}
			});
			return false;
		}
	</script>
	<script type="text/javascript">
	</script>
</body>

</html>