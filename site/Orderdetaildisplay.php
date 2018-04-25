
<?php if (!isset($_SESSION['name'])) {
 	header("location:?Page=Login");
 } ?> 
 <?php 
 	$email = $_SESSION['email'];
	$userid = $_SESSION['current_user_id'];
	
 	$sql = "SELECT *  FROM orderdetail where userid = '$userid' AND email = '$email' ";
	$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
   
    $count =1;
   
?>
<div class="banner-top">
	<div class="container">
		<h1>Order</h1>
		<em></em>
		<h2><a href="?Page=Home">Home</a><label>/</label>Order detail</h2>
	</div>
</div>

<div class="container">
  <br>
  <table class="table">
    <thead>
      <tr>
        <th>Order Number</th>
        <th>Sleeves</th>
        <th>Collar</th>
        <th>Color</th>
        <th>Chest Size</th>
        <th>Additional Note</th>
		<th>Order Price</th>
		<th>Order Date</th>
		<th>Details</th>
      </tr>
    </thead>
    <tbody>
    	<?php 
    		 while($row = mysqli_fetch_assoc($result)) {
				 
				$queryUD = "SELECT * FROM userdetail WHERE id = '".$row['userid']."'";
				$resultUD = $db->query($queryUD) or die(mysqli_error($db));
				$rowUD = $resultUD->fetch_assoc();
				
				$queryPD = "SELECT * FROM products WHERE product_id = '".$row['product_id']."'";
				$resultPD = $db->query($queryPD) or die(mysqli_error($db));
				$rowPD = $resultPD->fetch_assoc();
				 
				$pID = $row['id'];
      ?>
      <tr>
        <td> <?php echo generate_order_id($row['id']);  ?> </td>
        <td><?php echo $row['sleeves']; ?></td>
        <td><?php echo $row['collar']; ?></td>
        <td><?php //echo $row['color']; ?><div style="display: inline-block;width: 20px;height: 20px;left: 5px; top: 5px;border: 1px solid rgba(0, 0, 0, .2);background: <?php echo $row['color']; ?>;"></div></td>
        <td><?php echo $row['chest']; ?> </td>
        <td><?php echo $row['anote']; ?> </td>
		<td>$<?php echo $row['order_price']; ?> </td>
		<td><?php echo dt_format($row['created']); ?> </td>
		<td>
							<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal_<?php echo $pID; ?>">View Details</button>
							
							
							<!-- Modal -->
							<div id="myModal_<?php echo $pID; ?>" class="modal fade" role="dialog">
							  <div class="modal-dialog">

								<!-- Modal content-->
								<div class="modal-content">
								  <div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">Order Details (<?php echo stripslashes($rowPD['title']); ?>)</h4>
								  </div>
								  <div class="modal-body">
									<p>									
									<div class="form-group">
										<b>Order ID</b>: <?php echo generate_order_id($row['id']); ?>
									</div>
									<div class="form-group">
										<b>Name</b>: <?php echo stripslashes($rowUD['name']); ?>
									</div>
									<div class="form-group">
										<b>Email</b>: <?php echo stripslashes($rowUD['email']); ?>
									</div>
									<div class="form-group">
										<b>Product</b>: <?php echo stripslashes($rowPD['title']); ?>
									</div>
									<div class="form-group">
										<b>Sleeves</b>: <?php echo stripslashes($row['sleeves']); ?>
									</div>
									<div class="form-group">
										<b>Collar</b>: <?php echo stripslashes($row['collar']); ?>
									</div>
									<div class="form-group">
										<b>Color</b>: <?php //echo stripslashes($row['color']); ?>
										<div style="display: inline-block;width: 20px;height: 20px;left: 5px; top: 5px;border: 1px solid rgba(0, 0, 0, .2);background: <?php echo $row['color']; ?>;"></div>
									</div>									
									<div class="form-group">
										<b>Chest</b>: <?php echo stripslashes($row['chest']); ?>
									</div>									
									<div class="form-group">
										<b>Neck</b>: <?php echo stripslashes($row['neck']); ?>
									</div>
									
									<div class="form-group">
										<b>Waist</b>: <?php echo stripslashes($row['waist']); ?>
									</div>
									<div class="form-group">
										<b>Sleeves Dimension</b>: <?php echo stripslashes($row['sleeves_dimension']); ?>
									</div>
									
									<div class="form-group">
										<b>Body Shape</b>: <?php echo stripslashes($row['body_shape']); ?>
									</div>
									
									<div class="form-group">
										<b>Order Price</b>: $<?php echo stripslashes($row['order_price']); ?>
									</div>
									<div class="form-group">
										<b>Order Date</b>: <?php echo dt_format($row['created']); ?>
									</div>
									<div class="form-group">
										<b>Additional Note</b>: <?php echo stripslashes($row['anote']); ?>
									</div>
									
									</p>
								  </div>
								  <div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								  </div>
								</div>

							  </div>
							</div>
							<!-- Modal -->
							
							
							
							</td>
      </tr>
      <?php $count++; } 
      ?>
    </tbody>
  </table>
  <?php } else {
      echo "You don't have any order";
    }
    mysqli_close($conn); 
  ?>
</div>
