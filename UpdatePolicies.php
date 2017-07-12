<?php
	require_once("connect_database.php");
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Update Policies</title>
	<link href="CSS/Policiess.css" type="text/css" rel="stylesheet">
	<link href="CSS/LayoutHome.css" rel="stylesheet" type="text/css" />
	<link href="CSS/Menu.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="Holder">
    <div id="NavBar"> 
        <nav>
            <ul>
                <li> <a href="AccountAdmin.php"> Home </a></li>
                <li class="DropDwnElmnt"> <a href="#"> Add Tax Payer</a>
                <div class="DropDwnCntnt">
                <ul class="DrpLst">
                    <li> <a href="AddAssesmentTaxPayer.php"> Assesment Tax Payer </a> </li>
                    <li> <a href="AddShopRentalPayer.php"> Shop Tax Payer </a> </li>
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
                <li class="DropDwnElmnt"> <a href="#"> Policies </a>
                <div class="DropDwnCntnt">
                <ul class="DrpLst">
                    <li><a href="ViewPolicies.php">View Policies</li>
                    <li><a href="UpdatePolicies.php">Update Policies</li>
                </ul>
                </div>
                </li>
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
<div class="main">
	<div id="Heading">
		<h1> Update Policies<h1>
	</div>
	
	<div class="form_control">
   		<?php
			$sql= "select * from policies";
			$row=mysqli_fetch_assoc(database_query($sql));
			
		$year=$row['year'];
		$secretaryOfThePradeshiyaSaba=$row['secretary_of_the_pradeshiya_saba'];
		$assesmentTaxRate=$row['assesment_tax_rate'];
		$shoprentalTaxFine=$row['shop_rental_fine_rate'];
		$discountOfFullAnnualPayment=$row['discount_for_full_annual_payment'];
		$discountOfFullQuaterPayment=$row['discount_for_full_quater_payment'];
		$gazetteNumber=$row['gazette_no'];
		$gazetteDate=$row['gazette_date'];
		?>
		<form  method="post">
			<table align="center"> 
				<tr>
					<td width="250" height="35"> <label for="year"> Year: </label> </td>
					<td height="25"><input type="text" name="year" value="<?=$year?>"/> </td>
				</tr>
				<tr>
					<td width="250" height="35"> <label for="newAssesmentTaxRate"> New Rates Tax Rate: </label> </td>
					<td height="25"><input type="text" name="newAssesmentTaxRate" value="<?=$assesmentTaxRate?>"/> </td>
				</tr>
				<tr>
					<td width="250" height="35"> <label for="newShopRentalTaxFine"> New Shop Rental Tax Rate: </label> </td>
					<td height="25"><input type="text" name="newShopRentalTaxFine" value="<?=$shoprentalTaxFine?>"/> </td>
				</tr>
				<tr>
					<td width="250" height="35"> <label for="newSecretary"> Secretary of the Divisional Secretariat:</label> </td>
					<td height="25"><input type="text" name="newSecretary" value="<?=$secretaryOfThePradeshiyaSaba?>"/> </td>
				</tr>
				<tr>
					<td width="250" height="35"> <label for="discountOfAnnualPayment">   Discount for full annual payment:</label> </td>
					<td height="25"><input type="text" name="discountOfAnnualPayment" value="<?=$discountOfFullAnnualPayment?>"/> </td>
				</tr>
				<tr>
					<td width="250" height="35"> <label for="discountOfQuaterPayement"> Discount for quarter payment:</label> </td>
					<td height="25"><input type="text" name="discountOfQuaterPayement" value="<?=$discountOfFullQuaterPayment?>"/> </td>
				</tr>
                <tr>
					<td width="250" height="35"> <label for="gazetteNumber"> Gazette Number:</label> </td>
					<td height="25"><input type="text" name="gazetteNumber" value="<?=$gazetteNumber?>"/> </td>
				</tr>
                <tr>
					<td width="250" height="35"> <label for="gazetteDate"> Gazette Date:</label> </td>
					<td height="25"><input type="text" name="gazetteDate" value="<?=$gazetteDate?>"/> </td>
				</tr>			 
			 </table>
		</form>
		
	</div>
	
	<div class="bttn_control">
		<a href="SuccessfulyUpdated"><button id="Btn" type ="submit" name ="update">Update</button></a>
	</div>	
</div>
<?php 
	if(isset($_POST['update']))
	{
		$year=$_POST['year'];
		$secretaryOfThePradeshiyaSaba=$_POST['newSecretary'];
		$assesmentTaxRate=$_POST['newAssesmentTaxRate'];
		$shoprentalTaxFine=$_POST['newShopRentalTaxFine'];
		$discountOfFullAnnualPayment=$_POST['discountOfAnnualPayment'];
		$discountOfFullQuaterPayment=$_POST['discountOfQuaterPayement'];
		$gazetteNumber=$_POST['gazetteNumber'];
		$gazetteDate=$_POST['gazetteDate'];
		
		$sql= "update policies set secretary_of_the_pradeshiya_saba='$secretaryOfThePradeshiyaSaba', gazette_no='$gazetteNumber' , gazette_date='$gazetteDate' , assesment_tax_rate='$assesmentTaxRate' , discount_for_full_annual_payment='$discountOfFullAnnualPayment' , discount_for_full_quater_payment='$discountOfFullQuaterPayment' , shop_rental_fine_rate='$shoprentalTaxFine' , year='$year' where id=1";
		database_query($sql);
	}
	
?>
 </div> 
    <div id="footer">
    </div>
</body>
</body>
</html>