
<?php
	require_once("access_officer.php");
	$i=0;
	$amount=0;
	$bool=false;
	if(isset($_POST['generate'])){
		include 'connection.php';
		$month=$_POST['select_date_month'];
		$generate=$_POST['generate'];
		
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
    <h1>Rental Tax Payer</h1>
    <h1>Monthly Report</h1>
</div>
<div id='getter' class="information">
    <form action="" method="post">
            Select Month :
        <input id="select_date" name="select_date_month" type="month" max=<?php echo date("Y-m",strtotime('-1 month'))?> value="<?php if(isset($_POST['select_date_month'])) echo $_POST['select_date_month']; ?>" required="required" />
             <div id="btn">
        <button id="generate" name="generate" type="submit" value="1"> Generate </button>
      </div>
    </form>
</div>


<?php if ((isset($_POST['generate'])) && (isset($_POST['select_date_month']))) {
	
		$month=$_POST['select_date_month'];
		$d = date_parse_from_format("Y-m", $month);
		$dateObj   = DateTime::createFromFormat('!m', $d["month"]);
		$monthName = $dateObj->format('F');
		
		$y = DateTime::createFromFormat("Y-m", $month);
		$year= $y->format("Y");
	 ?>

  	<table class="t1" border="2" id="tb">
    <caption><?php echo $year." ".$monthName." "?> Report</caption>
    <thead>
  	  <tr>
   	    	<td width="50" align="center">No</td>
			<td width="216" align="center">ID</td>
            <td width="251" align="center">Assesment No</td>
            <td width="209" align="center">Payment (Rs.)</td>
        
	  </tr></thead>
        <?php 
		$check_query_customer="SELECT * FROM rental_tax_bills WHERE MONTHNAME(date_time)='$monthName' AND YEAR(date_time)='$year' ORDER BY date_time ASC ";
		$custom_result = mysqli_query($link,$check_query_customer);
		while($row_custom=mysqli_fetch_array($custom_result)){
			$bool=true;							?>
			<tr>
                    <td align="center"><?php $i=$i+1; echo $i; ?></td>
                   	<td align="center"><?php echo $row_custom['id'] ?></td>
                   	<td align="center"><?php echo $row_custom['bill_no'] ?></td>
                   	<td align="right"><?php echo $row_custom['payement']; $amount+=$row_custom['payement']; ?></td>
            </tr>
                      
		<?php } 
		if ($bool==false) { ?>
          	<tr><td></td><td></td><td></td><td></td></tr>
        <?php } ?>
	</table>	
         <table id="table2" height="50">
            <tr>
              <td>No of Rental payers : <?php echo $i ?></td>
            </tr>
            <tr>
              <td>Total Income : Rs.<?php echo $amount ?></td>
            </tr>
         </table>      
    <button id="detail" type="button" onclick="myFunction()" target="">Print View</button>
  
  <?php } ?>

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
    window.open('Monthly Report Final for rental.php');
    window.print() 
}
</script>
<footer
<p style="text-align: center;"> <?php echo (htmlentities("©"));?> Copyright @ 2017 <span id="client">BEMMULLA SUBOFFICE OF ATTANAGALLA PRADESHIYA SABAWA</span><br />
        Designed by <span id="company">AURORA SOFTWARE DEVOLOPERS</span><br /> Contact: +94774454613 <br /> email: aurorasoftdevoloper@gmail.com</p>
</footer>
</body>
</html>