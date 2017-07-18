<?php
	require_once("connect_database.php");
	require_once("access_officer.php");
	$getDetailsquery= "SELECT * FROM policies";
    $row=mysqli_fetch_assoc(database_query($getDetailsquery));
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Policies</title>
<link href="CSS/LayoutHome.css" rel="stylesheet" type="text/css" />
<link href="CSS/Menu.css" rel="stylesheet" type="text/css" />
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
            		<li> <a href="OfficerSearchAssesmentTaxPayer.php? <?php echo SID;?>"> Assesment Tax </a> </li>
                	<li> <a href="OfficerSearchShopRentalPayer.php? <?php echo SID;?>"> Shop Tax </a> </li>
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
    <h1>View Policies<h1>
</div>	
<div id="Message">         
</div>       
<div id="Detail">  
    <p><?php echo $row['year'] ?>,Secretary of the Pradeshiya saba is <?php echo $row['secretary_of_the_pradeshiya_saba'] ?>. Currently using Gazettes number is <?php echo $row['gazette_no']?> and the date is <?php echo $row['gazette_date'] ?> </p>
    <h2>Assesment Taxes<h2>
    <ol>
        <li>Assesment tax rate is <?php echo $row['assesment_tax_rate']?>%</li>
        <li>Discount for who pay the full payment before the january 31st is <?php echo $row['discount_for_full_annual_payment']?>%</li>
        <li>Discount for who pay the relevent quater payment before the gazetted date <?php echo $row['discount_for_full_quater_payment']?>%</li>
    </ol>
    <h2>Shop Rental Taxes</h2>
    <ol>
    <li>Monthly fine rate is <?php echo $row['shop_rental_fine_rate']?>%</li>
    </ol>
</div>
</div> 
</div>
<footer
<p style="text-align: center;"> <?php echo (htmlentities("©"));?> Copyright @ 2017 <span id="client">BEMMULLA SUBOFFICE OF ATTANAGALLA PRADESHIYA SABAWA</span><br />
        Designed by <span id="company">AURORA SOFTWARE DEVOLOPERS</span><br /> Contact: +94774454613 <br /> email: aurorasoftdevoloper@gmail.com</p>
</footer>
</body>
</html>
