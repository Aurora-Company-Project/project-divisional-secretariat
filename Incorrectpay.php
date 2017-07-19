<?php
	require_once("access_officer.php");
	require('connect_database.php');
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="CSS/LayoutHome.css" rel="stylesheet" type="text/css" />
<link href="CSS/Menu.css" rel="stylesheet" type="text/css" />
<link href="CSS/Incorrect.css" rel="stylesheet" type="text/css" />
<title>Home</title>
</head>
<body>
<div id="Holder">
<div id="Header"> </div>
<div id="NavBar"> 
	<nav>
		<ul>
			<li> <a href="AccountOfficer.php? <?php echo SID;?>"> Home </a></li>
			<li class="DropDwnElmnt"> <a href="#"> Tax Payments </a> 
            	<div class="DropDwnCntnt">
                <ul class="DrpLst">
            		<li> <a href="OfficerSearchShopRentalPayer.php? <?php echo SID;?>"> Assesment Tax </a> </li>
                	<li> <a href="OfficerSearchAssesmentTaxPayer.php? <?php echo SID;?>"> Shop Rental </a> </li>
                    <li> <a href="Incorrectpay.php? <?php echo SID;?>"> False Payements </a> </li>
                </ul>
                </div>
            </li>
			<li class="DropDwnElmnt"> <a href="#"> Reports </a>  
            <div class="DropDwnCntnt">
            <ul class="DrpLst">
            	<li class="DropDwnElmnt"> <a href="#"> Assesment Tax <span> </span></a> 
                <div class="submenu">
            	<ul class="DrpLst">
            		<li> <a href="DailyReportTaxOfficer.php? <?php echo SID;?>"> Daily Report </a> </li>
                	<li> <a href="MonthlyReportTaxOfficer.php? <?php echo SID;?>"> Monthly Report </a> </li>
                    <li> <a href="QuarterReportOfficer.php? <?php echo SID;?>"> Quartar Report </a> </li>
                    <li> <a href="TaxCustomReportOfficer.php? <?php echo SID;?>"> Tax Payer Report </a> </li>
            	</ul>
                </div>
                </li>
                <li class="DropDwnElmnt"> <a href="#"> Shop Rental <span> </span></a>
                <div class="submenu">
            	<ul class="DrpLst">
            		<li> <a href="MonthlyReportRentalOfficer.php? <?php echo SID;?>"> Monthly Report </a> </li>
                	<li> <a href="RentalCustomReportOfficer.php? <?php echo SID;?>"> Rental Payer Report </a> </li>	
            	</ul>
                </div>
                </li>
            </ul>
            </div> 
            </li>
            <li class="DropDwnElmnt"> <a href="OfficerViewPolicies.php? <?php echo SID; ?>"> View Policies </a></li>
           	<li class="DropDwnElmnt"> <a href="#"> Account </a> 
            <div class="DropDwnCntnt">
            <ul class="DrpLst">
            	<li> <a href="#"> Edit Account </a> </li>
                <li> <a href="LogOut.php? <?php echo SID; ?>"> Logout </a> </li>
            </ul>
            </div>
            </li>
		</ul>
	</nav>
</div>
<div id="Content"> 
<div id="PageHeading">
</div>
<div id="Notifications">
<div id = "detail">
<form action="Incorrectpay.php" method="post" id="PayForm" name="PayForm">
<br />
<table  id="tb" align="center">
<caption>Cancel Payments</caption>
	<tr> <td>
<label for="bill"> Bill_No: </label>
	</td><td> 
<input  required="required" type="text" id="bill" name="bill_no" value=""  /> <br/>
	</td></tr>

	<tr><td>
<button type="submit" form="PayForm" name="searchrent" > Search Rental Payers </button>
	</td><td>
<button type="submit" form="PayForm" name="searchtax" > Search Tax Payers </button>
	</td></tr> 
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    
</table>
</form>
<?php
if (isset($_POST['searchtax'])){
	
	$bill_no=$_POST['bill_no'];
	
	$query_bill= "SELECT * FROM assesment_tax_bills WHERE bill_no= $bill_no";
	
	if($row_bill=mysqli_fetch_array(database_query($query_bill)))
		{
			echo '<table name="display" border="2" id="phptb">';
            echo ' <tr>';
            echo  '<th>Id</th>';
            echo  '<th>Payment</th>';
            echo  '<th>Bill_No</th>';
            echo  '<th>State</th>';
            echo  '</tr>';
			echo  '<tr>';
			echo  "<td>{$row_bill['id']}</td>";
			echo  "<td>{$row_bill['payement']}</td>";
			echo  "<td>{$row_bill['bill_no']}</td>";
			echo  "<td>{$row_bill['bill_state']}</td>";
			//$bill_no =$row_bill['bill_no'];
			$id=$row_bill['id'];
			$paid= $row_bill['payement'];	
					
            echo '</tr>';
		 	
			
			$row=mysqli_fetch_array(database_query("SELECT * FROM assesment_tax_detail WHERE id='$id'"));
			$arrears= $row['arrears'];
			$new_arrears= $arrears+ $paid;
			
			$query_update= "UPDATE assesment_tax_detail SET arrears='$new_arrears' WHERE id='$id'";
			database_query($query_update);
			$query_state= "UPDATE assesment_tax_bills SET bill_state='Cancel' WHERE bill_no='$bill_no'";
			database_query($query_state);
			$msg= "your payment is canceled.";
			echo '</table>';
		} 
		else 
		{
			echo "NO bill has been issued within that number" ;
		}
		
}
            
if (isset($_POST['searchrent'])){
	
	$bill_no=$_POST['bill_no'];
	echo $bill_no;
	$query_bill= "SELECT * FROM shop_rental_bills WHERE bill_no= '$bill_no'";
	if($row_bill=mysqli_fetch_array($query_bill))
		{
			echo '<table name="display" border="2" id="phptb">';
            echo ' <tr>';
            echo  '<th>Id</th>';
            echo  '<th>Payment</th>';
            echo  '<th>Bill_No</th>';
            echo  '<th>State</th>';
            echo  '</tr>';
			echo  '<tr>';
			echo  "<td>{$row_bill['id']}</td>";
			echo  "<td>{$row_bill['payement']}</td>";
			echo  "<td>{$row_bill['bill_no']}</td>";
			echo  "<td>{$row_bill['bill_state']}</td>";
			$bill_no =$row_bill['bill_no'];
			$id=$row_bill['id'];
			$paid= $row_bill['payement'];	
			echo $id;		
            echo '</tr>';
		 	
			
			$row=mysqli_fetch_array(database_query("SELECT * FROM shop_rental_detail WHERE id='$id'"));
			$arrears= $row['arrears'];
			$new_arrears= $arrears+ $paid;
			
			$query_update= "UPDATE shop_rental_detail set arrears='$new_arrears' WHERE id='$id'";
			database_query($query_update);
			$query_state= "UPDATE shop_rental_bills set bill_state='Cancel' WHERE bill_no='$bill_no'";
			database_query($query_state);
			$message = "your payment is canceled.\n"; 			
			echo '</table>';
		
	}
}
?>     
		          
</div>
</div>
</div>
<div id="footer"></div>
</div>
</body>
</html>