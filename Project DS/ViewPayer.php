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
<link href="CSS/ViewPayer.css" rel="stylesheet" type="text/css" />
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
            		<li> <a href="OfficerSearchShopRentalPayer.php? <?php echo SID;?>"> Assesment Tax </a> </li>
                	<li> <a href="OfficerSearchAssesmentTaxPayer.php? <?php echo SID;?>"> Shop Rental </a> </li>
                    <li> <a href="Incorrectpay.php? <?php echo SID;?>"> False Payements </a> </li>
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
<h1>Tax/Rental Payer Profile</h1>
</div>
<div id="Notifications">
<?php 
	if (isset($_GET['type'])){
	if($_GET['type']=='T') {
		$id = $_GET['id'];
		$query = "SELECT * FROM assesment_tax_detail WHERE id = '$id'";
		$result = database_query($query);
		$row = mysqli_fetch_array($result);
		echo '<table align="center">';
		echo '<tr>';
		echo '<td width="150"> Owner Name </td>';
		echo '<td width="10" align="center">: </td>';
		echo '<td width="150">'.$row['owner_name'].'</td>';
		echo '</tr>';
		echo '<tr>';
		echo '<td width="150"> Address </td>';
		echo '<td width="10" align="center"> :</td>';
		echo '<td width="150">'.$row['address'].'</td>';
		echo '</tr>';
		echo '<tr>';
		echo '<td width="150"> Tax Payer ID </td>';
		echo '<td width="10" align="center"> :</td>';
		echo '<td width="150">'.$row['id'].' </td>';
		echo '</tr>';
		echo '<tr>';
		echo '<td width="150">Property Detail</td>';
		echo '<td width="10" align="center"> :</td>';
		echo '<td width="150">'.$row['annual_tax'].' </td>';
		echo '</tr>';
		echo '<tr>';
		echo '<td width="150">Annual Tax(Rs.)</td>';
		echo '<td width="10" align="center"> :</td>';
		echo '<td width="150">'.$row['annual_tax'].' </td>';
		echo '</tr>';
		echo '<tr>';
		echo '<td width="150"> Total Arrears(Rs.)</td>';
		echo '<td width="10" align="center"> :</td>';
		echo '<td width="150">'.$row['arrears']. '</td>';
		echo '</tr>';
		echo '</table>';
	} elseif ($_GET['type']=='R') {
		$id = $_GET['id'];
		$query = "SELECT * FROM shop_rental_detail WHERE id = $id";
		$result = database_query($query);
		$row = mysqli_fetch_array($result);
		echo '<table align="center">';
		echo '<tr>';
		echo '<td width="150"> Owner Name </td>';
		echo '<td width="10" align="center">: </td>';
		echo '<td width="150">'.$row['owner_name'].'</td>';
		echo '</tr>';
		echo '<tr>';
		echo '<td width="150"> Owner Address </td>';
		echo '<td width="10" align="center"> :</td>';
		echo '<td width="150">'.$row['owner_address'].'</td>';
		echo '</tr>';
		echo '<tr>';
		echo '<td width="150"> Shop Address </td>';
		echo '<td width="10" align="center"> :</td>';
		echo '<td width="150">'.$row['shop_address'].' </td>';
		echo '</tr>';
		echo '<tr>';
		echo '<td width="150">Shop ID</td>';
		echo '<td width="10" align="center"> :</td>';
		echo '<td width="150">'.$row['id'].' </td>';
		echo '</tr>';
		echo '<tr>';
		echo '<td width="150">Monthly Rental</td>';
		echo '<td width="10" align="center"> :</td>';
		echo '<td width="150">'.$row['monthly_rental'].' </td>';
		echo '</tr>';
		echo '<tr>';
		echo '<td width="150"> Total Arrears(Rs.)</td>';
		echo '<td width="10" align="center"> :</td>';
		echo '<td width="150">'.$row['arrears']. '</td>';
		echo '</tr>';
		echo '</table>';
	}
	}
	
	?>
<h2></h2>
</div>
</div>
<footer
<p style="text-align: center;"> <?php echo (htmlentities("©"));?> Copyright @ 2017 <span id="client">BEMMULLA SUBOFFICE OF ATTANAGALLA PRADESHIYA SABAWA</span><br />
        Designed by <span id="company">AURORA SOFTWARE DEVOLOPERS</span><br /> Contact: +94774454613 <br /> email: aurorasoftdevoloper@gmail.com</p>
</footer>
</body>
</html>