<?php
	require_once("access_officer.php");

	if(isset($_POST['generate'])){
		include 'connect_database.php';
		$month=$_POST['month'];
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
    <h1>Assesment Tax Payer</h1>
    <h1>Quarter Report</h1>
</div>
<div id="getter" class="information">
    <form action="" method="post">
    <table id="new_table" class="new_table">
    <tr><td> Year :</td> 
        <td>
		<select name="year"> 
		<?php 
		$year = 2017;
		while($year <=date('Y')) {
			echo '<option value='.$year.'>'.$year.'</option>';
			$year+=1;	
		}
		?>
            </select>
        </td></tr>
        <tr><td>    Select Quarter :</td>
        <td><select name="month">
          <option value="None">None</option>
          <option <?php if (date('m')<3) echo 'disabled';?> value="3">January-March</option>
          <option  <?php if (date('m')<6) echo 'disabled';?> value="6">April-June</option>
          <option  <?php if (date('m')<9) echo 'disabled';?> value="9">July-September</option>
          <option <?php if (date('m')!=12) echo 'disabled';?> value="12">October-December</option>
        </select> <br/></td>
        </tr>
      </table>
             <div id="btn">
        <button id="generate" name="generate" type="submit" value="1"> Generate </button>
      </div>
    </form>

</div>
<?php if ((isset($_POST['generate'])) &&($month!='None') ) { ?>
		
        <?php if($_POST['month']==3){
        	$qw="January-March";
        }
        if($_POST['month']==6){
   	    	$qw="April-June";
       	}
        if($_POST['month']==9){
       		$qw="July-September";
        }
        if($_POST['month']==12){
        	$qw="October-December";
       	}?>
    
        
	<?php 
		$bool=false;
		$i=0;				?>
        
            <table class="t1" border="2" id="tb">
            <caption><?php echo $qw." " ?>Quarter Report<?php " ".$_POST['year'] ?></caption>
            <thead>
              <tr>
                <th>No</th>
                <th>ID</th>
                <th>Assesment No</th>
                <th>Owner Name</th>
                <th>Amount in quarter (Rs.)</th>
                <th>Total Payment (Rs.)</th>
              </tr>   
              </thead>     
              <tbody>    
				<?php 
				$i=0;
				$t_amount=0;
				$e_amount=0;	 					
 				$id_check_query = "SELECT * FROM assesment_tax_detail ORDER BY annual_tax ASC";
				$id_result = database_query($id_check_query);
				while($id_row=mysqli_fetch_array($id_result)){
					$year=$_POST['year'];
					$id=$id_row['id'];
					$bool=true;
					switch($_POST['month']){
						case 3:
							$start_date=$year.'-'.'1'.'-'.'1'; 
							$end_date=$year.'-'.'4'.'-'.'1'; 
							break;
						case 6:
							$start_date=$year.'-'.'3'.'-'.'31'; 
							$end_date=$year.'-'.'7'.'-'.'1'; 
							break;
						case 9:
							$start_date=$year.'-'.'6'.'-'.'31'; 
							$end_date=$year.'-'.'10'.'-'.'1';
							break; 
						case 12:
							$start_date=$year.'-'.'9'.'-'.'30'; 
							$end_date=$year.'-'.'12'.'-'.'31';
							break; 
					}
					
					$check_query = "SELECT * FROM assesment_tax_bills WHERE  id='$id' AND YEAR(date_time)='$year' AND DATE(date_time) BETWEEN '$start_date' AND '$end_date' ";
					
					$balance_result = database_query($check_query);
					$amount=0;
					$i+=1;
					while($row=mysqli_fetch_array($balance_result)){
						$amount+=$row['payement'];					 
				 	}?> 
					
					<tr>
						<td><?php echo $i; ?></td>
						<td><?php echo $id_row['id'] ?></td>
						<td><?php echo $id_row['assesment_no'] ?></td>
						<td><?php echo $id_row['owner_name']; ?></td>
                        <td><?php echo $id_row['annual_tax']/4; $e_amount+=$id_row['annual_tax']/4; ?></td>
                        <td><?php echo $amount; $t_amount+=$amount;  ?></td>
					</tr>
                    
				<?php }		
				if ($bool==false) { ?>
                	<table border="2" id="tb">
						<tr><td></td><td></td><td></td><td></td><td></td></tr>
                    </table>
                 <?php } ?> 
     </tbody>
     </table>
     </table>	
         <table id="table2" height="50">
            <tr>
              <td>Expected Amount: Rs.</td><td width="100" align="right"> <?php echo $e_amount ?></td>
            </tr>
            <tr>
              <td>Total Income : Rs.</td><td width="100" align="right"><?php echo  $t_amount ?></td>
            </tr>
         </table>  
     
  <button name="detail" type="button" id="detail" onclick="myFunction();" target="">Print View</button>
<?php }
	if ((isset($_POST['generate'])) && ($month=='None')) { ?>
		<script>
        	alert("Please select the quarter");
        </script>
		
	<?php 	}
	
	
 ?>
  

</div>
<div id='footer'>
<footer>
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
    window.open('QuarterReportOfficer.php');
    window.print() 
    
}
</script>
</body>
</html>