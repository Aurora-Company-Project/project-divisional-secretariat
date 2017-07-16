<?php
	require_once("access_admin.php");
	include("connect_database.php");
?>
<?php 
	$message="";
	$confirmation="";
	if (isset($_POST['cancel'])){
		$confirmation='0';
	}
	if (isset($_POST['confirm'])){
		$owner_name=$_POST['owner_name'];
		$owner_address=$_POST['owner_address'];
		$shop_address=$_POST['shop_address'];
		$tender_value=$_POST['tender_value'];
		$shop_no = $_POST['shop_no'];
		$monthly_rental = $_POST['monthly_rental'];
		$query ="INSERT INTO shop_rental_detail (id, owner_name, owner_address, shop_address, tender_value,". 
				 " monthly_rental) " . "VALUES ($shop_no, '$owner_name', '$owner_address', ". 
				 "'$shop_address', $tender_value, $monthly_rental)";
		database_query($query);
		$shop_name = 'SHP'."$shop_no";
		$user_table = "CREATE TABLE $shop_name (bill_no INT NOT NULL, date DATETIME NOT NULL, payment DOUBLE NOT NULL, PRIMARY KEY(bill_no))";
		database_query($user_table);
		header('Location: Successfull.php');
	}else if (isset($_POST['submit'])) {
		if (is_numeric($_POST['shop_no']) && is_numeric($_POST['tender_value']) && is_numeric($_POST['monthly_rental'])){
			$shop_no = $_POST['shop_no'];
			$check_query = "SELECT * FROM shop_rental_detail WHERE id = $shop_no";
			$result=database_query($check_query);
			if ((is_null(mysqli_fetch_array($result)))) {
					$confirmation='1';
					$message='Confirm details to proceed. Press cancel to make changes.';
			} else {
				$message="Shop rental payer account already exists";
				unset($_POST['submit']);
			}
		} else {
			$message='Invalid Shop number/ Tender Value/ Monthly Rental.';
			unset($_POST['submit']);
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
            </li>
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
<h1>Welcome! <?php echo "$first_name " ."$last_name" ?> </h1>
</div>
<div id="Message" >
<h2> Provide details of the tax payer. </h2>
<h2> Fill all the data correctly. </h2>
</div>
<div id="Detail">
<h2 class="DetailHeader2"> Shop Rental Payer apply form. </h2>
<h3> <?php echo $message ?></h3>
<form action="AddShopRentalPayer.php" method="post" id="ShopRentalPayerDetail" name="ShopRentalPayerDetail">
<table align="left" width="">
<tr>
<td  height="45" width="200"><label class="AddFormLabel"> Owner's Name </label></td> 
<td  height="45" width="20"></td> 
<td  height="45" width="250"><input type="text" class="AddFormInput" id="OwnerName" name="owner_name" required="required" <?php if($confirmation=='1'){ echo 'readonly=\"readonly\"'; } ?>
								value = "<?php if (isset($_POST['owner_name'])) echo $_POST['owner_name']; ?>"/></td> 
</tr>
<tr>
<td  height="80" width="200"><label class="AddFormLabel"> Owner's Address </label></td> 
<td  height="80" width="20"></td> 
<td  height="80" width="250"><textarea id="OwnerAddressField" class="AddFormInput" rows="4" cols="35" name="owner_address" required="required" 
							<?php if($confirmation=='1'){ echo 'readonly=\"readonly\"'; }?> ><?php if (isset($_POST['owner_address'])) echo $_POST['owner_address']; ?></textarea></td> 
</tr>
<tr>
<td  height="80" width="200"><label class="AddFormLabel"> Shop Address </label></td> 
<td  height="80" width="20"></td> 
<td  height="80" width="250"><textarea id="addressField" class="AddFormInput" rows="4" cols="35" name="shop_address" required="required" 
							<?php if($confirmation=='1'){ echo 'readonly=\"readonly\"'; }?> ><?php if (isset($_POST['shop_address'])) echo $_POST['shop_address']; ?></textarea></td> 
</tr>
<tr>
<td  height="45" width="200"><label class="AddFormLabel"> Shop No. </label></td> 
<td  height="45" width="20"></td> 
<td  height="45" width="250"><input type="text" class="AddFormInput" id="ShopNo" name="shop_no" required="required" <?php if($confirmation=='1'){ echo 'readonly=\"readonly\"'; } ?>
								value = "<?php if (isset($_POST['shop_no'])) echo $_POST['shop_no']; ?>"/></td> 
</tr>
<tr>
<td  height="45" width="200"><label class="AddFormLabel"> Tender Value(Rs) </label></td> 
<td  height="45" width="20"></td> 
<td  height="45" width="250"><input type="text" class="AddFormInput" id="TenderVal" name="tender_value" required="required" <?php if($confirmation=='1'){ echo 'readonly=\"readonly\"'; } ?>
								value = "<?php if (isset($_POST['tender_value'])) echo $_POST['tender_value']; ?>"/></td> 
</tr>
<tr>
<td  height="45" width="200"><label class="AddFormLabel"> Monthly Rental(Rs) </label></td> 
<td  height="45" width="20"></td> 
<td  height="45" width="250"><input type="text" class="AddFormInput" id="Rental" name="monthly_rental" required="required" <?php if($confirmation=='1'){ echo 'readonly=\"readonly\"'; } ?>
								value = "<?php if (isset($_POST['monthly_rental'])) echo $_POST['monthly_rental']; ?>"/></td> 
</tr>
<tr>
<td height="45" width="150"> </td> 
<td  height="45" width="20"></td> 
<td height="45" width="250"> <?php if (!isset($_POST['submit']) || isset($_POST['cancel'])) {
										echo '<button id="BtnSubmit" form="ShopRentalPayerDetail" type="submit" name="submit"> Submit </button>'; 
									}
									else { 
										echo '<button id="BtnConfirm" form="ShopRentalPayerDetail" type="submit" name="confirm"> Confirm </button>';
										echo '<button id="BtnCancel" form="ShopRentalPayerDetail" type="submit" name="cancel"> Cancel </button>';
									}
								?></button></td>
</tr>
</table>
</form>
</div>
</div>
<div id="footer"></div>
</div>
</body>
</html>