<?php
	require_once("connect_database.php");
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>View Policies</title>
	<link href= "CSS/Policiess.css"type="text/css" rel="stylesheet">
	<link href= "CSS/View policies.css" type="text/css" rel="stylesheet">
    <link href="CSS/LayoutHome.css" rel="stylesheet" type="text/css" />
	<link href="CSS/Menu.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="Holder">
    <div id="NavBar"> 
        <nav>
            <ul>
                <li> <a href="AccountAdmin.php"> Home </a></li>
                <li class="DropDwnElmnt"> <a href="#"> Add Tax Payer</a>
                <div class="DropDwnCntnt">
                <ul class="DrpLst">
                    <li> <a href="AddAssesmentTaxPayer.php"> Assesment Tax Payer </a> </li>
                    <li> <a href="AddShopRentalPayer.php"> Shop Tax Payer </a> </li>
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
                    <li><a href="ViewPolicies.php">View Policies</li>
                    <li><a href="UpdatePolicies.php">Update Policies</li>
                </ul>
                </div>
                </li>
                <li class="DropDwnElmnt"> <a href="#"> Manage Accounts </a> 
                <div class="DropDwnCntnt">
                <ul class="DrpLst">
                    <li> <a href="#"> Assesment Tax Accounts </a> </li>
                    <li> <a href="#"> Shop Rental Accounts </a> </li>
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
        <div class="Heading">
            <h1>View Policies<h1>
        </div>	
            
        
        <div class="Rates">
            <?php
                $sql= "select * from policies";
                $row=mysqli_fetch_assoc(database_query($sql));
            ?>
            
            <p><?php echo $row['year'] ?>Secretary of the Pradeshiya saba is <?php echo $row['secretary_of_the_pradeshiya_saba'] ?>. Currently using Gazettes number is <?php echo $row['gazette_no']?> and the date is <?php echo $row['gazette_date'] ?> </p>
            <h2>Assesment Taxes<h2>
            <ol>
                <li>Assesment Tax Rate is <?php echo $row['assesment_tax_rate']?></li>
                <li>Discount for who pay the full payment before the january 31st is <?php echo $row['discount_for_full_annual_payment']?></li>
                <li>Discount for who pay the relevent quater payment before the gazetted date <?php echo $row['discount_for_full_quater_payment']?></li>
            </ol>
            <h2>Shop Rental Taxes</h2>
            <ol>
            <li>Monthly fine is <?php echo $row['shop_rental_fine_rate']?></li>
            </ol>
            </div>
        
                
        <div class="link">	
            <a href="Other link" target="_blank">Rates Tax Policies</a><br/>
            <a href="Other link" target="_blank">Shop Rental Tax Policies</a>
        </div>
        <div class="bttn_control">
            <a href="UpdatePolicies.php"><button id="Btn" type="submit" name="updatePolicies">Update Policies</button></a>
        </div>
    </div> 
    </div>
    <div id="footer">
    </div>
</body>
</html>
