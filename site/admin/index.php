<?php
include "./includes/application_top.php";
include "./includes/admin_login_check.php";

$active_link_orders="active";


$max_results = MAX_RESULTS_PER_PAGE; // Define the number of results per page
$next_style = ' <span aria-hidden="true">&raquo;</span>'; // The look for the next button
$pre_style = '<span aria-hidden="true">&laquo;</span> ';//The look for the previous button
$extra_var ='';	//end with & if used. this is the variable you will pass if required.
//WARNING do not modify the $httpvar.
$httpvar = $extra_var.'page';
$post_nav='';
$nav_title='Pages Available';
// Style.inc definitions
$table="orderdetail WHERE 2<3";
 
$fields="*";  // please separate by commas if you use multiple fields
// mysql query to be performed
$query_list = "SELECT $fields FROM $table ORDER BY id DESC";
//echo $query_list;
if(!isset($_GET['page']))
{
	$page = 1;
}
else 
{
	$page = $_GET['page'];
}

//Calclate the offsets
$from = (($page * $max_results) - $max_results);
$result = $db->query("$query_list LIMIT $from, $max_results");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../img/favicon.ico">

    <title>Orders :: <?php echo $site_title; ?></title>

    <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="./css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./css/navbar-fixed-top.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="./js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	<script language="javascript" src="./js/functions.js"></script>
	
</head>

<body>

    <!-- Fixed navbar -->
    <?php include "includes/nav_header.php"; ?>

    <div class="container">

    <?php include "includes/session_fail_success_msg.php";?>

		<?php
		if($result->num_rows >0)
		{
		?>
		<div class="bs-example" data-example-id="table-within-panel">
            <div class="panel panel-default">
                
				
				
				<div class="panel-heading">Orders</div>
				
				
                <!-- div class="panel-body">
                    <a href="product_add.php" class="btn btn-primary">Add Product</a>					
                </div-->
				
                <table class="table">
                    <thead>
                        <tr>                            
                            <th>#</th>
							<th>Order ID</th>
							<th>Name</th>
							<th>Email</th>
                            <th>Product</th>
							
							<th>Sleeves / Collar</th>
							<th>Price</th>
							<th>Order Date</th>
							<th>Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
						$i=0;
						while($row=$result->fetch_assoc())
						{
							$queryUD = "SELECT * FROM userdetail WHERE id = '".$row['userid']."'";
							$resultUD = $db->query($queryUD) or die(mysqli_error($db));
							$rowUD = $resultUD->fetch_assoc();
							
							$queryPD = "SELECT * FROM products WHERE product_id = '".$row['product_id']."'";
							$resultPD = $db->query($queryPD) or die(mysqli_error($db));
							$rowPD = $resultPD->fetch_assoc();
							
							/*
							$queryRD = "SELECT region_name,region_auto_login_link FROM tbl_regions WHERE region_id = '".$rowPD['region_id']."'";
							$resultRD = $db->query($queryRD) or die(mysqli_error($db));
							$rowRD = $resultRD->fetch_assoc();
							*/
							
							$page_num   =   (int) (!isset($_GET['page']) ? 1 : $_GET['page']);
							$start_num =((($page_num*MAX_RESULTS_PER_PAGE)-MAX_RESULTS_PER_PAGE)+1);
							$slNo = $i+$start_num;
							
							$pID = $row['id'];
					  ?>
						<tr>                            
                            <td><?php echo $slNo; ?></td>
							<td><?php echo generate_order_id($row['id']); ?></td>
							<td><?php echo stripslashes($rowUD['name']); ?></td>
							<td><?php echo stripslashes($rowUD['email']); ?></td>
                            <td><?php echo stripslashes($rowPD['title']); ?></td>
							
							<td><?php echo stripslashes($row['sleeves']); ?> / <?php echo stripslashes($row['collar']); ?></td>		
							<td>$<?php echo stripslashes($row['order_price']); ?></td>
							<td><?php echo dt_format($row['created']); ?></td>
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
						
						<?php
						$i++;
						} //end while($row=mysql_fetch_assoc($result))
					  ?>
                        
                    </tbody>
                </table>
				
				<?php
				// Calculate the total number of results.
				$total_res = $db->query("SELECT COUNT($fields) as Num FROM $table $cond $search_condition ");
				$total_results = $total_res->num_rows;
                $total_pages = ceil($total_results / $max_results);
				?>
				
				<nav aria-label="Page navigation">
				  <ul class="pagination pull-right">
				  
					<?php
					// Create the Previous link.
					if($page > 1)
					{
						$prev = ($page - 1);
						echo "<li><a aria-label='Previous' href=\"".$_SERVER['PHP_SELF']."?sort=$sort_page"."&$httpvar=$prev\">".$pre_style."</a></li>";
					}
					
					//Creat the navigation page numbers.
					for($i = 1; $i <= $total_pages; $i++){
						if(($page) == $i){ // make sure the link is not given to the page being viewed
							echo "<li><a href='#'><b>".$i."</b></a></li>";
						} else {
							echo "<li><a href=\"".$_SERVER['PHP_SELF']."?sort=$sort_page"."&$httpvar=$i\">".$i."</a></li>";
						}
					}
					
					// Create the next link.
					if($page < $total_pages)
					{
						$next = ($page + 1);
						echo "<li><a aria-label='Next' href=\"".$_SERVER['PHP_SELF']."?sort=$sort_page"."&$httpvar=$next\">".$next_style."</a></li>";						
					}
					?>
					
				  </ul>
				</nav>
				
				
            </div>
        </div>
		<?php
			} //if(mysql_num_rows($result) >0)
			else
			{
				$_SESSION['session_msg_fail'] = "Sorry, no orders found.";
				include "includes/session_fail_success_msg.php";
			}
		  ?>
		
		

    </div>
    <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	
    <script src="./js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="./js/ie10-viewport-bug-workaround.js"></script>
</body>

</html>