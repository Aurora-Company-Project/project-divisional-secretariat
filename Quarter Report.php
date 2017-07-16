<?php
	//require_once("access_admin.php");

	if(isset($_POST['generate'])){
		include 'connection.php';
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
    <h1>Quarter Report</h1>
</div>
<div id="getter" class="information">
    <form action="" method="post">
            Select Quarter :
        <select name="month">
          <option value="None"">None</option>
          <option value="January-March">January-March</option>
          <option value="April-June">April-June</option>
          <option value="July-September">July-September</option>
          <option value="October-December">October-December</option>
        </select> <br/>
             <div id="btn">
        <button id="generate" name="generate" type="submit" value="1"> Generate </button>
      </div>
    </form>
</div>
<?php if ((isset($_POST['generate'])) && ($month!='None')) { ?>

		<div class="table_header">
            <p><?php echo $_POST['month']." " ?>Quarter Report</p>
        </div>
        
	<?php 
		$bool=false;
		$i=0;									?>
        
        <?php function create_header($amount1,$amount2){?>
        	<div class="subtable_header">
            <p><?php echo "Current Balance from " . $amount1 . " to " . $amount2; ?></p>
        	</div>
            <table border="2" id="tb">
              <tr>
                <td width="50" align="center">No</td>
                <td width="216" align="center">ID</td>
                <td width="251" align="center">Assesment No</td>
                <td width="209" align="center">Owner Name</td>
                <td width="209" align="center">Address</td>
                <td width="209" align="center">Arrears (Rs.)</td>
                <td width="209" align="center">Amount to pay in this quarter (Rs.)</td>
                <td width="209" align="center">Current Balance (Rs.)</td>
              </tr>
           	<?php }
				function create_table($i,$id,$assesment_no,$owner_name,$address,$arrears,$amount,$current_bal){ ?>
					<tr>
						<td align="center"><?php echo $i; ?></td>
						<td align="center"><?php echo $id ?></td>
						<td align="center"><?php echo $assesment_no ?></td>
						<td align="center"><?php echo $owner_name; ?></td>
						<td align="center"><?php echo $address ?></td>
						<td align="center"><?php echo $arrears ?></td>
                        <td align="center"><?php echo $amount ?></td>
                        <td align="center"><?php echo $current_bal ?></td>
					</tr>
				<?php }	 					
            
				
                $check_query = "SELECT * FROM assesment_tax_detail ORDER BY current_bal ASC";
                $balance_result = mysqli_query($link,$check_query);
                $i=0;
				$select=0;
                while($row=mysqli_fetch_array($balance_result)){
					$bool=true;
					$i=$i+1; 
                    $balance=$row['current_bal'];
					if ($balance<1000){
						switch($select){
							case 0:
								create_header(0,1000);
								$select=1;
							case 1:
								create_table($i,$row['id'], $row['assesment_no'],$row['owner_name'],$row['address'],$row['arrears'] ,$row['annual_tax']/4,$row['current_bal']);
							}
						}
					else if ($balance<3000){ 
									?>
						</table>
           
						<?php 
							switch($select){
							case 1:
								create_header(1000,3000);
								
								$select=0;
							case 0:
								create_table($i,$row['id'], $row['assesment_no'],$row['owner_name'],$row['address'],$row['arrears'] ,$row['annual_tax']/4,$row['current_bal']);
							}
						}
					else if ($balance<5000){ ?>
						</table>

						<?php 
							switch($select){
							case 0:
								create_header(3000,5000);
								$select=1;
							case 1:
								create_table($i,$row['id'], $row['assesment_no'],$row['owner_name'],$row['address'],$row['arrears'] ,$row['annual_tax']/4,$row['current_bal']);
							}
						}
					else if ($balance<10000){	?>
						</table>

						<?php 
							switch($select){
							case 1:
								create_header(5000,10000);
								
								$select=0;
							case 0:
								create_table($i,$row['id'], $row['assesment_no'],$row['owner_name'],$row['address'],$row['arrears'] ,$row['annual_tax']/4,$row['current_bal']);
							}
						}
					else if ($balance<25000){?>
						</table>

						<?php 
							switch($select){
							case 0:
								create_header(10000,25000);
								
								$select=1;
							case 1:
								create_table($i,$row['id'], $row['assesment_no'],$row['owner_name'],$row['address'],$row['arrears'] ,$row['annual_tax']/4,$row['current_bal']);
							}
						}
					else if ($balance<50000){	?>
						</table>

						<?php 
							switch($select){
							case 1:
								create_header(25000,50000);
								
								$select=0;
							case 0:
								create_table($i,$row['id'], $row['assesment_no'],$row['owner_name'],$row['address'],$row['arrears'] ,$row['annual_tax']/4,$row['current_bal']);
							}
						}
					else{	?>
						</table>

						<?php 
							switch($select){
							case 0:
								create_header(50000,more);
								
								$select=1;
							case 1:
								create_table($i,$row['id'], $row['assesment_no'],$row['owner_name'],$row['address'],$row['arrears'] ,$row['annual_tax']/4,$row['current_bal']);
							}
						}
					?>
                    		
							
					<?php 
				}
				if ($bool==false) { ?>
                	<table border="2" id="tb">
						<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
                    </table>
		<?php } 
			
	
	 ?>
     </table>
  <button id="detail" type="button" onclick="myFunction();" target="">Print View</button>
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
    window.open('Quarter Report.php');
    window.print() 
    
}
</script>

<div id="footer"></div>
</div>
</body>
</html>