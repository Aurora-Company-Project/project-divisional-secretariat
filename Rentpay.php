<?php
	//require_once("access_officer.php");
		//$id = $_GET['link'];
		$id=1;
		require_once('connect_database.php');
		$query= "select * FROM shop_rental_detail WHERE id= $id";
		$detail = mysqli_fetch_array(database_query($query));
		$current_bill="SELECT COUNT(*) FROM rental_tax_bills";
		$bill_no = $current_bill+1;
		$tot_arrears=$detail['arrears']+$detail['fines']; 
		 
		if(isset($_POST['submit']))
		{
			if(is_numeric($_POST['amount']))
			{
				$payment=$_POST['amount'];
				$id=$_POST['id'];
				$date_time=date('m/d/Y');
				$bill_no=$_POST['bill_no'];			
				$query_submit = "INSERT INTO shop_rental_bills set (bill_no , id , date_time , payment) VALUES ('$payment','$id','$date_time','$bill_no')" ;						
				database_query($query_submit);
				
				
				
				$query_bill="select * FROM rental_tax_bills WHERE id= '$id'";
				$detail_bill = mysqli_fetch_array(database_query($query_bill));
				$paid=$detail_bill['payment'];
				if($tot_arrears>=$paid){
					$new_arrears=$tot_arrears>-$paid;				
					}
				else{
					$new_arrears=0;									
					}
				$query_update= "UADATE shop_rental_detail set arrears='$new_arrears' WHERE id='$id'";
				database_query($query_update);
				
				header("Location: Rentpay2.php");
			}
			else
			{
				$message="No bill has been issued within that number";
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
            		<li> <a href="#"> Assesment Tax </a> </li>
                	<li> <a href="#"> Shop Tax </a> </li>
                </ul>
                </div>
            </li>
			<li class="DropDwnElmnt"> <a href="#"> Reports </a>  
            <div class="DropDwnCntnt">
            <ul class="DrpLst">
            	<li class="DropDwnElmnt"> <a href="#"> Assesment Tax <span> </span></a> 
                <div class="submenu">
            	<ul class="DrpLst">
            		<li> <a href="#"> Daily Report </a> </li>
                	<li> <a href="#"> Quartar Report </a> </li>
                    <li> <a href="#"> Tax Payer Report </a> </li>
            	</ul>
                </div>
                </li>
                <li class="DropDwnElmnt"> <a href="#"> Shop Rental <span> </span></a>
                <div class="submenu">
            	<ul class="DrpLst">
            		<li> <a href="#"> Monthly Report </a> </li>
                	<li> <a href="#"> Rental Payer Report </a> </li>	
            	</ul>
                </div>
                </li>
            </ul>
            </div> 
            </li>
            <li class="DropDwnElmnt"> <a href="ViewPolicies.php? <?php echo SID; ?>"> View Policies </a></li>
           	<li class="DropDwnElmnt"> <a href="#"> Account </a> 
            <div class="DropDwnCntnt">
            <ul class="DrpLst">
            	<li> <a href="#"> Edit Account </a> </li>
                <li> <a href="#"> Logout </a> </li>
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
<form action="Rentpay1.php" method="post" id="RPayForm">
<table > 
	<tr> <td>
<label for="owner_name"> Owner Name </label>
	</td><td> 
<input type="text" id="ownername" name="ownername" value="<?= $detail['owner_name'] ?>" /> <br />
	</td></tr>
    <tr> <td>
<label for="arrears"> Arrears </label> 
	</td><td>
<input type="number" id="arrears" name="arrears" value="<?= $detail['arrears'] ?>" /> <br />
	</td></tr>
	<tr> <td>
<label for="fines"> Fines </label> 
	</td><td>
<input type="number" id="fines" name="fines" value="<?= $detail['fines'] ?>" /> <br />
	</td></tr>
	<tr> <td>
<label for="bill_no"> Bill_No: </label> 
	</td><td>
<input type="text" id="bill" name="bill" value="<?= $bill_no ?>"/> <br/>
	</td></tr>
    <tr> <td>
<label for="amount"> Paid Amount </label> 
	</td><td>
<input type="text"  id="amount" name="amount"  value=""/> <br/>
	</td></tr>    
	<tr> <td>
<button type="submit" form="PayForm" name="Paid" > Submit </button>
<button type="submit" form="PayForm" name="close" > Cancel </button>
	</td></tr>
</table>
</form>
</div>

</div>
<div id="footer"></div>
</div>
</body>
</html>