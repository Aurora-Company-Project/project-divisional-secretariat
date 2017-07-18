<?php
	function whileloop($query)
	{
        if ($row=mysqli_fetch_assoc($query))
		{  
			echo '<table name="display" border="2">';
			echo '<tr>';
			echo '<th>Shop No</th>';
			echo '<th>Owner Name</th>';
			echo '<th>Owner Address</th>';
			echo '<th>Shop Address</th>';
			echo '<th>Annual Tax Value</th>';
			echo '<th>Arrears</th>';
			echo '<th>Fines</th>';
			echo '<th></th>';
			echo '</tr>';
			echo "<tr>";
			foreach($row as $key=> $val)
			{
				$id=$row['id'];
				echo  "<td>{$val}</td>";
			}
				
			echo'<td><a href="UpdateShopRentalDetails.php?link='.$id.'">Update</a></td>';
			echo "</tr>";
	
			while($row=mysqli_fetch_assoc($query))
			{
				echo "<tr>";
				foreach($row as $key=> $val)
				
				{
					$id=$row['id'];
					echo  "<td>{$val}</td>";
				}
					
				echo'<td><a href="UpdateAssesmentTaxPayerDetails.php?link='.$id.'">Update</a></td>';
				echo "</tr>";		
		   }
		} 
		else 
		{
			$message="There's no such customer" ;
		}
		echo '</table>';
		return;
	}
	?>
<?php
	include("connect_database.php");
	//require_once("access_admin.php");
		$confirmation=0;
	if (isset($_POST['search'])) 
	{
		$message='';
		$shopNumber = $_POST['shopNumber'];
		$ownerName = $_POST['ownerName'];
		$shopNumberQuery="SELECT * FROM shop_rental_detail WHERE id='$shopNumber'";
		$ownerNameQuery="SELECT * FROM shop_rental_detail WHERE owner_name='$ownerName'";
		$shopNumberAndOwnerNameQuery="SELECT * FROM shop_rental_detail WHERE id='$shopNumber' AND owner_name='$ownerName' ";
		if (is_numeric($ownerName)&& !empty($ownerName) )
		{
			$message="Enter Valid Details";
		}
		elseif (empty($ownerName)&& ($shopNumber=='none'))
		{
			$message="First Enter relevent Details";	
		}
		else
		{	
			$confirmation=1;
		}
	}
?>
			
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
<div id="Content">
<div id="PageHeading">
<h1>Shop Rental Tax Payer Details</h1>
</div>
<div id="Message">
</div>
<div id="Detail">
<h3><?php if(isset($_POST['search'])){echo $message;}?></h3>
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
    if($confirmation==1)
	{
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
		
	}
?>
    
    </div>
</div>
<div id="footer">
</div>
</body>
</html>