<?php  
session_start();

include "../database/config.php";

if (isset($_GET["branchID"])) {
	$id = $_GET["branchID"];
	#mysqli_query($connection, "DELETE FROM Bill_Detail WHERE bill_detail_id = '$id' ");
	#$query_bill_detail = mysqli_query($connection,"SELECT * FROM Bill_Detail , Product
			  		#WHERE Bill_Detail.bill_detail_id = $id AND Product.product_id = Bill_Detail.item_id");
			  	#if (mysqli_num_rows($query_bill_detail) > 0) { 
    				#while ($row=mysqli_fetch_array($query_bill_detail)) {
    					#$_SESSION['sub_total'] -= ($row['qty'] * $row['product_price']);
    				#}
    			#}
	#echo $_SESSION['sub_total'];
	mysqli_query($connection, "DELETE FROM branch WHERE branchID = '$id' ");
	header("location:../admin_branch.php?open");

}

?>
