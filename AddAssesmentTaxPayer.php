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
		$address=$_POST['address'];
		$assesment_no=$_POST['assesment_no'];
		$asset_value=$_POST['asset_value'];
		$property_detail=$_POST['property_detail'];
		$ward_no = $_POST['ward_no'];
		$lane = $_POST['lane'];
		$side = $_POST['side'];
		$policy_query = "SELECT assesment_tax_rate FROM policies WHERE id=1";
		$result = mysqli_fetch_array(database_query($policy_query));
		$rate = $result['assesment_tax_rate']/100;
		$annual_tax = $asset_value * $rate;
		$id = $ward_no.$lane.$side.$assesment_no;
		$query ="INSERT INTO assesment_tax_detail (id, ward_no, lane, side, assesment_no, owner_name, ".
				"address, property_detail, asset_value, annual_tax) " . "VALUES ('$id', $ward_no, ".
				"'$lane', '$side', $assesment_no, '$owner_name', '$address', '$property_detail', $asset_value, $annual_tax)";
		database_query($query);
		$user_table = "CREATE TABLE $id (bill_no INT NOT NULL, date DATETIME NOT NULL, payment DOUBLE NOT NULL, PRIMARY KEY(bill_no))";
		database_query($user_table);
		header('Location: Successfull.php');
	}else if (isset($_POST['submit'])) {
		if (is_numeric($_POST['assesment_no']) && is_numeric($_POST['asset_value'])){
			if (($_POST['ward_no']!='') && ($_POST['lane']!='') && ($_POST['side']!='')){
				$ward_no = $_POST['ward_no'];
				$lane = $_POST['lane'];
				$side = $_POST['side'];
				$assesment_no=$_POST['assesment_no'];
				$id = $ward_no.$lane.$side.$assesment_no;
				$check_query = "SELECT * FROM assesment_tax_detail WHERE id = '$id'";
				$result=database_query($check_query);
				if ((is_null(mysqli_fetch_array($result)))) {
					$confirmation='1';
					$message='Confirm details to proceed. Press cancel to make changes.';
				} else {
					$message="Assesment tax account already exists";
					unset($_POST['submit']);
				}
			} else {
				$message='Please select a ward number, lane and side.'; 
				unset($_POST['submit']);
			}
		} else {
			$message='Please input valid assesment number/asset value.';
			unset($_POST['submit']);
		}
	}
?>
	

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="CSS/LayoutHome.css" rel="stylesheet" type="text/css" />
<link href="CSS/AddTaxPayerForm.css" rel="stylesheet" type="text/css" />
<link href="CSS/Menu.css" rel="stylesheet" type="text/css" />
<title>Add Assesment Tax Payer</title>
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
<div id="Message" >
<h2> Provide details of the tax payer. </h2>
<h2> Fill all the data correctly. </h2>
</div>
<div id="Detail">
<h2 class="DetailHeader2"> Assement tax payer apply form. </h2>
<h3> <?php echo $message ?></h3>
<form action="AddAssesmentTaxPayer.php" method="post" id="AssementTaxPayerDetail">
<table align="left" width="">
<tr>
<td  height="45" width="150"><label class="AddFormLabel"> Owner's Name </label></td> 
<td  height="45" width="20"></td> 
<td  height="45" width="250"><input type="text" class="AddFormInput" id="OwnerName" name="owner_name" required="required" <?php if($confirmation=='1'){ echo 'readonly=\"readonly\"'; } ?>
								value = "<?php if (isset($_POST['owner_name'])) echo $_POST['owner_name']; ?>"/></td> 
</tr>
<tr>
<td  height="80" width="150"><label class="AddFormLabel"> Address </label></td> 
<td  height="80" width="20"></td> 
<td  height="80" width="250"><textarea id="addressField" class="AddFormInput" rows="4" cols="35" name="address" required="required" <?php if($confirmation=='1'){ echo 'readonly=\"readonly\"'; } ?>
								><?php if (isset($_POST['address'])) echo $_POST['address']; ?></textarea></td> 
</tr>
<tr>
<td  height="45" width="150"><label class="AddFormLabel"> Ward No. </label></td> 
<td  height="45" width="20"></td> 
<td  height="45" width="250"><select name="ward_no">
							<option value=""> ... </option>
							<option value="25" <?php if(isset($_POST['ward_no'])) if($_POST['ward_no']!='25') { if ($confirmation=='1') echo "disabled=\"disabled\"";}
												else { echo "selected=\"selected\"";} ?>> 25 </option>
                            <option value="26" <?php if(isset($_POST['ward_no'])) if(isset($_POST['ward_no']) && $_POST['ward_no']!='26') { if ($confirmation=='1') echo "disabled=\"disabled\"";}
												else { echo "selected=\"selected\"";} ?>> 26 </option>
                            <option value="27" <?php if(isset($_POST['ward_no'])) if($_POST['ward_no']!='27') { if ($confirmation=='1') echo "disabled=\"disabled\"";}
												else { echo "selected=\"selected\"";} ?>> 27 </option>
                            <option value="29" <?php if(isset($_POST['ward_no'])) if($_POST['ward_no']!='29') { if ($confirmation=='1') echo "disabled=\"disabled\"";}
												else { echo "selected=\"selected\"";} ?>> 29 </option>
                            <option value="30" <?php if(isset($_POST['ward_no'])) if($_POST['ward_no']!='30') { if ($confirmation=='1') echo "disabled=\"disabled\"";}
												else { echo "selected=\"selected\"";} ?>> 30 </option>
                            </select>
                            </td> 
</tr>
<tr>
<td  height="45" width="150"><label class="AddFormLabel"> Road </label></td> 
<td  height="45" width="20"></td> 
<td  height="45" width="250"><select name="lane">
							<option value=""> ... </option>
							<option value="VR" <?php if(isset($_POST['lane'])) if($_POST['lane']!='VR') { if ($confirmation=='1') echo "disabled=\"disabled\"";}
												else { echo "selected=\"selected\"";} ?>>Veyangoda Road </option>
                            <option value="NR" <?php if(isset($_POST['lane'])) if($_POST['lane']!='NR') { if ($confirmation=='1') echo "disabled=\"disabled\"";}
												else { echo "selected=\"selected\"";} ?>>Negombo Road </option>
                            <option value="PR" <?php if(isset($_POST['lane'])) if($_POST['lane']!='PR') { if ($confirmation=='1') echo "disabled=\"disabled\"";}
												else { echo "selected=\"selected\"";} ?>>Paaramulla Road </option>
                            <option value="VLR" <?php if(isset($_POST['lane'])) if($_POST['lane']!='VLR') { if ($confirmation=='1') echo "disabled=\"disabled\"";}
												else { echo "selected=\"selected\"";} ?>>Weliyadda Road </option>
                            <option value="HR" <?php if(isset($_POST['lane'])) if($_POST['lane']!='HR') { if ($confirmation=='1') echo "disabled=\"disabled\"";}
												else { echo "selected=\"selected\"";} ?>>Heendeniya Road </option>
                            <option value="MR" <?php if(isset($_POST['lane'])) if($_POST['lane']!='MR') { if ($confirmation=='1') echo "disabled=\"disabled\"";}
												else { echo "selected=\"selected\"";} ?>>Mahawela Road </option>
                            <option value="ER" <?php if(isset($_POST['lane'])) if($_POST['lane']!='ER') { if ($confirmation=='1') echo "disabled=\"disabled\"";}
												else { echo "selected=\"selected\"";} ?>>Eluwapitiya Road </option>
                            <option value="BOR" <?php if(isset($_POST['lane'])) if($_POST['lane']!='BOR') { if ($confirmation=='1') echo "disabled=\"disabled\"";}
												else { echo "selected=\"selected\"";} ?>>Bodhirukkarama Road </option>
                            <option value="ALR" <?php if(isset($_POST['lane'])) if($_POST['lane']!='ALR') { if ($confirmation=='1') echo "disabled=\"disabled\"";}
												else { echo "selected=\"selected\"";} ?>>Aluthgama Road </option>
                            <option value="VIR" <?php if(isset($_POST['lane'])) if($_POST['lane']!='VIR') { if ($confirmation=='1') echo "disabled=\"disabled\"";}
												else { echo "selected=\"selected\"";} ?>>Vigada Road </option>
                            <option value="MUR" <?php if(isset($_POST['lane'])) if($_POST['lane']!='MUR') { if ($confirmation=='1') echo "disabled=\"disabled\"";}
												else { echo "selected=\"selected\"";} ?>>Mudagamuwa Road </option>
                            <option value="DUR" <?php if(isset($_POST['lane'])) if($_POST['lane']!='DUR') { if ($confirmation=='1') echo "disabled=\"disabled\"";}
												else { echo "selected=\"selected\"";} ?>>Station Road </option>
                            <option value="MRR" <?php if(isset($_POST['lane'])) if($_POST['lane']!='MRR') { if ($confirmation=='1') echo "disabled=\"disabled\"";}
												else { echo "selected=\"selected\"";} ?>>Maarapola Road </option>
                            <option value="MGR" <?php if(isset($_POST['lane'])) if($_POST['lane']!='MGR') {if ($confirmation=='1') echo "disabled=\"disabled\"";}
												else { echo "selected=\"selected\"";} ?>>Magalagoda Road </option>
                            <option value="MDR" <?php if(isset($_POST['lane'])) if($_POST['lane']!='MDR') { if ($confirmation=='1') echo "disabled=\"disabled\"";}
												else { echo "selected=\"selected\"";} ?>>Magalagoda Station Road </option>
							</select> </td> 
<td  height="45" width="70"><label class="AddFormLabel"> Side </label></td> 
<td  height="45" width="100"><select name="side">
							<option value=""> ... </option>
							<option value="L" <?php if(isset($_POST['side'])) if($_POST['side']!='L') { if ($confirmation=='1') echo "disabled=\"disabled\"";}
												else { echo "selected=\"selected\"";} ?>> Left </option>
                            <option value="R" <?php if(isset($_POST['side'])) if($_POST['side']!='R') { if ($confirmation=='1') echo "disabled=\"disabled\"";}
												else { echo "selected=\"selected\"";} ?>> Right </option>
                            </select>
							</td> 
</tr>
<tr>
<td  height="45" width="150"><label class="AddFormLabel"> Assesment No. </label></td> 
<td  height="45" width="20"></td> 
<td  height="45" width="250"><input type="text" class="AddFormInput" id="AssesmentNo" name="assesment_no" required="required" <?php if($confirmation=='1'){ echo 'readonly=\"readonly\"'; } ?>
								value = "<?php if (isset($_POST['assesment_no'])) echo $_POST['assesment_no']; ?>" /></td> 
</tr>
<tr>
<td  height="45" width="150"><label class="AddFormLabel"> Asset Value </label></td> 
<td  height="45" width="20"></td> 
<td  height="45" width="250"><input type="text" class="AddFormInput" id="AssetValue" name="asset_value" required="required" <?php if($confirmation=='1'){ echo 'readonly=\"readonly\"'; } ?>
								value = "<?php if (isset($_POST['asset_value'])) echo $_POST['asset_value']; ?>" /></td> 
</tr>
<tr>
<td  height="80" width="150"><label class="AddFormLabel"> Property Detail </label></td> 
<td  height="80" width="20"></td> 
<td  height="80" width="250"><textarea id="propertyDetail" class="AddFormInput" rows="4" cols="35" name="property_detail" required="required" 
								<?php if($confirmation=='1'){ echo 'readonly=\"readonly\"'; }?> ><?php if (isset($_POST['property_detail'])) echo $_POST['property_detail']; ?></textarea></td> 
</tr>
<tr>
<td height="45" width="150"> </td> 
<td  height="45" width="20"></td> 
<td height="45" width="250"> <?php if (!isset($_POST['submit']) || isset($_POST['cancel'])) {
										echo '<button id="BtnSubmit" form="AssementTaxPayerDetail" type="submit" name="submit"> Submit </button>'; 
									}
									else { 
										echo '<button id="BtnConfirm" form="AssementTaxPayerDetail" type="submit" name="confirm"> Confirm </button>';
										echo '<button id="BtnCancel" form="AssementTaxPayerDetail" type="submit" name="cancel"> Cancel </button>';
									}
								?></td>
</tr>
</table>
</form>
</div>
</div>
<div id="footer"></div>
</div>
</body>
</html>