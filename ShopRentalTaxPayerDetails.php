<?php
	function whileloop($query)
	{
		while($row=mysqli_fetch_assoc($query))
		{
			echo "<tr>";
			foreach($row as $key=> $val)
			
			{
				echo  "<td>{$val}</td>";
				$id=$row['id'];				
			}
				
            echo '<td><a href="UpdateShopRentalDetails.php?link='.$id.'">Update</a></td>';
			echo "</tr>";		
	   }
		return;
	}
	include("connect_database.php");
	require_once("access_admin.php");
			
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Search Shop Rental Tax Payer Details</title>
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
<div>
<h2>Shop Rental Tax Payer Details</h2>
	<form action="ShopRentalTaxPayerDetails.php" id="detail_form" name="detailForm" method="POST">
	<table align="center"> 
       
        <tr>
            <td width="250" height="35"> <label for="shopNumber">Shop Number : </label> </td>
            <td height="25"><select name="shopNumber">
                                <option value="none">--choose--</option>
                                <option value="01">01</option>
                                <option value="02">02</option>
                                <option value="03">03</option>
                                <option value="04">04</option>
                                <option value="05">05</option>
                                <option value="06">06</option>
                                <option value="07">07</option>
                                <option value="08">08</option>
                                <option value="09">09</option>
                                <option value="10">10</option>
                                
							</select> </td> 
        </tr>
        <tr>
            <td width="250" height="35"> <label for="ownerName">Owner Name : </label> </td>
            <td height="25"><input type="text" name="ownerName" /> </td>
        </tr>
    </table>
    <button type='submit' name='search'>Search</button>
    </form>
    
    <?php
    if (isset($_POST['search'])) 
	{?>
		<table name="display" border="2">
    	<tr>
        <th>Shop No</th>
        <th>Owner Name</th>
        <th>Owner Address</th>
        <th>Shop Address</th>
        <th>Tender Value</th>
        <th>Annual Tax Value</th>
        <th>Arrears</th>
        <th>Fines</th>
        <th></th>
        </tr>
        <?php
		$shopNumber = $_POST['shopNumber'];
		$ownerName = $_POST['ownerName'];
		$shopNumberQuery="SELECT * FROM shop_rental_detail WHERE id='$shopNumber'";
		$ownerNameQuery="SELECT * FROM shop_rental_detail WHERE owner_name='$ownerName'";
		$shopNumberAndOwnerNameQuery="SELECT * FROM shop_rental_detail WHERE id='$shopNumber' AND owner_name='$ownerName' ";
		
		if($shopNumber!='none' && empty($ownerName))
		{
			whileloop(database_query($shopNumberQuery));
		}
		elseif($shopNumber=='none' && (!empty($ownerName)))
		{
			whileloop(database_query($ownerNameQuery));
		}
		elseif($shopNumber!='none' && (!empty($ownerName)))
		{
			whileloop(database_query($shopNumberAndOwnerNameQuery));
		}
		else
		{
			echo "Enter relevent details";
		}
	}
	?>
    </table>
</body>
</html>