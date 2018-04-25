<?php
include "./includes/application_top.php";
include "./includes/admin_login_check.php";

$active_link_products="active";

// delete product
if(isset($_GET['del']) && !empty($_GET['product_id']))
{
	$query_delete = "DELETE FROM tbl_products WHERE product_id ='".$_GET['product_id']."'";
	$result_delete = $db->query($query_delete) or die(mysqli_error);
	
	if($result_delete) 
	{
		$_SESSION['session_msg_success'] = "Product Deleted Successfully !!";
		header('Location: index.php');
		exit;
	}
}


$max_results = MAX_RESULTS_PER_PAGE; // Define the number of results per page
$next_style = ' <span aria-hidden="true">&raquo;</span>'; // The look for the next button
$pre_style = '<span aria-hidden="true">&laquo;</span> ';//The look for the previous button
$extra_var ='';	//end with & if used. this is the variable you will pass if required.
//WARNING do not modify the $httpvar.
$httpvar = $extra_var.'page';
$post_nav='';
$nav_title='Pages Available';
// Style.inc definitions
$table="tbl_products WHERE status = '1' AND sold_status = '0' AND expiry_date>'".date("Y-m-d H:i:s")."'";
 
$fields="*";  // please separate by commas if you use multiple fields
// mysql query to be performed
$query_list = "SELECT $fields FROM $table ORDER BY product_id DESC";
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
    <link rel="icon" href="../favicon.ico">

    <title>Products :: <?php echo $site_title; ?></title>

    <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/navbar-fixed-top.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	<script language="javascript" src="../js/functions.js"></script>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

	<script type="text/javascript" src="../js/jQuery.countdownTimer.js"></script>
	
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
                
				
				
				<div class="panel-heading">Active Products</div>
				
				
                <div class="panel-body">
                    <a href="product_add.php" class="btn btn-primary">Add Product</a>					
                </div>
				
                <table class="table">
                    <thead>
                        <tr>                            
                            <th>#</th>
							<th>Title</th>
							<th>Region</th>
							<th>Shoe Size</th>
                            <th>Email / Password</th>                            
							
							<th>Auto Login Link</th>
							<th>Time Left</th>
							<th>Price</th>
							<th>Created</th>
							<th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
						$i=0;
						while($row=$result->fetch_assoc())
						{
							$queryRD = "SELECT region_name,region_auto_login_link FROM tbl_regions WHERE region_id = '".$row['region_id']."'";
							$resultRD = $db->query($queryRD) or die(mysqli_error($db));
							$rowRD = $resultRD->fetch_assoc();
							
							$page_num   =   (int) (!isset($_GET['page']) ? 1 : $_GET['page']);
							$start_num =((($page_num*MAX_RESULTS_PER_PAGE)-MAX_RESULTS_PER_PAGE)+1);
							$slNo = $i+$start_num;
							
							$pID = $row['product_id'];
							
							/// new
							$date1 = date("Y-m-d H:i:s");
							$date2 = $row["expiry_date"]; 

							$diff = abs(strtotime($date2) - strtotime($date1));				

							$years   = floor($diff / (365*60*60*24)); 
							$months  = floor(($diff - $years * 365*60*60*24) / (30*60*60*24)); 
							$days    = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
							$hours   = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24)/ (60*60)); 

							$minuts  = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60)/ 60);
							$seconds = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60 - $minuts*60));
							
					  ?>
						<tr>                            
                            <td><?php echo $slNo; ?></td>
							<td><?php echo stripslashes($row['product_title']); ?></td>
							<td><?php echo stripslashes($rowRD['region_name']); ?></td>
							<td><?php echo stripslashes($row['shoe_size']); ?></td>
                            <td><?php echo stripslashes($row['email']); ?> / <?php echo stripslashes($row['password']); ?></td>
                            
							
							<td>
							<?php echo stripslashes($row['auto_login_link']); ?>
							<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal_<?php echo stripslashes($row['product_id']); ?>">View Link</button>
							
							
							<!-- Modal -->
							<div id="myModal_<?php echo stripslashes($row['product_id']); ?>" class="modal fade" role="dialog">
							  <div class="modal-dialog">

								<!-- Modal content-->
								<div class="modal-content">
								  <div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">Auto Login Link (<?php echo stripslashes($row['product_title']); ?>)</h4>
								  </div>
								  <div class="modal-body">
									<p>
									<?php
										$emailPArr = array(stripslashes($row['email']),stripslashes($row['password']));
										$autoLink = str_replace($autoLoginVars,$emailPArr,stripslashes($rowRD['region_auto_login_link']));
										//echo $autoLink;
									?>
									<div class="form-group">
										<textarea class="form-control" id="region_auto_login_link" name="region_auto_login_link" rows="7"><?php echo $autoLink; ?></textarea>
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
							
							
							
							<td><span id="ms_timer_<?php echo $pID; ?>"></td>
							<script>
								$(function(){
									$('#ms_timer_<?php echo $pID; ?>').countdowntimer({
										minutes :<?php echo $minuts; ?>,
										seconds :<?php echo $seconds; ?>,
										size : "lg",
										displayFormat: "MS",
										timeUp: timeIsUp_<?php echo $pID; ?>
									});
								});
								
								function timeIsUp_<?php echo $pID; ?>() {
									//alert(<?php echo $row['product_id']; ?>);
									$.ajax({
									  url: "ajax_product_action.php?product_action=1&expire_p=yes&product_id=<?php echo stripslashes($pID); ?>&encpidofproduct=<?php echo md5($pID+112); ?>",
									  cache: false,
									  success: function(){
										//alert('fffffffffffffffff');
										$("#ms_timer_<?php echo $pID; ?>").html('<span class="label label-danger">Expired</span>');
										$("#purchase_<?php echo $pID; ?>").css("display", "none");
										
									  }
									});
									
								}
							</script>
							
							
							
							<td>£<?php echo stripslashes($row['price']); ?></td>
							<td><?php echo dt_format($row['created'],'date_time_seconds'); ?></td>
							<td>
								<a href="product_edit.php?product_id=<?php echo $row["product_id"]; ?>">Edit</a> | 
								<a href='<?php echo $PHP_SELF; ?>?product_id=<?php echo $row["product_id"]; ?>&amp;del=1' onclick="javascript:return display_message('delete this Product');" alt="Delete" title="Delete">Delete</a>
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
				$_SESSION['session_msg_fail'] = "Sorry, no product found.";
				include "includes/session_fail_success_msg.php";
				
				echo '<div class="panel-body">
                    <a href="product_add.php" class="btn btn-primary">Add Product</a>					
                </div>';
			}
		  ?>
		

    </div>
    <!-- /container -->
    
	
    <script src="../js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../js/ie10-viewport-bug-workaround.js"></script>
</body>

</html>