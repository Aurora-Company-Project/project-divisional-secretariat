<?php
	//require_once("access_admin.php");
	$i=0;
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
<link href="CSS/Report.css" rel="stylesheet"  type="text/css" />
<title>Home</title>
</head>
<body>
<div id="Holder">
<div id="Header"> </div>
<div id="NavBar"> 
	<nav>
		<ul>
			<li> <a href="AccountAdmin.php"> Home </a></li>
            <li class="DropDwnElmnt"> <a href="#"> Add Tax Payer</a>
            <div class="DropDwnCntnt">
            <ul class="DrpLst">
            	<li> <a href="AddAssesmentTaxPayer.php? <?php //echo SID;?>"> Assesment Tax Payer </a> </li>
                <li> <a href="AddShopRentalPayer.php? <?php //echo SID;?>"> Shop Tax Payer </a> </li>
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
            <li class="DropDwnElmnt"> <a href="#"> Change Policies </a></li>
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
<div id="Content"> 


  <div id="Headline1">
    <h1>Secretary Office Bemmulla</h1>
    <h1>Rental Tax Payer</h1>
    <h1>Daily Report</h1>
  </div>
  <div id="getter" class="information">
    <form action="" method="post" >
      <label>Select Date : </label>
      <input id="select_date" name="select_date" type="date" value="<?php if(isset($date)) echo $date; ?>" required="required" />
      <div id="btn">
        <button id="generate" name="generate" type="submit" value="1"> Generate </button>
      </div>
    </form>
  </div>
  <?php if (isset($_POST['generate'])) { ?>
  <table border="2" id="tb">
    <tr>
      <td width="50" align="center">No</td>
      <td width="216" align="center">ID</td>
      <td width="251" align="center">Bill No</td>
      <td width="209" align="center">Payment (Rs.)</td>
    </tr>
    <?php 
			$check_query_id = "SELECT `id` FROM `shop_rental_detail`" ;
			$id_result = mysqli_query($link,$check_query_id);
			$date=$_POST['select_date'];
			
			while($row=mysqli_fetch_array($id_result)){
				$id=$row['id'];
				$check_query_customer="SELECT * FROM `$id` WHERE date='$date'";
				$custom_result = mysqli_query($link,$check_query_customer);
				while($row_custom=mysqli_fetch_array($custom_result)){ 
					$bool=true;											?>
                    <tr>
                      <td align="center"><?php $i=$i+1; echo $i; ?></td>
                      <td align="center"><?php echo $row['id'] ?></td>
                      <td align="center"><?php echo $row_custom['bill_no'] ?></td>
                      <td align="right"><?php echo $row_custom['payment']; $amount+=$row_custom['payment']; ?></td>
                    </tr>
			<?php } 
                }
				if ($bool==false) { ?>
                	<tr><td></td><td></td><td></td><td></td></tr>
               	<?php } ?>
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
	window.open('Daily Report final for rental.php');
	window.print();
	
}
</script>

<div id="footer"></div>
</div>
</body>
</html>