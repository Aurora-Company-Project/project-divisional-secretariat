<?php
	/*require_once("access_admin.php");*/
	$i=0;
	$amount=0;
	include 'connection.php';
	$message='';
	$bool=false;
	if (isset($_POST['getcustom'])){	
		$go=$_POST['getcustom'];
		$search=$_POST['search'];
		
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<script type="text/jscript">
	function getalert(){
		alert('Please select the month');
		}
</script>
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

<div id="Headline1" align="center">
  <h1>Secretary Office Bemmulla</h1>
    <h1>Rental Tax Payer</h1>
    <h1>Rental Custom Report</h1>
</div>
<div class="information">
    <form action="" id="customgetter" method="post">
  		Customer ID : 
          <input type="text" name="search" placeholder="Search.." />
       <div id="btn">
       <button name='getcustom' id="generate" type="submit" value="1">GO</button>
      </div>
    </form>
</div>
<?php if ((isset($_POST['getcustom'])) && (!(!isset($search) || trim($search) == ''))) {
			$search=$_POST['search'];
			$query = "SELECT * FROM `shop_rental_detail` WHERE id='$search'";
			$result = mysqli_query($link,$query); 
			$count=0;
			while($row1=mysqli_fetch_array($result)){
				$bool=true;			
				$id=$row1['id'];				
				switch ($count){
						case 0: ?>
                            <table id="custom_details">
                                <tr><td width="150">Owner Name</td> <td align="right"><?php echo $row1['owner_name']?></td></tr>
                                <tr><td width="150">Shop Address</td><td align="right"><?php echo $row1['shop_address']?></td></tr>
                                <tr><td width="150">Tender Value</td><td align="right"><?php echo $row1['tender_value']?></td></tr>
                                <tr><td width="150">Annual Tax Value</td><td align="right"><?php echo $row1['annual_tax_val']?></td></tr>
                                 <tr><td width="150">Arrears</td><td align="right"><?php echo $row1['arrears']?></td></tr>
                                <tr><td width="150">Fines</td><td align="right"><?php echo $row1['fines']?></td></tr>
                            </table>
				
				
			<?php } $check_query = "SELECT * FROM $id";
			$result1 = mysqli_query($link,$check_query);
			
			while($row=mysqli_fetch_array($result1)){	
					$bool=true;
					switch ($count){
						case 0: 
							$count+=1;	?>
                        	<table border="2" id="tb">
                                  <tr>
                                     <td width="216" align="center">No</td>
                                    <td width="216" align="center">Date</td>
                                    <td width="251" align="center">Bill No</td>
                                    <td width="209" align="center">Payment (Rs.)</td>
                                  </tr>
                                  <tr>
                                        <td align="center"><?php $i=$i+1; echo $i; ?></td> 
                                        <td align="center"><?php echo $row['date'] ?></td>
                                        <td align="center"><?php echo $row['bill_no'] ?></td>
                                        <td align="right"><?php echo $row['payment']; $amount+=$row['payment']; ?></td>
                                   </tr>
						<?php case 1:	?>
							<tr>
                                <td align="center"><?php $i=$i+1; echo $i; ?></td> 
                                <td align="center"><?php echo $row['date'] ?></td>
                                <td align="center"><?php echo $row['bill_no'] ?></td>
                                <td align="right"><?php echo $row['payment']; $amount+=$row['payment']; ?></td>
                            </tr>
					<?php }
				 } }
			if ($bool==false) { ?>
               	<div id="message"><p>Please enter the correct Custom ID </p>
          	<?php } ?>
	</table>	
    
  <button id="detail" type="button" onclick="myFunction();" target="">Print View</button>
  <?php } 
  if ((!isset($search) || trim($search) == '')&& (isset($_POST['getcustom']))){ ?>
	  <p id="message"><?php echo "Please enter the Custom ID" ?></p></div>
	<?php  }
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
<div id="footer"></div>

</body>
</html>