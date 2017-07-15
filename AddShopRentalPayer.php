<?php
	require_once("access_admin.php");
	include("connect_database.php");
?>
<?php 
	

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
			<li> <a href="AccountAdmin.php"> Home </a></li>
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
            <li class="DropDwnElmnt"> <a href="#"> Change Policies </a></li>
            <li class="DropDwnElmnt"> <a href="#"> Manage Accounts </a> 
            <div class="DropDwnCntnt">
            <ul class="DrpLst">
            	<li> <a href="#"> Assesment Tax Accounts </a> </li>
                <li> <a href="#"> Shop Rental Accounts </a> </li>
                <li> <a href="#"> User Acounts </a> </li>
            </ul>
            </div>
            </li>
            <li class="DropDwnElmnt"> <a href="#"> Account </a> 
            <div class="DropDwnCntnt">
            <ul class="DrpLst">
            	<li> <a href="#"> Edit Account </a> </li>
                <li> <a href="LogOut.php? <?php echo SID;?>"> Logout </a> </li>
            </ul>
            </div>
            </li>
		</ul>
	</nav>
</div>
<div id="Content"> 
<div id="PageHeading">
<h1>Welcome! <?php echo "$first_name " ."$last_name" ?> </h1>
</div>
<div id="Message" >
<h2> Provide details of the tax payer. </h2>
<h2> Fill all the data correctly. </h2>
</div>
<div id="Detail">
<h2 class="DetailHeader2"> Shop Rental Payer apply form. </h2>
<h3> <?php echo $message ?></h3>
<form action="DetailConfirmation.php" method="post" id="ShopRentalPayerDetail">
<table align="left" width="">
<tr>
<td  height="45" width="150"><label class="AddFormLabel"> Owner's Name </label></td> 
<td  height="45" width="20"></td> 
<td  height="45" width="250"><input type="text" class="AddFormInput" id="OwnerName" name="owner_name" value="" required="required"/></td> 
</tr>
<tr>
<td  height="80" width="150"><label class="AddFormLabel"> Owner's Address </label></td> 
<td  height="80" width="20"></td> 
<td  height="80" width="250"><textarea id="OwnerAddressField" class="AddFormInput" rows="4" cols="35" name="address" required="required"></textarea></td> 
</tr>
<tr>
<td  height="80" width="150"><label class="AddFormLabel"> Shop Address </label></td> 
<td  height="80" width="20"></td> 
<td  height="80" width="250"><textarea id="addressField" class="AddFormInput" rows="4" cols="35" name="address" required="required"></textarea></td> 
</tr>
<tr>
<td  height="45" width="150"><label class="AddFormLabel"> Shop No. </label></td> 
<td  height="45" width="20"></td> 
<td  height="45" width="250"><input type="text" class="AddFormInput" id="ShopNo" name="assesment_no" required="required"/></td> 
</tr>
<tr>
<td  height="45" width="150"><label class="AddFormLabel"> Tender Value(Rs) </label></td> 
<td  height="45" width="20"></td> 
<td  height="45" width="250"><input type="text" class="AddFormInput" id="TenderVal" name="asset_value" required="required"/></td> 
</tr>
<tr>
<td  height="80" width="150"><label class="AddFormLabel"> Property Detail </label></td> 
<td  height="80" width="20"></td> 
<td  height="80" width="250"><textarea id="propertyDetail" class="AddFormInput" rows="4" cols="35" required="required"></textarea></td> 
</tr>
<tr>
<td height="45" width="150"> </td> 
<td  height="45" width="20"></td> 
<td height="45" width="250"> <button id="BtnSubmit" form="ShopRentalPayerDetail" type="submit" name="submit"> Submit </button></td>
</tr>
</table>
</form>
</div>
</div>
<div id="footer"></div>
</div>
</body>
</html>