<?php
	/*require_once("access_officer.php");
		$id = $_GET['link'];
		require_once('connect_database.php');
		$query= "select * FROM assesment_tax_detail WHERE id= '$id'";
		$detail = mysqli_fetch_array(database_query($query));
		$detail["arrears"];	
		
		if(($_POST['amount']>= $detail['anual_tax']) && date("d")<=10))
			{
				$discount = 0.1*$detail['anual_tax'];
			}
		elseif ($_POST['amount']>= ($detail['anual_tax']/4))
			{
				if (((date("d")<31)&& (date("m")==1)) | ((date("d")<30)&& (date("m")==6)) | ((date("d")<30)&& (date("m")==9)) | ((				date("d")<31)&& (date("m")==12)))
				{
					$discount = 0.05*$detail['anual_tax'];
				} 
			}
		else
		{
			$discount = 0;
		}*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="CSS/LayoutHome.css" rel="stylesheet" type="text/css" />
<link href="CSS/Menu.css" rel="stylesheet" type="text/css" />
<title>Home</title>
<style type="text/css">
	table {; alignment-baseline:middle ; position:absolute ;}
	td {width:500 ; height:50 ; border-width: 2 ; alignment-adjust:central ; font-size: 32px ;}
	#button {alignment-adjust:central;}
</style>
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
            		<li> <a href="#"> Assesment Tax </a> </li>
                	<li> <a href="#"> Shop Tax </a> </li>
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

</div>
<div id="Message">
	
<form action="Correctedpay.php" method="post" id="Incopay">
<h3>Select payer type:</h3>
<br />
Rental payer:<input type="radio" name="payertype" value="rentalpayer"/>
Assesment Tax payer:<input type="radio" name="payertype" value="taxpayer"/>
<table > 	
	<tr> <td>
<label for="bill"> Bill_No: </label>
	</td><td> 
<input type="number" id="bill" name="bill" /> <br/>
	</td></td></tr>
</table>
<button type="submit" form="PayForm" name="Paid" > Search </button>
</form>

</div>
<div id="Detail">
</div>

</div>
<div id="footer"></div>
</div>
</body>
</html><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>