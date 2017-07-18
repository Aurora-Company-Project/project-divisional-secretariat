<?php
	require_once("access_officer.php");
	include("connect_database.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="CSS/LayoutHome.css" rel="stylesheet" type="text/css" />
<link href="CSS/Menu.css" rel="stylesheet" type="text/css" />
<title>Home</title>
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
            		<li> <a href="AccountOfficer.php? <?php echo SID;?>"> Assesment Tax </a> </li>
                	<li> <a href="AccountOfficer.php? <?php echo SID;?>"> Shop Tax </a> </li>
                </ul>
                </div>
            </li>
			<li class="DropDwnElmnt"> <a href="#"> Reports </a>  
            <div class="DropDwnCntnt">
            <ul class="DrpLst">
            	<li class="DropDwnElmnt"> <a href="#"> Assesment Tax <span> </span></a> 
                <div class="submenu">
            	<ul class="DrpLst">
            		<li> <a href="DailyReportTaxOfficer.php? <?php echo SID;?>"> Daily Report </a> </li>
                	<li> <a href="MonthlyReportTaxOfficer.php? <?php echo SID;?>"> Monthly Report </a> </li>
                    <li> <a href="QuarterReportOfficer.php? <?php echo SID;?>"> Quartar Report </a> </li>
                    <li> <a href="TaxCustomReportOfficer.php? <?php echo SID;?>"> Tax Payer Report </a> </li>
            	</ul>
                </div>
                </li>
                <li class="DropDwnElmnt"> <a href="#"> Shop Rental <span> </span></a>
                <div class="submenu">
            	<ul class="DrpLst">
            		<li> <a href="MonthlyReportRentalOfficer.php? <?php echo SID;?>"> Monthly Report </a> </li>
                	<li> <a href="RentalCustomReportOfficer.php? <?php echo SID;?>"> Rental Payer Report </a> </li>	
            	</ul>
                </div>
                </li>
            </ul>
            </div> 
            </li>
            <li class="DropDwnElmnt"> <a href="OfficerViewPolicies.php? <?php echo SID; ?>"> View Policies </a></li>
           	<li class="DropDwnElmnt"> <a href="#"> Account </a> 
            <div class="DropDwnCntnt">
            <ul class="DrpLst">
            	<li> <a href="#"> Edit Account </a> </li>
                <li> <a href="LogOut.php? <?php echo SID; ?>"> Logout </a> </li>
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
<div id="Notifications">
<h2>Notifications</h2>
<h3> Assesment Tax </h3>
<?php
	$notification_query = "SELECT * FROM assesment_tax_detail WHERE arrears >=".
							" annual_tax * 5";
	$result = database_query($notification_query);
	if (!($customer = mysqli_fetch_array($result))){
		echo '<h4> No New Notifications! </h4>';
	} else {
		echo '<table>';
		echo '<tr>';
		echo '<th width="100" height="50"> Tax Payer ID </th>';
		echo '<th width="200"> Tax Payer Name </th>';
		echo '<th width="150"> Total Arrears </th>';
		echo '<th width="150"> </th>';
		echo '</tr>';
		echo '<tr>';
		echo '<td width="100" height="35">'. $customer['id']. '</td>';
		echo '<td width="200">' .$customer['owner_name'] . '</td>';
		echo '<td width="150">' .$customer['arrears']. '</td>';
		echo '<td width="150"><a href="">View Tax Payer</a> </td>';
		echo '</tr>';
		while ($customer = mysqli_fetch_array($result)) {
			echo '<tr>';
			echo '<td width="100" height="35">'. $customer['id']. '</td>';
			echo '<td width="200">' .$customer['owner_name'] . '</td>';
			echo '<td width="150">' .$customer['arrears']. '</td>';
			echo '<td width="150"><a href="">View Tax Payer</a> </td>';
			echo '</tr>';
			
		}
		echo '</table>';
	}
?>
<h3> Shop Rental </h3>
<?php
	$notification_query = "SELECT * FROM shop_rental_detail WHERE arrears >=".
							" monthly_rental";
	$result = database_query($notification_query);
	if (!($customer = mysqli_fetch_array($result))){
		echo '<h4> No New Notifications! </h4>';
	} else {
		echo '<table>';
		echo '<tr>';
		echo '<th width="100" height="50"> Shop ID </th>';
		echo '<th width="200"> Owner Name </th>';
		echo '<th width="150"> Total Arrears </th>';
		echo '<th width="150"> </th>';
		echo '</tr>';
		echo '<tr>';
		echo '<td width="100" height="35">'. $customer['id']. '</td>';
		echo '<td width="200">' .$customer['owner_name'] . '</td>';
		echo '<td width="150">' .$customer['arrears']. '</td>';
		echo '<td width="150"><a href="">View Rental Payer</a> </td>';
		echo '</tr>';
		while ($customer = mysqli_fetch_array($result)) {
			echo '<tr>';
			echo '<td width="100" height="35">'. $customer['id']. '</td>';
			echo '<td width="200">' .$customer['owner_name'] . '</td>';
			echo '<td width="150">' .$customer['arrears']. '</td>';
			echo '<td width="150"><a href="">View Rental Payer</a> </td>';
			echo '</tr>';	
		}
		echo '</table>';
	}
?>

</div>
</div>
<footer
<p style="text-align: center;"> <?php echo (htmlentities("©"));?> Copyright @ 2017 <span id="client">BEMMULLA SUBOFFICE OF ATTANAGALLA PRADESHIYA SABAWA</span><br />
        Designed by <span id="company">AURORA SOFTWARE DEVOLOPERS</span><br /> Contact: +94774454613 <br /> email: aurorasoftdevoloper@gmail.com</p>
</footer>
</body>
</html>