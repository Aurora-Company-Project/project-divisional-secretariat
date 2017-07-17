<?php
	require_once("access_officer.php");
	include("connect_database.php");
	$getCurrentDataQuery = "SELECT * FROM policies";
	$row=mysqli_fetch_assoc(database_query($getCurrentDataQuery));
	$year=$row['year'];
	$secretaryOfThePradeshiyaSaba=$row['secretary_of_the_pradeshiya_saba'];
	$assesmentTaxRate=$row['assesment_tax_rate'];
	$shoprentalTaxFine=$row['shop_rental_fine_rate'];
	$discountOfFullAnnualPayment=$row['discount_for_full_annual_payment'];
	$discountOfFullQuaterPayment=$row['discount_for_full_quater_payment'];
	$gazetteNumber=$row['gazette_no'];
	$gazetteDate=$row['gazette_date']; 
	
	if (isset($_POST['update'])){
		$year=$_POST['year'];
		$secretaryOfThePradeshiyaSaba=ucwords($_POST['newSecretary']);
		$assesmentTaxRate=$_POST['newAssesmentTaxRate'];
		$shoprentalTaxFine=$_POST['newShopRentalTaxFine'];
		$discountOfFullAnnualPayment=$_POST['discountOfAnnualPayment'];
		$discountOfFullQuaterPayment=$_POST['discountOfQuaterPayement'];
		$gazetteNumber=$_POST['gazetteNumber'];
		$gazetteDate=$_POST['gazetteDate']; 
		$getAssesmentCustomerDetailQuery="SELECT * FROM assesment_tax_detail";	
		
		if(!(is_numeric($year)) || !(is_numeric($assesmentTaxRate)) || !(is_numeric($shoprentalTaxFine)) || !(is_numeric($discountOfFullAnnualPayment)) || !(is_numeric($discountOfFullQuaterPayment)))
		{
			echo "Enter Valid Details";
		} 
		else
		{
			$updatePoliciesQuery="UPDATE policies SET secretary_of_the_pradeshiya_saba='$secretaryOfThePradeshiyaSaba' , gazette_no='$gazetteNumber' , gazette_date='$gazetteDate' , assesment_tax_rate='$assesmentTaxRate' , discount_for_full_annual_payment='$discountOfFullAnnualPayment' , discount_for_full_quater_payment='$discountOfFullQuaterPayment' , shop_rental_fine_rate='$shoprentalTaxFine' , year='$year' WHERE id=1";
			database_query($updatePoliciesQuery);
			if ($assesmentTaxRate!=$row['assesment_tax_rate'])
			{	
				$result = database_query($getAssesmentCustomerDetailQuery);
				while($customer=mysqli_fetch_array($result))
				{
					foreach($customer as $key=>$val)
					{
						$id=$customer['id'];
						$assetValue=$customer['asset_value'];
					}
				$updateExistingAnnualTax="UPDATE assesment_tax_detail SET annual_tax=('$assetValue'*'$assesmentTaxRate')/100 WHERE id='$id'";
				database_query($updateExistingAnnualTax);
			}
		}
		}
		
	}
	
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
                <li class="DropDwnElmnt"> <a href="#"> Policies </a>
                <div class="DropDwnCntnt">
                <ul class="DrpLst">
                    <li><a href="AdminViewPolicies.php? <?php echo SID;?>">View Policies</li>
                    <li><a href="UpdatePolicies.php? <?php echo SID;?>">Update Policies</li>
                </ul>
                </div>
                </li>
                <li class="DropDwnElmnt"> <a href="#"> Manage Customer </a> 
                <div class="DropDwnCntnt">
                <ul class="DrpLst">
                    <li> <a href="AssesmentTaxPayerDetails.php? <?php echo SID?>>"> Assesment Tax Accounts </a> </li>
                    <li> <a href="ShopRentalTaxPayerDetails.php? <?php echo SID?>"> Shop Rental Accounts </a> </li>
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
   		
    <form action="UpdatePolicies.php" id="update_form" name="updateForm" method="post">
        <table align="center"> 
            
            <tr>
                <td width="250" height="35"> <label for="newAssesmentTaxRate"> New Assesment Tax Rate: </label> </td>
                <td height="25"><input type="text" name="newAssesmentTaxRate" value="<?=$assesmentTaxRate?>"/><label>%</label> </td>
            </tr>
            <tr>
                <td width="250" height="35"> <label for="newShopRentalTaxFine"> New Shop Rental Fine Rate: </label> </td>
                <td height="25"><input type="text" name="newShopRentalTaxFine" value="<?=$shoprentalTaxFine?>"/><label>%</label> </td>
            </tr>
            <tr>
                <td width="250" height="35"> <label for="discountOfAnnualPayment">   Discount for full annual payment:</label> </td>
                <td height="25"><input type="text" name="discountOfAnnualPayment" value="<?=$discountOfFullAnnualPayment?>"/><label>%</label> </td>
            </tr>
            <tr>
                <td width="250" height="35"> <label for="discountOfQuaterPayement"> Discount for quarter payment:</label> </td>
                <td height="25"><input type="text" name="discountOfQuaterPayement" value="<?=$discountOfFullQuaterPayment?>"/><label>%</label> </td>
            </tr>
            <tr>
                <td width="250" height="35"> <label for="year"> Year: </label> </td>
                <td height="25"><input type="text" name="year" value="<?=$year?>"/> </td>
            </tr>
            <tr>
                <td width="250" height="35"> <label for="newSecretary"> Secretary of the Divisional Secretariat:</label> </td>
                <td height="25"><input type="text" name="newSecretary" value="<?=$secretaryOfThePradeshiyaSaba?>"/> </td>
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
         <button class="bttn_control" id="Btn" type ="submit" name ="update">Update</button>
    </form>

	</div>
	
	
</div>

 </div> 
    <div id="footer">
    </div>
</body>
</body>
</html>