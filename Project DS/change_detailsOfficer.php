
<?php
	require_once("access_admin.php");
	$i=0;
	$amount=0;
	$bool=false;
	
	include 'connect_database.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="CSS/LayoutHome.css" rel="stylesheet" type="text/css" />
<link href="CSS/Menu.css" rel="stylesheet" type="text/css" />
<link href="CSS/change_detail.css" rel="stylesheet" type="text/css" />

<title>Home</title>
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

<div id="Headline1" align="center">
  <h1>Edit Account</h1>
</div>
<div id='getter' class="information">
	<table><tr><td width="500" align="center">
    <form action="" method="post">
           <label>User Name </label><br/>
           <input id='user_name' name="user_name" type="text" required="required" placeholder="Old User Name" /><br/>
            <label>New User Name </label><br/>
           <input id='new_user_name' name="new_user_name" type="text" required="required" placeholder="New User Name" /><br/>
            <button id="submit_username" name="submit_username" type="submit" value="1"> Submit </button>
    </form>
    </td>
    <td width="500" align="center">
    <form action="" method="post">
           <label>User Password </label><br/>
           <input id='user_password' name="user_password" type="password" required="required" placeholder="Old Password" /><br/>
            <label>New User Name </label><br/>
           <input id='new_password' name="new_password" type="password" required="required" placeholder="New Password" /><br/>
            <button id="submit_password" name="submit_password" type="submit" value="1"> Submit </button>
    </form>
    </td></tr>
</table>    
</div>
<?php 
	if(isset($_POST['submit_username'])){
		$bool=false;
		$old_name=$_POST['user_name'];
		$new_name=$_POST['new_user_name'];
		$check_query_customer="SELECT * FROM user_accounts WHERE user_name='$old_name'";
		$custom_result = database_query($check_query_customer);
		while($row_custom=mysqli_fetch_array($custom_result)){
			$bool=true;
			$update_query="UPDATE user_accounts SET user_name='$new_name' WHERE user_name='$old_name'";
			database_query($update_query);	
		}if ($bool==false){ ?>
			<script>alert("Please enter your username correctly")</script>
			<?php }
	}
?>
<?php 
	if(isset($_POST['submit_password']) && !((8>strlen($_POST['new_password']) or strlen($_POST['new_password'])>64) )){
		$bool1=false;
		$old_password=$_POST['user_password'];
		$new_password=$_POST['new_password'];
		
		$check_query_customer="SELECT * FROM user_accounts WHERE pwd=SHA('$old_password')";
		$custom_result = database_query($check_query_customer);
		while($row_custom=mysqli_fetch_array($custom_result)){
			$bool1=true;
			$update_query="UPDATE user_accounts SET pwd=SHA('$new_password') WHERE pwd=SHA('$old_password')";
			database_query($update_query);	
		}
	if ($bool1==false){ ?>
    	<script>alert("Please enter your password correctly")</script>
	<?php }
	}if((isset($_POST['submit_password']) && ((8>strlen($_POST['new_password']) or strlen($_POST['new_password'])>64) ))){ ?>
    	<script>alert('Password length should be between 8 to 64.')</script>
		
		<?php }
?>

</div>

<div id='footer'>
<footer>
<p style="text-align: center;"> <?php echo (htmlentities("©"));?> Copyright @ 2017 <span id="client">BEMMULLA SUBOFFICE OF ATTANAGALLA PRADESHIYA SABAWA</span><br />
        Designed by <span id="company">AURORA SOFTWARE DEVOLOPERS</span><br /> Contact: +94774454613 <br /> email: aurorasoftdevoloper@gmail.com</p>
</footer></div>

</body>
</html>