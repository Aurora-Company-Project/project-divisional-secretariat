<?php
	require_once("access_admin.php");
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
<h2 class="DetailHeader2"> Assement tax payer apply form. </h2>
<h3> <?php //echo $message ?></h3>
<form action="DetailConfirmation.php" method="post" id="AssementTaxPayerDetail">
<table align="left" width="">
<tr>
<td  height="45" width="150"><label class="AddFormLabel"> Owner's Name </label></td> 
<td  height="45" width="20"></td> 
<td  height="45" width="250"><input type="text" class="AddFormInput" id="OwnerName" name="owner_name" value=""/></td> 
</tr>
<tr>
<td  height="80" width="150"><label class="AddFormLabel"> Address </label></td> 
<td  height="80" width="20"></td> 
<td  height="80" width="250"><textarea id="addressField" class="AddFormInput" rows="4" cols="35" name="address"></textarea></td> 
</tr>
<tr>
<td  height="45" width="150"><label class="AddFormLabel"> Ward No. </label></td> 
<td  height="45" width="20"></td> 
<td  height="45" width="250"><select>
							<option value="25"> 25 </option>
                            <option value="26"> 26 </option>
                            <option value="27"> 27 </option>
                            <option value="29"> 29 </option>
                            <option value="30"> 30 </option>
                            </select>
                            </td> 
</tr>
<tr>
<td  height="45" width="150"><label class="AddFormLabel"> Road </label></td> 
<td  height="45" width="20"></td> 
<td  height="45" width="250"><select>
							<option value="VR">Veyangoda Road </option>
                            <option value="NR">Negombo Road </option>
                            <option value="PR">Paaramulla Road </option>
                            <option value="VLR">Weliyadda Road </option>
                            <option value="HR">Heendeniya Road </option>
                            <option value="MR">Mahawela Road </option>
                            <option value="ER">Eluwapitiya Road </option>
                            <option value="BOR">Bodhirukkarama Road </option>
                            <option value="ALR">Aluthgama Road </option>
                            <option value="VIR">Vigada Road </option>
                            <option value="MUR">Mudagamuwa Road </option>
                            <option value="DUR">Station Road </option>
                            <option value="MRR">Maarapola Road </option>
                            <option value="MGR">Magalagoda Road </option>
                            <option value="MDR">Magalagoda Station Road </option>
							</select> </td> 
<td  height="45" width="70"><label class="AddFormLabel"> Side </label></td> 
<td  height="45" width="100"><select>
							<option value="L"> Left </option>
                            <option value="R"> Right </option>
                            </select>
							</td> 
</tr>
<tr>
<td  height="45" width="150"><label class="AddFormLabel"> Assesment No. </label></td> 
<td  height="45" width="20"></td> 
<td  height="45" width="250"><input type="text" class="AddFormInput" id="AssesmentNo" name="assesment_no" /></td> 
</tr>
<tr>
<td  height="45" width="150"><label class="AddFormLabel"> Asset Value </label></td> 
<td  height="45" width="20"></td> 
<td  height="45" width="250"><input type="text" class="AddFormInput" id="AssetValue" name="asset_value" /></td> 
</tr>
<tr>
<td  height="80" width="150"><label class="AddFormLabel"> Property Detail </label></td> 
<td  height="80" width="20"></td> 
<td  height="80" width="250"><textarea id="propertyDetail" class="AddFormInput" rows="4" cols="35"></textarea></td> 
</tr>
<tr>
<td height="45" width="150"> </td> 
<td  height="45" width="20"></td> 
<td height="45" width="250"> <button id="BtnSubmit" form="AssementTaxPayerDetail" type="submit" name="submit"> Submit </button></td>
</tr>
</table>
</form>
</div>
</div>
<div id="footer"></div>
</div>
</body>
</html>