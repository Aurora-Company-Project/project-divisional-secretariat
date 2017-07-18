<?php
	require_once("access_officer.php");
	$i=0;
	$amount=0;
	include 'connect_database.php';
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

<div id="Headline1" align="center">
  <h1>Secretary Office Bemmulla</h1>
    <h1>Rental Tax Payer Report</h1>
</div>
<div id='getter' class="information">
    <form action="" id="customgetter" method="post">
  		<table><tr><td>
  		Customer ID : </td>
          <td><input type="number" name="search" required="required" placeholder="Search.." /></td></tr>
        <div id="date_getter">
        	<tr><td><label>From :</label></td>
       	  <td><input required="required" type="date" max=<?php echo date("Y-m-d",strtotime('-1 day'))?> name='from_getter' /></td></tr><br/>
        	<tr>
            <td><label>To   :</label></td>
          <td><input  required="required" type="date" max=<?php echo date("Y-m-d",strtotime('-1 day'))?> name='to_getter' /></td></tr>
        </div>
       	<tr height="75"><td></td><div id="btn">
       		<td><button name='getcustom' id="generate" type="submit" value="1">Submit</button></td></tr>
      	</div></table>
    </form>
</div>
<?php if ((isset($_POST['getcustom'])) && (!($_POST['from_getter'] > $_POST['to_getter']))) {
			$search=$_POST['search'];
			$from= $_POST['from_getter'];
			$to=$_POST['to_getter'];
			$query = "SELECT * FROM `shop_rental_detail` WHERE id='$search'";
			$result = database_query($query); 
			$count=0;
			while($row1=mysqli_fetch_array($result)){
				$bool=true;			
				$id=$row1['id'];				
				switch ($count){
						case 0: ?>
                            <table id="custom_details">
                                <tr><td width="150">Owner Name</td> <td align="left"><?php echo $row1['owner_name']?></td></tr>
                                <tr><td width="150">Shop Address</td><td align="left"><?php echo $row1['shop_address']?></td></tr>
                                <tr><td width="150">Tender Value (Rs.)</td><td align="left"><?php echo $row1['tender_value']?></td></tr>
                                <tr><td width="150">Annual Tax (Rs.)</td><td align="left"><?php echo $row1['monthly_rental']?></td></tr>
                                 <tr><td width="150">Arrears (Rs.)</td><td align="left"><?php echo $row1['arrears']?></td></tr>
                                <tr><td width="150">Fines (Rs.)</td><td align="left"><?php echo $row1['fines']?></td></tr>
                            </table>
				
			<?php }
			}
		 	$check_query = "SELECT * FROM `shop_rental_bills` WHERE customer_id='$search' AND date_time BETWEEN '$from' AND '$to' ORDER BY date_time ASC";
			$result1 = database_query($check_query);
			
			while($row=mysqli_fetch_array($result1)){	
					$bool=true;
					switch ($count){
						case 0: 
							$count+=1;	?>
                        	<table class="t1" border="2" id="tb">
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
                                <td align="right"><?php echo $row['payment']; $amount+=$row['payment']; ?></td>
                            </tr>
					<?php }
				 } 
			if ($bool==false) { ?>
                <script> 
          	alert("Please enter the correct Custom ID");
      </script> 
          	<?php  }?>
	</table>	
  <?php if ($bool==true){ ?>  
  <button id="detail" type="button" onclick="myFunction();" target="">Print View</button>
  <?php }} 
  if ((!isset($search) || trim($search) == '')&& (isset($_POST['getcustom']))){ ?>
  <script> 
          	alert("Please enter the Custom ID");
      </script>  
	<?php  } if ((isset($_POST['getcustom'])) && ($_POST['from_getter'] > $_POST['to_getter']) ){ ?>
  <script> 
          	alert("Please select the dates correctly");
      </script>  
		<?php }
            
  ?>
 
 
</div>
<div id='footer'>
<footer
<p style="text-align: center;"> <?php echo (htmlentities("©"));?> Copyright @ 2017 <span id="client">BEMMULLA SUBOFFICE OF ATTANAGALLA PRADESHIYA SABAWA</span><br />
        Designed by <span id="company">AURORA SOFTWARE DEVOLOPERS</span><br /> Contact: +94774454613 <br /> email: aurorasoftdevoloper@gmail.com</p>
</footer></div>
<script>
function myFunction() {
	var blocks=['footer','getter','detail','NavBar']
   	for (y=0; y < blocks.length; y++){
        var x = document.getElementById(blocks[y]);
        if (x.style.display === 'none') {
            x.style.display = 'block';
        } else {
            x.style.display = 'none';
        }
    }
    window.open('RentalCustomReportOfficer.php');
    window.print(); 
}
</script>
</body>
</html>