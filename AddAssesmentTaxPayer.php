<?php
	require_once("Access.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="CSS/AddCustomer.css" rel="stylesheet" type="text/css" />
<link href="CSS/Menu.css" rel="stylesheet" type="text/css" />
<title>Home</title>
</head>
<body>
<div id="Holder">
<div id="Header"> </div>
<div id="NavBar"> 
	<nav>
		<ul>
			<li> <a href="AccountOfficer.php"> Home </a></li>
			<li class="DropDwnElmnt"> <a href="#"> Tax Payments </a> 
            	<div class="DropDwnCntnt">
                <ul class="DrpLst">
            		<li> <a href="#"> Assesment Tax </a> </li>
                	<li> <a href="#"> Shop Tax </a> </li>
                </ul>
                </div>
            </li>
			<li class="DropDwnElmnt"> <a href="#"> Reports </a>  
            <div class="DropDwnCntnt">
            <ul class="DrpLst">
            	<li> <a href="#"> Annual Report </a> </li>
                <li> <a href="#"> Monthly Report </a> </li>
                <li> <a href="#"> Tax Payer Report </a> </li>
            	<li> <a href="#"> Custom Report </a> </li>
            </ul>
            </div> 
            </li>
            <li class="DropDwnElmnt"> <a href="#"> View Policies </a>
            <div class="DropDwnCntnt">
            <ul class="DrpLst">
            	<li> <a href="#"> Assesment Tax Policies </a> </li>
                <li> <a href="#"> Shop Rental Policies </a> </li>
            </ul>
            </div>
            </li>
            <li> <a href="#"> Account Settings </a> </li>
		</ul>
	</nav>
</div>
<div id="Content"> 
<div id="PageHeading">
  <h1>Welcome! </h1>
</div>
<div id="Message">
<h2> Provide details of the tax payer. </h2>
<h2> Fill all the data correctly. </h2>
</div>
<div id="Detail">
<h2 class="DetailHeader2"> Assement tax payer apply form. </h2>
<form action="DetailConfirmation.php" method="post" id="AssementTaxPayerDetail">
<table align="left">
<tr>
<td  height="35" width="300"></td> 
</tr>
</table>
</form>
</div>
</div>
<div id="footer"></div>
</div>
</body>
</html>