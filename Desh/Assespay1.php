<?php
	//require_once("access_officer.php");
	require('connect_database.php');
		//$id = $_GET['link'];
		$id=$_POST['id'];
		$query= "select * FROM assesment_tax_detail WHERE id= '$id'";
		$detail = mysqli_fetch_array(database_query($query));
		$query_bill = "select * FROM assesment_tax_bills WHERE id= '$id'";
		$detail_bill = mysqli_fetch_array(database_query($query_bill));
		$arrears = $detail['arrears'];
		$date=$detail_bill['date_time'];
		$amount = $detail_bill['payement'];
		$bill_no = $detail_bill['bill_no'];
		if($detail['arrears']==0){		
			if(($amount>= $detail['annual_tax']) && (date("m",strtotime($date))<=1 && date("d",strtotime($date))== 10))
			{
				$discount = 0.1*$detail['annual_tax'];
			}
			elseif ($amount>= ($detail['annual_tax']/4))
			{
			}if ((date("d",strtotime($date))&& (date("m",strtotime($date))==1)) || (date("d",strtotime($date))&& date("m",strtotime($date))) || (date("d",strtotime($date))&& date("m",strtotime($date))) || (date("d",strtotime($date))&& date("m",strtotime($date))))
				{
					$discount = 0.05*$detail['annual_tax'];
				} 
			}
			else
			{
			$discount = 0;
			}
	if(isset($_POST['print'])){
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
<div id= "detail">
	
<form action="Assespay1.php" method="post" id="APayForm2" >
<table align="center">
    <tr> <td>
    <label for="owner_name"> Owner Name </label>
        </td><td> 
    <input readonly="readonly" type="text" id="ownername" name="ownername" value="<?=$detail['owner_name'] ?>" /> <br />
        </td></tr>
        <tr> <td>
    <label for="id"> ID </label> 
        </td><td>
    <input readonly="readonly" type="text" id="id" name="id" value="<?=$detail['id']; ?>"/> <br />
        </td></tr>
        <tr> <td>
    <label for="address"> Address </label> 
        </td><td>
    <input readonly="readonly" type="text" id="address" name="address" value="<?=$detail['address'] ?>"/> <br/>
        </td></tr>
        <tr> <td>
    <label for="arrears"> Arrears </label> 
        </td><td>
    <input readonly="readonly" type="number" id="arrears" name="arrears" value="<?= $detail['arrears'] ?>" /> <br/>
        </td></tr>
        <tr> <td>
    <label for="amount"> Paid Amount </label> 
        </td><td>
    <input readonly="readonly" type="text"  id="amount" name="amount"  value="<?= $amount?>"/> <br/>
        </td></tr>
        <tr> <td>
    <label for="discount"> Discount </label> 
        </td><td>
    <input readonly="readonly" type="text" id="discount" name="discount" value= "<?= $discount?>" /> <br />
        </td></tr>
         <tr> <td>
	<label for="bill_no"> Bill_No: </label> 
		</td><td>
	<input readonly="readonly" type="text" id="bill_no" name="bill_no" value="<?= $bill_no ?>"/> <br/>
		</td></tr>
    	<tr><td>
    <button type="submit"  name="print" > Print </button>
    	</td></tr>
</table>
</form>
</div>
</div>
</div>
<div id="footer"></div>
</div>
</body>
</html>