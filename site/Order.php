
<div class="banner-top">
	<div class="container">
		<h1>Order</h1>
		<em></em>
		<h2><a href="?Page=Home">Home</a><label>/</label>Order Summary</h2>
	</div>
</div>
<br>
<?php
	
	$sqlProduct = "SELECT * FROM products WHERE product_id='1' ";
	$resultProduct = mysqli_query($conn, $sqlProduct);
	$rowProduct = mysqli_fetch_assoc($resultProduct);
	
	if (isset($_SESSION['name'])) {

		$collar = $_GET['collar'];
		$seleeve = $_GET['seleeve'];
		$color = $_GET['color'];
        //$chestSize = $_GET['chest'];
        $anote = $_GET['anote'];

        if ($collar == 0) {
            $collara =  "Traditional Button Down";
        } elseif ($collar == 1) {
            $collara =  "Parisian Cutaway";
        }elseif ($collar == 2) {
            $collara =  "Parisian Button Down";
        }

        if ($seleeve == 0) {
            $seleevea = "Full";
        }
        elseif ($seleeve == 1) {
            $seleevea = "Half";
        }
		
	?>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <h4 class="text-center">
                            Your Order</h4>
                    </div>
                    <div class="panel-body text-center">
                        <p class="lead">
                            <strong>Shirt</strong>
                        </p>
                    </div>
                    <ul class="list-group list-group-flush text-center">
                        <li class="list-group-item"><i class="icon-ok text-danger"></i><?php echo "Price = $".$rowProduct['price'];?></li>
                        <li class="list-group-item"><i class="icon-ok text-danger"></i><?php echo "Collar = ".$collara;?></li>
                        <li class="list-group-item"><i class="icon-ok text-danger"></i><?php echo "Sleeves = ".$seleevea;?></li>
                        <li class="list-group-item"><i class="icon-ok text-danger"></i><?php echo "Color"; ?>
						<div style="display: inline-block;width: 20px;height: 20px;left: 5px; top: 5px;border: 1px solid rgba(0, 0, 0, .2);background: <?php echo $color; ?>;"></div>
						</li>
                        <li class="list-group-item"><i class="icon-ok text-danger"></i><?php echo "Additional Note = ".$anote;?></li>
                    </ul>
                    <!-- div class="panel-footer">
                        <a class="btn btn-lg btn-block btn-danger" href="?Page=Ordersubmit&collar=<?php echo $collar;?>&sleeves=<?php echo $seleeve;?>&color=<?php echo urlencode($color);?>&chest=<?php echo $chestSize;?>&anote=<?php echo $anote;?>">BUY NOW!</a>
                    </div -->
                </div>
            </div>

			<div class="col-md-4">
                <form action="?Page=Ordersubmit" method="post">
					<div class="panel panel-success">
						<div class="panel-heading">
							<h4 class="text-center">
								Enter Dimensions</h4>
						</div>
						<div class="panel-body text-center">
							<p class="lead">
								<strong>Shirt</strong>
							</p>
						</div>
						<ul class="list-group list-group-flush text-center">
							
							<li class="list-group-item">
								<select name="chest" id="chest" class="form-control" required>
									<option value="">Chest</option>
									<option value="small">Small</option>
									<option value="medium">Medium</option>
									<option value="Large">Large</option>
									<option value="XLarge">XLarge</option>
								</select>
							</li>
							
							<li class="list-group-item">
								<input class="form-control" type="text" placeholder="Neck" name="neck" id="neck" required>
							</li>
							
							<li class="list-group-item">
								<input class="form-control" type="text" placeholder="Waist" name="waist" id="waist" required>
							</li>
							<li class="list-group-item">
								<input class="form-control" type="text" placeholder="Sleeves" name="sleeves_dimension" id="sleeves_dimension" required>
							</li>
							
							<li class="list-group-item">
								<select name="body_shape" id="body_shape" class="form-control" required>
									<option value="">Body Shape</option>
									<option value="Fit">Fit</option>
									<option value="Average">Average</option>
									<option value="Healthy">Healthy</option>
								</select>
							</li>
						</ul>
						<div class="panel-footer">
							<input class="btn btn-lg btn-block btn-danger" type="submit" name="submit" value="BUY NOW!">
							<!-- a class="btn btn-lg btn-block btn-danger" href="?Page=Ordersubmit&collar=<?php echo $collar;?>&sleeves=<?php echo $seleeve;?>&color=<?php echo urlencode($color);?>&chest=<?php echo $chestSize;?>&anote=<?php echo $anote;?>">BUY NOW!</a -->
							<input type="hidden" name="collar" id="collar" value="<?php echo $collar;?>" />
							<input type="hidden" name="sleeves" id="sleeves" value="<?php echo $seleeve;?>" />
							<input type="hidden" name="color" id="color" value="<?php echo $color;?>" />
							<input type="hidden" name="anote" id="anote" value="<?php echo $anote;?>" />
						</div>
					</div>
				</form>
            </div>
			
			<div class="col-md-4">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h4 class="text-center">
                            Guideline</h4>
                    </div>
                    <div class="panel-body text-center">
                        <p class="lead">
                            <strong>Please view this video for more details.</strong>
                        </p>
                    </div>
                    
                    <div class="panel-footer">                       
						
						<button type="button" class="btn btn-lg btn-block btn-danger" data-toggle="modal" data-target="#myModal_youtube">Video</button>
						
						<!-- Modal -->
							<div id="myModal_youtube" class="modal fade" role="dialog">
							  <div class="modal-dialog">

								<!-- Modal content-->
								<div class="modal-content">
								  <div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">Guidelines</h4>
								  </div>
								  <div class="modal-body">
									<p>	<iframe id="cartoonVideo" width="560" height="315" src="//www.youtube.com/watch?v=eSaa5_IIqNA4" frameborder="0" allowfullscreen></iframe>
									
									</p>
								  </div>
								  <div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								  </div>
								</div>

							  </div>
							</div>
							<!-- Modal -->
						
                    </div>
                </div>
            </div>
			
        </div>
    </div>
    <?php
	}
	else
	{
		header("Location:?Page=Login");
	}
?>

