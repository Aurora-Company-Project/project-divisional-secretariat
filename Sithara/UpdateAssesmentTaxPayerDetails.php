<?php
	require_once("access_admin.php");
	require_once("connect_database.php");
	$message='';
	$id=$_GET['link'];
	$getExistingDetailsQuery="SELECT * FROM assesment_tax_detail WHERE id='$id'";
	$datarow=mysqli_fetch_assoc(database_query($getExistingDetailsQuery));
	$address=$datarow['address'];
	$assesment_no=$datarow['assesment_no'];
	$ward_no=$datarow['ward_no'];
	$lane=$datarow['lane'];
	$side=$datarow['side'];
	if (isset($_POST['update'])){
		$owner_name=$_POST['owner_name'];
		$asset_value=$_POST['asset_value'];
		$property_detail=$_POST['property_detail'];
		if (!(is_numeric($owner_name)) && (is_numeric($asset_value)) && !(is_numeric($property_detail)))
		{
			
			$policy_query = "SELECT assesment_tax_rate FROM policies WHERE id=1";
			$result=mysqli_fetch_assoc(database_query($policy_query));
			$rate=$result['assesment_tax_rate']/100;
			$annual_tax=$asset_value * $rate;
			$updateQuery="UPDATE assesment_tax_detail SET  owner_name='$owner_name', asset_value='$asset_value', property_detail='$property_detail' , annual_tax='$annual_tax' WHERE id='$id'";
			database_query($updateQuery);
		}
		else
		{
			$message="Enter Correct Details";
		}
	}
?>	

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Update Assesment Tax Payer Details</title>
<link href="CSS/LayoutHome.css" rel="stylesheet" type="text/css" />
<link href="CSS/AddTaxPayerForm.css" rel="stylesheet" type="text/css" />
<link href="CSS/Menu.css" rel="stylesheet" type="text/css" />
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
            	<li> <a href=""> Assesment Tax Payer </a> </li>
                <li> <a href=""> Shop Tax Payer </a> </li>
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
            <li class="DropDwnElmnt"> <a href="#"> Policies </a></li>
            <div class="DropDwnCntnt">
                <ul class="DrpLst">
                    <li><a href="ViewPolicies.php? <?php echo SID;?>">View Policies</li>
                    <li><a href="UpdatePolicies.php? <?php echo SID;?>">Update Policies</li>
                </ul>
            </div>
            </li>
            <li class="DropDwnElmnt"> <a href="#"> Manage Accounts </a> 
            <div class="DropDwnCntnt">
            <ul class="DrpLst">
            	<li> <a href="#"> Assesment Tax Accounts </a> </li>
                <li> <a href="#"> Shop Rental Accounts </a> </li>
            </ul>
            </div>
            </li
            ><li class="DropDwnElmnt"> <a href="#"> Account </a> 
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
<h1>Update Assesment TaxPayer Details</h1>
</div>
<div id="Message" >
<h2> Provide details of the tax payer. </h2>
<h2> Fill all the data correctly. </h2>
</div>
<div id="Detail">
<h3><?php if(isset($_POST['update'])){echo $message;}?></h3>
<h2 class="DetailHeader2"> Assement tax payer apply form. </h2>

<form  method="post" id="AssementTaxPayerDetail">
<table align="left" width="">
<tr>
<td  height="45" width="150"><label class="AddFormLabel"> Owner's Name </label></td> 
<td  height="45" width="20"></td> 
<td  height="45" width="250"><input type="text" class="AddFormInput" id="OwnerName" name="owner_name" required="required" value="<?php if (isset($_POST['owner_name'])) echo $_POST['owner_name']; ?>"/></td> 
</tr>
<tr>
<td  height="80" width="150"><label class="AddFormLabel"> Address </label></td> 
<td  height="80" width="20"></td> 
<td  height="80" width="250"><textarea id="addressField" class="AddFormInput" rows="4" cols="35" name="address" value="<?=$address?>"><?php echo $address?></textarea></td> 
</tr>
<tr>
<td  height="45" width="150"><label class="AddFormLabel"> Ward No. </label></td> 
<td  height="45" width="20"></td> 
<td  height="45" width="250"><input type="text" id="ward_no" class="AddFormInput" name="ward_no" value="<?=$ward_no?>" readonly="readonly"/></td> 
</tr>
<tr>
<td  height="45" width="150"><label class="AddFormLabel"> Road </label></td> 
<td  height="45" width="20"></td> 
<td  height="45" width="250"><input type="text" id="lane" class="AddFormInput" name="lane" value="<?=$lane?>" readonly="readonly"/></td> 
<td  height="45" width="70"><label class="AddFormLabel"> Side </label></td> 
<td  height="45" width="100"><input type="text" id="side" class="AddFormInput" name="side"value="<?=$side?>" readonly="readonly"/></td> 
</tr>
<tr>
<td  height="45" width="150"><label class="AddFormLabel"> Assesment No. </label></td> 
<td  height="45" width="20"></td> 
<td  height="45" width="250"><input type="text" class="AddFormInput" id="AssesmentNo" name="assesment_no" value = "<?=$assesment_no?>" readonly="readonly"/></td> 
</tr>
<tr>
<td  height="45" width="150"><label class="AddFormLabel"> Asset Value </label></td> 
<td  height="45" width="20"></td> 
<td  height="45" width="250"><input type="text" class="AddFormInput" id="AssetValue" name="asset_value" required="required"	value = "<?php if (isset($_POST['asset_value'])) echo $_POST['asset_value']; ?>"  /></td> 
</tr>
<tr>
<td  height="80" width="150"><label class="AddFormLabel"> Property Detail </label></td> 
<td  height="80" width="20"></td> 
<td  height="80" width="250"><textarea id="propertyDetail" class="AddFormInput" rows="4" cols="35" name="property_detail" required="required" ><?php if (isset($_POST['property_detail'])) echo $_POST['property_detail']; ?></textarea></td> 
</tr>
<tr>
<td height="45" width="150"> </td> 
<td  height="45" width="20"></td> <td height="45" width="250"> <button type="submit" name="update">Update</button></td>

</tr>
</table>
</form>
</div>
</div>
<div id="footer"></div>
</div>
</body>
</html>