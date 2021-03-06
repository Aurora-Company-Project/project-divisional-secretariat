<?php
	require_once("access_admin.php");
	include("connect_database.php");
	$message="";
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
			$message= "Enter Valid Details";
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
	<link href="CSS/LayoutHome.css" rel="stylesheet" type="text/css" />
	<link href="CSS/Menu.css" rel="stylesheet" type="text/css" />
    <link href="CSS/UpdatePolicies.css" rel="stylesheet" type="text/css" />
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
<h1> Update Policies<h1>
</div>
<div id="Detail">
<h3><?php if(isset($_POST['update'])){echo $message;}?></h3>	
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
            <td height="25"><input type="date" max=(<?php echo date ("Y-m-d")?>) name="gazetteDate" value="<?=$gazetteDate?>"/> </td>
        </tr>			 
     </table>
     <button class="bttn_control" id="Btn" type ="submit" name ="update">Update</button>
</form>

</div>
</div>
<footer
<p style="text-align: center;"> <?php echo (htmlentities("©"));?> Copyright @ 2017 <span id="client">BEMMULLA SUBOFFICE OF ATTANAGALLA PRADESHIYA SABAWA</span><br />
        Designed by <span id="company">AURORA SOFTWARE DEVOLOPERS</span><br /> Contact: +94774454613 <br /> email: aurorasoftdevoloper@gmail.com</p>
</footer>
</div>
</body>
</body>
</html>