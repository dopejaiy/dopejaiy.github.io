<!--banner-->
<div id="first-slider">
    <div id="carousel-example-generic" class="carousel slide carousel-fade">
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        </ol>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <div class="carousel-inner" role="listbox">
            
            <div class="item active slide1" style="background-image:url(build/img/slider1.jpg)">
                <div class="row">
                    <div class="container">
                      <div class="col-md-6 text-right"></div>
                      <div class="col-md-6 text-left">
                          <h3 data-animation="animated bounceInDown">Buy Stuff...</h3>
                          <h4 data-animation="animated bounceInUp">Hand Made Stuff That Lasts</h4>             
                      </div>
                    </div>
                </div>
             </div> 
             <div class="item slide2" style="background-image:url(build/img/slider1.jpg)">
                <div class="row">
                    <div class="container">
                      <div class="col-md-6 text-right"></div>
                      <div class="col-md-6 text-left">
                          <h3 data-animation="animated bounceInDown">Buy Stuff...</h3>
                          <h4 data-animation="animated bounceInUp">Hand Made Stuff That Lasts</h4>             
                      </div>
                    </div>
                </div>
             </div> 
    
        </div>
        <!-- End Wrapper for slides-->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <i class="fa fa-angle-left"></i><span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <i class="fa fa-angle-right"></i><span class="sr-only">Next</span>
        </a>
    </div>
</div>


<?php 
    error_reporting(0); 
    if ($_GET["ordersuccess"])
    {
      $message = "Your order successfully placed";
      echo "<script type='text/javascript'>alert('$message');</script>";
    }
?>

<div class="content">
  <div class="container">
			<div class="content-mid">
				<h3>Trending Items</h3>
				<label class="line"></label>
				<div class="mid-popular">

					<?php
					for($i=0;$i<8;$i++)
					{
					?>
					<div class="col-md-3 item-grid simpleCart_shelfItem">
						<div class=" mid-pop">
							<div class="pro-img">
							<img src="img/red/1-1.png" class="img-responsive" alt="">
							<div class="zoom-icon ">
								<a href="?Page=Detail"><i class="fas fa-shopping-cart icon"></i></a>
							</div>
							</div>
								<div class="mid-1">
									<div class="itm">
										<div class="itm-top">
										<span><a href="index.php?Page=Detail">Shirt</a></span>
										<h6><a href="?Page=Detail">Godavari</a></h6>
										</div>
										<div class="clearfix"></div>
									</div>
									<div class="mid-2">
										<p><label>£100</label><em class="item_price normaly-price">£45</em></p>
										<div class="clearfix"></div>
									</div>
								</div>
						</div>
					</div>
					<?php
					} 
					?>
          
        </div>            
      </div>
    </div>
</div>





