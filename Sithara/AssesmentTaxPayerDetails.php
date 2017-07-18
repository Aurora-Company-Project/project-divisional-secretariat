<?php
	//require_once("access_admin.php");
	include("connect_database.php");
	$confirmation=0;
	?>

<?php
	
	function whileloop($query)
	{
	if ($row=mysqli_fetch_assoc($query)){	
		echo '<table name="display" border="2">';
        echo '<tr>';
        echo '<th>Id</th>';
        echo '<th>Ward No</th>';
        echo '<th>Lane</th>';
        echo '<th>Side</th>';
        echo '<th>Assesment Number</th>';
        echo '<th>Owner Name</th>';
        echo '<th>Address</th>';
        echo '<th> Detail</th>';
        echo '<th>AssPropertyet Value</th>';
        echo '<th>Annual Tax</th>';
        echo '<th>Arreas</th>';
        echo '<th>Current Balance</th>';
        echo '<th></th>';
        echo '</tr>';
		echo "<tr>";
		foreach($row as $key=> $val)
		{
			$id=$row['id'];
			echo  "<td>{$val}</td>";
		}
			
		echo'<td><a href="UpdateAssesmentTaxPayerDetails.php?link='.$id.'">Update</a></td>';
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
	
    if (isset($_POST['search'])) 
	{	$message='';
		$assesmentNumber = $_POST['assesmentNumber'];
		$lane = $_POST['lane'];
		$customerName= $_POST['customerName'];
		$assesmentNoQuery="SELECT * FROM assesment_tax_detail WHERE assesment_no='$assesmentNumber'";
		$laneQuery="SELECT * FROM assesment_tax_detail WHERE lane='$lane'";
		$customerNameQuery="SELECT * FROM assesment_tax_detail WHERE owner_name='$customerName'";
		$assesmentNoAndLaneQuery="SELECT * FROM assesment_tax_detail WHERE assesment_no='$assesmentNumber' AND lane='$lane'";
		$customerNameAndLaneQuery="SELECT * FROM assesment_tax_detail WHERE owner_name='$customerName' AND lane='$lane'";
		$assesmentNoAndCustomerNameQuery="SELECT * FROM assesment_tax_detail WHERE owner_name='$customerName' AND assesment_no='$assesmentNumber'";
		$assesmentNoLaneAndCustomerNameQuery="SELECT * FROM assesment_tax_detail WHERE owner_name='$customerName' AND assesment_no='$assesmentNumber' AND lane='$lane'";
		if((!(is_numeric($assesmentNumber))&& !empty($assesmentNumber)) || ((is_numeric($customerName))&& !empty($customerName) ))
		{
			$message="Enter Valid Details";
		}
		elseif ((empty($assesmentNumber)&&($lane=='none') && empty($customerName)))
		{
			$message="First Enter relevent Details";	
		} else {
			$confirmation=1;
		}
	}
?>
        
		
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Search Assesment Tax Payer Details</title>

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
<h1>Assesment Tax Payer Details</h1>
</div>
<div id="Message">
</div>
<div id="Detail">
	<h3><?php if(isset($_POST['search'])){echo $message;}?></h3>
	<form action="AssesmentTaxPayerDetails.php" id="detail_form" name="detailForm" method="POST">
	<table align="center"> 
        <tr>
            <td width="250" height="35"> <label for="assesmentNumber"> Assesment Number : </label> </td>
            <td height="25"><input type="text" name="assesmentNumber" /> </td>
        </tr>
        <tr>
            <td width="250" height="35"> <label for="lane">Lane : </label> </td>
            <td height="25"><select name="lane">
                                <option value="none">--choose--</option>
                                <option value="VR">Veyangoda Road </option>
                                <option value="NR">Negombo Road </option>
                                <option value="PR">Paaramulla Road </option>
                                <option value="VLR">Weliyadda Road </option>
                                <option value="HR">Heendeniya Road </option>
                                <option value="MR">Mahawela Road </option>
                                <option value="ER">Eluwapitiya Road </option>
                                <option value="BOR">Bodhirukkarama Road </option>
                                <option value="ALR">Aluthgama Road </option>
                                <option value="VIR">Vigada Road </option>
                                <option value="MUR">Mudagamuwa Road </option>
                                <option value="DUR">Station Road </option>
                                <option value="MRR">Maarapola Road </option>
                                <option value="MGR">Magalagoda Road </option>
                                <option value="MDR">Magalagoda Station Road </option>
							</select> </td> 
        </tr>
        <tr>
            <td width="250" height="35"> <label for="customerName">Customer Name : </label> </td>
            <td height="25"><input type="text" name="customerName" /> </td>
        </tr>
    </table>
    <button type='submit' name='search'>Search</button>
    </form>
<?php
	if ($confirmation==1)
		{
			if(!empty($assesmentNumber)&& ($lane=='none') && empty($customerName))
			{
				whileloop(database_query($assesmentNoQuery));
			}
			elseif(empty($assesmentNumber)&& ($lane!='none') && empty($customerName))
			{
				whileloop(database_query($laneQuery));
			}
			elseif(empty($assesmentNumber)&&($lane=='none') && !(empty($customerName)))
			{
				whileloop(database_query($customerNameQuery));
			}
			elseif(!empty($assesmentNumber)&&($lane!='none') && empty($customerName))
			{
				whileloop(database_query($assesmentNoAndLaneQuery));
			}
			elseif(!empty($assesmentNumber)&&($lane=='none') && !(empty($customerName)))
			{
				whileloop(database_query($assesmentNoAndCustomerNameQuery));
			}
			elseif(empty($assesmentNumber)&&($lane!='none') && !(empty($customerName)))
			{
				whileloop(database_query($customerNameAndLaneQuery));
			}
			elseif(!(empty($assesmentNumber))&&($lane!='none') && !(empty($customerName)))
			{
				whileloop(database_query($assesmentNoLaneAndCustomerNameQuery));
			} 
		}
	
	?>

</div>
</div>
<div id="footer">
</div>
</body>
</html>