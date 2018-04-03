<?php 
	require_once("includes/header.php");
	require_once("config.php");
?>
    <!-- BANNER -->
    <!--
	<div id="Banner" class="modal fade in" tabindex="-1" role="dialog">
	<div class="modal-dialog">
	<div class="modal-content">
	<div class="modal-body">
	<div class="col-lg-8 col-md-8 col-sm-12">
	<h4 style="color:#ffffff;">SUBSCRIBE OUR NEWSLETTER</h4>
	<p style="color:#dddddd;">Subscribe to newsletter, take advantage of the campaigns.</p>
	<form class="newsletter" method="post"> 
	<input class="form-control" type="text" name="username" placeholder="Username"> 
	<input class="form-control" type="email" name="username" placeholder="Email Address"> 
	<button type="submit" class="btn custombutton button--isi btn-primary">Subscribe</button>
	</form> 
	</div>
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	</div>
	</div>
	</div>
	</div>
-->
    <!-- END BANNER -->
    <section class="section hiddensmall fullscreen paralbackground parallax" style="background-image:url('upload/back-banner.jpg');" data-img-width="2000" data-img-height="1508" data-diff="100">
        <div class="overlay"></div>
        <div class="container">
            <div class="slider-section">
                <div class="tp-banner-container">
                    <div class="tp-banner">
                        <ul>

                            <li data-transition="fade" data-slotamount="1" data-masterspeed="500" data-thumb="upload/slide-1.jpg" data-saveperformance="off" data-title="Prev">
                                <img src="upload/slide-1.jpg" alt="fullslide1" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">
                            </li>

                            <li data-transition="fade" data-slotamount="1" data-masterspeed="500" data-thumb="upload/slide-2.jpg" data-saveperformance="off" data-title="Prev">
                                <img src="upload/slide-2.jpg" alt="fullslide1" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- end container -->
    </section>
    
    <section class="section">
        <div class="container">
            <div class="general-title text-center">
                <h2>What's Hot</h2>
                <p>Listed below our new campaings promotions and offers</p>
            </div>
            <!-- end title -->
            <div class="banner-masonry row">
                <div class="banner-item item-w1 item-h1">
                    <a href="#"><img src="https://placeholdit.imgix.net/~text?txtsize=33&w=370&h=300" alt="" class="img-responsive"></a>
                </div>
                <!-- end banner-item -->
                <div class="banner-item item-w1 item-h1">
                    <a href="#"><img src="https://placeholdit.imgix.net/~text?txtsize=33&w=370&h=300" alt="" class="img-responsive"></a>
                </div>
                <!-- end banner-item -->
                <div class="banner-item item-w1 item-h2">
                    <a href="#"><img src="https://placeholdit.imgix.net/~text?txtsize=33&w=370&h=502" alt="" class="img-responsive"></a>
                </div>
                <!-- end banner-item -->
                <div class="banner-item item-w1 item-h1">
                    <a href="#"><img src="https://placeholdit.imgix.net/~text?txtsize=33&w=370&h=170" alt="" class="img-responsive"></a>
                </div>
                <!-- end banner-item -->
                <div class="banner-item item-w1 item-h1">
                    <a href="#"><img src="https://placeholdit.imgix.net/~text?txtsize=33&w=370&h=170" alt="" class="img-responsive"></a>
                </div>
                <!-- end banner-item -->
            </div>
            <!-- end banner -->
        </div>
        <!-- end container -->
    </section>

    <section class="section border-top">
        <div class="container">
            <div class="general-title text-center">
                <h2>New Products</h2>
                <p>You likely have anything to wear at any rate! Feel alive! So if you’re looking for best items!</p>
            </div>
            <!-- end title -->
            <div class="row">
                <?php
    				$display_products = get_latest_products();
    				if(is_array($display_products)){
    					foreach($display_products as $productlist){
    						$pid= $productlist['product_id'];
    						$encrypted_id = $pid;
    					?>

                        <div class="col-md-3 col-sm-4">
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
                                            <a class="hover-image" href="single-product.php?product_id=<?php echo $productlist['product_id']; ?>" title="">
                                                <div class="img-rotate">
                                                    <img src="<?php echo $productlist['product_image_link']?>" class="img-responsive" alt="<?php echo $productlist['product_title']; ?>">
                                                    <img src="<?php echo $productlist['product_image_link']?>" class="img-responsive rotate-image" alt="<?php echo $productlist['product_title']; ?>">
                                                </div>
                                            </a>
                                            <div class="shop-item-title clearfix">
                                                <h4><a href="single-product.php?product_id=<?php echo $productlist['product_id']; ?>"><?php echo $productlist['product_title']?></a></h4>
                                                <div class="shopmeta clearfix">
                                                    <span><i class="fa fa-rupee"></i><?php echo $productlist['product_selling_price']?> <strike> <i class="fa fa-inr" aria-hidden="true"></i> <?php echo $productlist['product_mrp']?></strike></span>
                                                    <?php
    											if(isset($_SESSION['skinbae_user'])){
    											?>

                                                        <?php
    											}
    											else{
    											?>

                                                            <?php
    											}
    										?>
                                                </div>
                                                <!-- end shop-meta -->
                                            </div>
                                            <!-- end shop-item-title -->
                                </div>
                                <!-- entry -->
                            </div>
                            <!-- end relative -->
                        </div>
                        <!-- end col -->

                        <?php
    					}
    				}
                    else
                    {
                        echo 'here';
                    }
			    ?>

            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>

    <?php require_once("includes/footer.php");?>
        </body>

        </html>