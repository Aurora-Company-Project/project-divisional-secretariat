<?php
	require_once("access_admin.php");
	include("connect_database.php");
	$message="";
	$id=$_GET['link'];
	$getExistingDetails="SELECT * FROM shop_rental_detail WHERE id='$id'";
	$existingDetails=mysqli_fetch_assoc(database_query($getExistingDetails));
	$shop_address=$existingDetails['shop_address'];
	if (isset($_POST['submit'])) {
		$ownerName=$_POST['owner_name'];
		$ownerAddress=$_POST['owner_address'];
		$tenderValue=$_POST['tender_value'];
		$monthlyRental=$_POST['monthly_rental'];
		if (is_numeric($tenderValue) && is_numeric($monthlyRental) && !(is_numeric($ownerName)) && !(is_numeric($ownerAddress))){
			$updateQuery="UPDATE shop_rental_detail SET owner_name='$ownerName' , owner_address='$ownerAddress' , tender_value='$tenderValue' , monthly_rental='$monthlyRental' WHERE id='$id'";
			database_query($updateQuery);
		}
		else
		{
			$message= "Enter Valid Details";
		}
	}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="CSS/LayoutHome.css" rel="stylesheet" type="text/css" />
<link href="CSS/AddRentalPayerForm.css" rel="stylesheet" type="text/css" />
<link href="CSS/Menu.css" rel="stylesheet" type="text/css" />
<title>Add Shop Rental Payer</title>
</head>
<body>
<div id="Holder">
<div id="Header"> </div>
<div id="NavBar"> 
	<nav>
		<ul>
			<li> <a href="AccountAdmin.php? <?php echo SID;?>"> Home </a></li>
            <li class="DropDwnElmnt"> <a href="#"> Add Tax Payer</a>
            <div class="DropDwnCntnt">
            <ul class="DrpLst">
            	<li> <a href="AddAssesmentTaxPayer.php? <?php echo SID;?>"> Assesment Tax Payer </a> </li>
                <li> <a href="AddShopRentalPayer.php? <?php echo SID;?>"> Shop Tax Payer </a> </li>
            </ul>
            </div>
            </li>
			<li class="DropDwnElmnt"> <a href="#"> Reports </a>  
            <div class="DropDwnCntnt">
            <ul class="DrpLst">
            	<li class="DropDwnElmnt"> <a href="#"> Assesment Tax <span> </span></a> 
                <div class="submenu">
            	<ul class="DrpLst">
            		<li> <a href="DailyReportTaxAdmin.php? <?php echo SID;?>"> Daily Report </a> </li>
                	<li> <a href="MonthlyReportTaxAdmin.php? <?php echo SID;?>"> Monthly Report </a> </li>
                    <li> <a href="QuarterReportAdmin.php? <?php echo SID;?>"> Quartar Report </a> </li>
                    <li> <a href="TaxCustomReportAdmin.php? <?php echo SID;?>"> Tax Payer Report </a> </li>
            	</ul>
                </div>
                </li>
                <li class="DropDwnElmnt"> <a href="#"> Shop Rental <span> </span></a>
                <div class="submenu">
            	<ul class="DrpLst">
            		<li> <a href="MonthlyReportRentalAdmin.php? <?php echo SID;?>"> Monthly Report </a> </li>
                	<li> <a href="RentalCustomReportAdmin.php? <?php echo SID;?>"> Rental Payer Report </a> </li>	
            	</ul>
                </div>
                </li>
            </ul>
            </div> 
            </li>
            <li class="DropDwnElmnt"> <a href="#"> Policies </a>
            <div class="DropDwnCntnt">
                <ul class="DrpLst">
                    <li><a href="AdminViewPolicies.php? <?php echo SID;?>">View Policies</li>
                    <li><a href="UpdatePolicies.php? <?php echo SID;?>">Update Policies</li>
                </ul>
            </div>
            </li>
            <li class="DropDwnElmnt"> <a href="#"> Manage Customers </a> 
            <div class="DropDwnCntnt">
            <ul class="DrpLst">
            	<li> <a href="AssesmentTaxPayerDetails.php? <?php echo SID;?>"> Assesment Tax Payers </a> </li>
                <li> <a href="ShopRentalTaxPayerDetails.php? <?php echo SID;?>"> Shop Rental Payers </a> </li>
            </ul>
            </div>
            </li>
            <li class="DropDwnElmnt"> <a href="#"> Account </a> 
            <div class="DropDwnCntnt">
            <ul class="DrpLst">
            	<li> <a href="AddShopRentalPayer.php? <?php echo SID;?>"> Edit Account </a> </li>
                <li> <a href="LogOut.php? <?php echo SID;?>"> Logout </a> </li>
            </ul>
            </div>
            </li>
		</ul>
	</nav>
</div>
<div id="Content"> 
<div id="PageHeading">
<h1>Update Shop Rental Payer</h1>
</div>
<div id="Message" >
<h2> Provide details of the tax payer. </h2>
<h2> Fill all the data correctly. </h2>
</div>
<div id="Detail">
<h2 class="DetailHeader2"> Shop Rental Payer apply form. </h2>
<h3><?php if(isset($_POST['submit'])){echo $message;}?></h3>

<form  method="post" id="ShopRentalPayerDetail" name="ShopRentalPayerDetail">
<table align="left" width="">
<tr>
<td  height="45" width="200"><label class="AddFormLabel"> Owner's Name </label></td> 
<td  height="45" width="20"></td> 
<td  height="45" width="250"><input type="text" class="AddFormInput" id="OwnerName" name="owner_name" required="required" value = "<?php if (isset($_POST['owner_name'])) echo $_POST['owner_name']; ?>"/></td> 
</tr>
<tr>
<td  height="80" width="200"><label class="AddFormLabel"> Owner's Address </label></td> 
<td  height="80" width="20"></td> 
<td  height="80" width="250"><textarea id="OwnerAddressField" class="AddFormInput" rows="4" cols="35" name="owner_address" required="required" ><?php if (isset($_POST['owner_address'])) echo $_POST['owner_address']; ?></textarea></td> 
</tr>
<tr>
<td  height="80" width="200"><label class="AddFormLabel"> Shop Address </label></td> 
<td  height="80" width="20"></td> 
<td  height="80" width="250"><textarea id="addressField" class="AddFormInput" rows="4" cols="35" name="shop_address" readonly="readonly" value="<?=$shop_address?>"><?php echo $shop_address ?></textarea></td> 
</tr>
<tr>
<td  height="45" width="200"><label class="AddFormLabel"> Shop No. </label></td> 
<td  height="45" width="20"></td> 
<td  height="45" width="250"><input type="text" class="AddFormInput" id="ShopNo" name="shop_no" readonly="readonly" value = "<?=$id?>"/></td> 
</tr>
<tr>
<td  height="45" width="200"><label class="AddFormLabel"> Tender Value(Rs) </label></td> 
<td  height="45" width="20"></td> 
<td  height="45" width="250"><input type="text" class="AddFormInput" id="TenderVal" name="tender_value" required="required" value = "<?php if (isset($_POST['tender_value'])) echo $_POST['tender_value']; ?>"/></td> 
</tr>
<tr>
<td  height="45" width="200"><label class="AddFormLabel"> Monthly Rental(Rs) </label></td> 
<td  height="45" width="20"></td> 
<td  height="45" width="250"><input type="text" class="AddFormInput" id="Rental" name="monthly_rental" required="required" value = "<?php if (isset($_POST['monthly_rental'])) echo $_POST['monthly_rental']; ?>"/></td> 
</tr>
<tr>
<td height="45" width="150"> </td> 
<td  height="45" width="20"></td> 
<td height="45" width="250"> <button id="BtnSubmit" form="ShopRentalPayerDetail" type="submit" name="submit"> Update </button></td>
</tr>
</table>
</form>
</div>
</div>
<footer
<p style="text-align: center;"> <?php echo (htmlentities("©"));?> Copyright @ 2017 <span id="client">BEMMULLA SUBOFFICE OF ATTANAGALLA PRADESHIYA SABAWA</span><br />
        Designed by <span id="company">AURORA SOFTWARE DEVOLOPERS</span><br /> Contact: +94774454613 <br /> email: aurorasoftdevoloper@gmail.com</p>
</footer>
</body>
</html>