<?php
	require_once("access_officer.php");
	$bool=false;
	if(isset($_POST['generate'])){
		$amount=0;
		include 'connection.php';
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
<title>Home</title>
</head>
<body>
<div id="Holder">
<div id="Header"> </div>
<div id="NavBar"> 
	<nav>
		<ul>
			<li> <a href="AccountOfficer.php"> Home </a></li>
			<li class="DropDwnElmnt"> <a href="#"> Tax Payments </a> 
            	<div class="DropDwnCntnt">
                <ul class="DrpLst">
            		<li> <a href="#"> Assesment Tax </a> </li>
                	<li> <a href="#"> Shop Tax </a> </li>
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
            <li class="DropDwnElmnt"> <a href="#"> View Policies </a></li>
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
<div id="Content"> 



<div id="Headline1">
	<h1>Secretary Office Bemmulla</h1>
	<h1>Assesent Tax Payer</h1>
  	<h1>Daily Report</h1>
</div>

<div class="information">
    <form action="" method="post" >
            <label>Select Date : </label>
              <input id="select_date" name="select_date" type="date" value="<?php if(isset($date)) echo $date; ?>" required="required" />
      <br/>
            <div id="btn"> <button id="generate" name="generate" type="submit" value="1"> Generate 	</button></div>
    </form>
</div>

<?php if (isset($_POST['generate'])) { ?>
	<div id="topic"><p>Daily Report</p></div>
    <div class="table1">
    <table class="table1" width="700" border="2" align="center">
		<tr>
			<td>ID</td>
            <td>Assesment No</td>
            <td>Payment</td>
		</tr>
        <?php 
			$check_query_id = "SELECT `id` FROM `assesment_tax_detail`" ;
			$id_result = mysqli_query($link,$check_query_id);
			$date=$_POST['select_date'];
			
			while($row=mysqli_fetch_array($id_result)){
				$id=$row['id'];
				$check_query_customer="SELECT * FROM `$id` WHERE date='$date'";
				$custom_result = mysqli_query($link,$check_query_customer);
				while($row_custom=mysqli_fetch_array($custom_result)){ ?>
					<tr>
                    	<td><?php echo $row['id'] ?></td>
                    	<td><?php echo $row_custom['bill_no'] ?></td>
                    	<td><?php echo $row_custom['payment']; $amount+=$row_custom['payment']; ?></td>
                    </tr>
			<?php } 
		}  ?>
        <tr><td>Total Income</td><td></td> <td ><?php echo $amount ?> </td></tr>
        </table> </div>		
  	<div id="detail">
  		<button type="button">Save</button>
    </div>
  
    <div id="hyperlink" >
    	<a href="Monthly Report.php" target="_blank" onclick="window.open('Monthly Report.php').print() " type="button">Print Report</a>
    </div>	 
<?php } ?>



</div>
<div id="footer"></div>
</div>
</body>
</html>