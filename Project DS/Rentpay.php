<?php
	require_once("access_officer.php");
		$id = $_GET['link'];
		
		require_once('connect_database.php');
		$query= "select * FROM shop_rental_detail WHERE id= $id";
		$detail = mysqli_fetch_array(database_query($query));
		
		$tot_arrears=$detail['arrears']+$detail['fines']; 
		
		if(isset($_POST['Paid']))
		{
			if(($_POST['amount'])<0)
			{
				header("Location: OfficerSearchAssesmentTaxPayer.php");
				
				}
			
			elseif(is_numeric($_POST['amount']))
			{
				$payment=$_POST['amount'];				
				$date_time=date('Y-m-d H:i:s');	
				$query_submit = "INSERT INTO shop_rental_bills(customer_id , date_time , payment) VALUES ($id,'$date_time',$payment)" ;						
				database_query($query_submit);				
				
				$query_bill="SELECT * FROM shop_rental_bills WHERE customer_id= $id";
				$detail_bill = mysqli_fetch_array(database_query($query_bill));
				$paid=$detail_bill['payment'];
				$bill_no=$detail_bill['bill_no'];
				
				
				
				
				
				header("Location: Rentpay1.php");
			}
			else
			{
				$message="Enter possible value for amount";
			}
		}
		if(isset($_POST['cancel'])){
			
			header("Location: OfficerSearchAssesmentTaxPayer.php");
		}
		
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="CSS/LayoutHome.css" rel="stylesheet" type="text/css" />
<link href="CSS/Menu.css" rel="stylesheet" type="text/css" />
<link href="CSS/Rentpay.css" rel="stylesheet" type="text/css" />
<title>Home</title>
<style type="text/css">
	table {; alignment-baseline:middle ; position:absolute ;}
	td {width:500 ; height:50 ; border-width: 2 ; alignment-adjust:central ; font-size: 32px ;}
	#button {alignment-adjust:central;}
</style>
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
<div id="Message">
</div>
<div id="Detail">
<form  action="Rentpay1.php" method="post" id="RPayForm">
<table id="tb"> 
<caption>Shop Rental Payment</caption>
	<tr> <td>
<label for="owner_name"> Owner Name </label>
	</td><td> 
<input type="text" id="ownername" name="ownername" value="<?= $detail['owner_name'] ?>" /> <br />
	</td></tr>
    <tr> <td>
<label for="id"> ID </label> 
	</td><td>
<input type="number" id="id" name="id" value="<?= $id ?>" /> <br />
	</td></tr>
    
    <tr> <td>
<label for="bill_no"> Bill_No </label> 
	</td><td>
<input type="number" id="bill_no" name="bill_no" value="<?php if (isset($detail_bill['bill_no'])) echo $detail_bill['bill_no']; ?>" /> <br />
	</td></tr>
	

    <tr> <td>
<label for="amount"> Paid Amount </label> 
	</td><td>
<input type="text"  id="amount" name="amount"  value=""/> <br/>
	</td></tr>    
	<tr> <td>
<button type="submit"  name="Paid" > Submit </button>
<button type="submit"  name="close" > Cancel </button>
	</td></tr>
</table>
</form>
</div>

</div>
<div id="footer"></div>
</div>
</body>
</html>