<?php
	require_once("access_admin.php");
	$i=0;
	$bool=false;
	if(isset($_POST['generate'])){
		$amount=0;
		include 'connect_database.php';
		$generate=$_POST['generate'];
		$date=$_POST['select_date'];
	
		
	}
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


  <div id="Headline1">
    <h1>Secretary Office Bemmulla</h1>
    <h1>Assesment Tax Payer</h1>
    <h1>Daily Report</h1>
  </div>
  <div id="getter" class="information">
    <form action="" method="post" >
      <label>Select Date : </label>
      <input id="select_date" name="select_date" type="date" max=<?php echo date("Y-m-d",strtotime('-1 day'))?> value="<?php if(isset($date)) echo $date; ?>" required="required" />
      <div id="btn">
        <button id="generate" name="generate" type="submit" value="1"> Generate </button>
      </div>
    </form>
  </div>
  <?php if (isset($_POST['generate'])) { ?>
  
  
  <table class="t1" border="2" id="tb">
  <caption><?php echo $_POST['select_date']." "?>Date Report</caption>
  <thead>
    <tr>
      <th width="50" align="center">No</th>
      <th  width="50" align="center">ID</th>
      <th width="75" align="center">Bill No</th>
      <th width="100" align="center">Payment (Rs.)</th>
    </tr></thead>
    <?php 
			$date=$_POST['select_date'];
			$check_query_id = "SELECT * FROM `assesment_tax_bills` WHERE DATE(date_time)='$date'" ;
			$id_result = database_query($check_query_id);
			
			while($row_custom=mysqli_fetch_array($id_result)){ 
				$bool=true;											?>
                <tr>
                   <td><?php $i=$i+1; echo $i; ?></td>
                   <td><?php echo $row_custom['id'] ?></td>
                   <td><?php echo $row_custom['bill_no'] ?></td>
                   <td><?php echo $row_custom['payement']; $amount+=$row_custom['payement']; ?></td>
                 </tr>
	<?php } 
              
			if ($bool==false) { ?>
               	<tr height="50"><td></td><td></td><td></td><td></td></tr>
           	<?php }  ?>
			
			
  </table>
  <table id="table2" height="50">
    <tr>
      <td>No of Rental payers     : <?php echo $i ?></td>
    </tr>
    <tr>
      <td>Total Income : Rs.<?php echo $amount ?></td>
     
    </tr>
  </table>
     <button id="detail" type="button" onclick="myFunction()" target="">Print View</button>
  <?php } ?>
</div>
<div id='footer'>
<footer>
<p style="text-align: center;"> <?php echo (htmlentities("©"));?> Copyright @ 2017 <span id="client">BEMMULLA SUBOFFICE OF ATTANAGALLA PRADESHIYA SABAWA</span><br />
        Designed by <span id="company">AURORA SOFTWARE DEVOLOPERS</span><br /> Contact: +94774454613 <br /> email: aurorasoftdevoloper@gmail.com</p>
</footer>
</div>
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
	window.open('DailyReportTaxAdmin.php');
	window.print();
	
}
</script>
</body>
</html>