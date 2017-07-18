<?php
	require_once("access_admin.php");
	$i=0;
	$amount=0;
	include 'connection.php';
	$message='';
	$bool=false;
	if (isset($_POST['getcustom'])){	
		$go=$_POST['getcustom'];
		$search=$_POST['search'];}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="CSS/LayoutHome.css" rel="stylesheet" type="text/css" />
<link href="CSS/Menu.css" rel="stylesheet" type="text/css" />
<link href="CSS/Report.css" rel="stylesheet"  type="text/css" />
<link href="CSS/table.css" rel="stylesheet"  type="text/css" />
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
  <h1>Secretary Office Bemmulla</h1>
    <h1>Rental Tax Payer Report</h1>
</div>
<div id='getter' class="information">
    <form action="" id="customgetter" method="post">
  		Customer ID : 
          	<input type="text" name="search" placeholder="Search.." />
        <div id="date_getter">
        	<label>From :</label><input required="required" type="date" max=<?php echo date("Y-m-d",strtotime('-1 day'))?> name='from_getter' /><br/>
        	<label>To   :</label><input required="required" type="date" max=<?php echo date("Y-m-d",strtotime('-1 day'))?> name='to_getter' />
        </div>
       	<div id="btn">
       		<button name='getcustom' id="generate" type="submit" value="1">Submit</button>
      	</div>
    </form>
</div>
<?php if ((isset($_POST['getcustom'])) && (!(!isset($_POST['from_getter']) || trim($_POST['from_getter']) == '')) && (!(!isset($search) || trim($search) == '')) && (!(!isset($_POST['to_getter']) || trim($_POST['to_getter']) == '')) && !($_POST['from_getter'] > $_POST['to_getter'])) {
			$search=$_POST['search'];
			$from= $_POST['from_getter'];
			$to=$_POST['to_getter'];
			$query = "SELECT * FROM `shop_rental_detail` WHERE id='$search'";
			$result = mysqli_query($link,$query); 
			$count=0;
			while($row1=mysqli_fetch_array($result)){
				$bool=true;			
				$id=$row1['id'];				
				switch ($count){
						case 0: ?>
                            <table id="custom_details">
                                <tr><td width="150">Owner Name</td> <td align="left"><?php echo $row1['owner_name']?></td></tr>
                                <tr><td width="150">Shop Address</td><td align="left"><?php echo $row1['shop_address']?></td></tr>
                                <tr><td width="150">Tender Value</td><td align="left"><?php echo $row1['tender_value']?></td></tr>
                                <tr><td width="150">Annual Tax Value</td><td align="left"><?php echo $row1['monthly_rental']?></td></tr>
                                 <tr><td width="150">Arrears</td><td align="left"><?php echo $row1['arrears']?></td></tr>
                                <tr><td width="150">Fines</td><td align="left"><?php echo $row1['fines']?></td></tr>
                            </table>
				
			<?php }
			}
		 	$check_query = "SELECT * FROM `rental_tax_bills` WHERE id='$search' AND date_time BETWEEN '$from' AND '$to' ORDER BY date_time ASC";
			$result1 = mysqli_query($link,$check_query);
			
			while($row=mysqli_fetch_array($result1)){	
					$bool=true;
					switch ($count){
						case 0: 
							$count+=1;	?>
                        	<table border="2" id="tb">
                                  <tr>
                                     <th>No</th>
                                    <th>Date</th>
                                    <th>Bill No</th>
                                    <th>Payment (Rs.)</th>
                                  </tr>
                        
						<?php case 1:	?>
							<tr>
                                <td align="center"><?php $i=$i+1; echo $i; ?></td> 
                                <td align="center"><?php echo $row['date_time'] ?></td>
                                <td align="center"><?php echo $row['bill_no'] ?></td>
                                <td align="right"><?php echo $row['payement']; $amount+=$row['payement']; ?></td>
                            </tr>
					<?php }
				 } 
			if ($bool==false) { ?>
                <script> 
          	alert("Please enter the correct Custom ID");
      </script> 
          	<?php  }?>
	</table>	
    
  <button id="detail" type="button" onclick="myFunction();" target="">Print View</button>
  <?php } 
  if ((!isset($search) || trim($search) == '')&& (isset($_POST['getcustom']))){ ?>
	  <script> 
          	alert("Please enter the Custom ID");
      </script>  
	<?php  } if ((isset($_POST['getcustom'])) && (!isset($_POST['from_getter']) || trim($_POST['from_getter']) == '') && (!isset($search) || trim($search) == '') && (!isset($_POST['to_getter']) || trim($_POST['to_getter']) == '')){ ?>
		 <script> 
          	alert("Please select the dates");
      </script>  
		<?php }
            
  ?>
 
 
</div>
<script>
function myFunction() {
	var blocks=['getter','detail','NavBar']
   	for (y=0; y < blocks.length; y++){
        var x = document.getElementById(blocks[y]);
        if (x.style.display === 'none') {
            x.style.display = 'block';
        } else {
            x.style.display = 'none';
        }
    }
    window.open('Rental custom report.php');
    window.print() 
    
}
</script>
<footer
<p style="text-align: center;"> <?php echo (htmlentities("©"));?> Copyright @ 2017 <span id="client">BEMMULLA SUBOFFICE OF ATTANAGALLA PRADESHIYA SABAWA</span><br />
        Designed by <span id="company">AURORA SOFTWARE DEVOLOPERS</span><br /> Contact: +94774454613 <br /> email: aurorasoftdevoloper@gmail.com</p>
</footer>
</body>
</html>