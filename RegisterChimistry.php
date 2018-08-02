<!DOCTYPE HTML>
<!--
Editorial by HTML5 UP
html5up.net | @ajlkn
Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<?php include_once "connection.php";?>
<html>
<head>
<title>Chimistry trip</title>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
<link rel="stylesheet" href="assets/css/main.css" />
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
<!-- Wrapper -->
<div id="wrapper">
<!-- Main -->
<div id="main">
<div class="inner">
<!-- Header -->
<header id="header">
<img src="images\fieldExploringLOGO.png" style="width:50%;height:50%">
<ul class="icons">
<li><a href="#twitter" class="icon fa-twitter"><span class="label">Twitter</span></a> </li>
<li><a href="#facebook" class="icon fa-facebook"><span class="label">Facebook</span></a> </li>
<li><a href="#Snapchat" class="icon fa-snapchat-ghost"><span class="label">Snapchat</span></a> </li>
<li><a href="#Instagram" class="icon fa-instagram"><span class="label">Instagram</span></a> </li>
</ul>
</header>
<?php
               
$transportationErr = $methodErr  =$accountErr  ="";
$flagTransportation= $flagMethod =$flagaccount =FALSE;
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
if( empty($_POST["transportation"]) &&  empty($_POST["method"])  ){
    echo "<script type='text/javascript'>alert('YOU SHOULD FILL ALL THE FEILDS');</script>";
}

if (empty($_POST["transportation"]) ) {
     $transportationErr = "the transportation is required";
} else{
    $flagTransportation= true;
}

if (empty($_POST["method"]) ) {
 $methodErr ="the payment method is required";
} else{
    $flagMethod= true;
    if ($_POST["method"]=="Cash") {
  if (empty($_POST["acc"]) ) {
      $sql3="INSERT INTO  student_trip (Accountnumber) VALUES(0) ";
      $result3 = $conn->query($sql3);
      $flagaccount=TRUE;
      
}  
else{
    
     $accountErr = "you must choose bank transfer to write your account number ";
}
} 
 else {
      if (empty($_POST["acc"]) ) {
 $accountErr = "you must write your account number";
}  
else{
    $flagaccount=TRUE;
}  
}
}

if( $flagTransportation== TRUE && $flagMethod== TRUE &&$flagaccount==TRUE ){
    echo "<script type='text/javascript'>alert('ARE YOU SURE YOU WANT TO REGISTER ?');</script>";
    //insert suggestions into database
 $transportation=$_POST["transportation"];
 $method=$_POST["method"];
 $accNum=$_POST["acc"];
$sql1 = "SELECT ID FROM university WHERE state = 'on'";
        $result1 = $conn->query($sql1);
        if ($result1->num_rows > 0) {
        while ($row = $result1->fetch_assoc()) {
          $ID=$row['ID'] ;
        }
        $sql2 = "SELECT ID_Trip FROM trip WHERE Name_Trip = 'Department of Chemistry, King Abdulaziz Unive'";
        $result2 = $conn->query($sql2);
        while ($row = $result2->fetch_assoc()) {
          $Trip_ID=$row['ID_Trip'] ;
        }
           $sql4 = "SELECT Department FROM university WHERE ID = '$ID'";
        $result4 = $conn->query($sql4);
        while ($row = $result4->fetch_assoc()) {
          $departmet=$row['Department'] ;
        }
        
         if( isset( $_POST['register']) ) {
             if($departmet=="Chemistry"){
$sql="INSERT INTO  student_trip (ID_Trip,ID ,Transportation,Paymentmethod,Accountnumber) VALUES('$Trip_ID','$ID','$transportation','$method','$accNum') ";
    if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
         }
          else{
             echo "<script type='text/javascript'>alert('YOU CANNOT REGISTER IN THIS TRIP BECAUSE YOU ARE NOT FROM THE CHEMISTRY DEPARTMENT');</script>";
        }
         }
        }
        else{
            echo "<script type='text/javascript'>alert('YOU MUST BE REGISTERED FIRST');</script>";
        }
        
   $conn->close();//close connection
} 
}
               ?>
<!-- Content -->
<div id="page">
<h2 id="content">  KING ABDULAZIZ UNIVERSITY
</h2>
<p>registration in trip to king abdulaziz university
 .We organized the trip for you and we hope you fill out the form accurately.</p>
						
<!-- Form -->
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  >

                            <div>
                                <h3>Transportation</h3> <span class="error">* <?php echo $transportationErr;?></span>
                                <p>Choose which makes you comfortable in transportation.</p>
		            
                                <div>
                                    <input type="radio" id="demo-priority-buses" name="transportation" value="University Buses"  >
                                    <label for="demo-priority-buses">University Buses</label>
                                </div>	
			        <div>
                                    <input type="radio" id="demo-priority-car" name="transportation" value="Private Car"  >
                                    <label for="demo-priority-car">Private Car</label>
                                </div>
		            </div>
							

                            <div>
			        <h3>Payment Method</h3> <span class="error">* <?php echo $methodErr;?></span>
		               <p>Fees of Trip: 50SR</p>
                                <div>		
                                    <input type="radio" id="demo-priority-Cash" name="method" value="Cash"  >
                                    <label for="demo-priority-Cash">Cash</label>
                                </div>
			        <div>
                                    <input type="radio" id="demo-priority-Bank" name="method" value="Bank Transfer">
			            <label for="demo-priority-Bank">Bank Transfer</label>
                                </div>
		            </div>
                    
                      
                            <div>																
                                <ul class="actions">
				<h3>Number Account</h3><span class="error"> <?php echo $accountErr;?></span>
				<input type="text" name="acc" placeholder="ex:2012856890" />			
			        </ul>
                            </div>
                       
                       
                            <div>
                                <ul class="actions">
                                <li><input name="register" type="submit" value="register"/></li>
			        </ul>
                            </div>
                       
                       
                        </form>
</div>
<header id="header">
</header>
<br/>
<h6 id="twitter"><strong>Twitter:</strong> @FieldExploring</h6>
<h6 id="facebook"><strong>facebook:</strong> FieldExploring</h6>
<h6 id="Snapchat"><strong>Snapchat:</strong> FieldExploring</h6>
<h6 id="Instagram"><strong>Instagram:</strong>Field_Exploring</h6>
<br><br><br><br>
</div>
</div>				
<!-- Sidebar -->
<div id="sidebar">
            <div class="inner">
                <section id="login" class="alt"></section>
<!-- Menu -->
                <nav id="menu">
                   <header class="major">
                    <h2>Menu</h2>
                   </header>
                    <ul>
                     <li><a href="index.php">Home</a></li>
                     <li>
                      <span class="opener"><a href="trips.html">Trips</a></span>
                      <ul>
                        <li><a href="ComputerScience.php">Computer Science</a></li>
                        <li><a href="Chimistry.php">Chimistry</a></li>
                        <li><a href="Kindergarten.php">Kindergarten</a></li>
                        <li><a href="History.php"> History</a></li>
                      </ul>
                      </li>
                      <li><a href="contact.php">Contact</a></li>
                     <li><a href="index.php#about-us">About us</a></li>
                   </ul>
                </nav>
<!-- Section -->								
</div>
</div>
</div>	
	
<!-- Scripts -->
<script src="assets/js/jquery.min.js"> </script>
<script src="assets/js/skel.min.js"> </script>
<script src="assets/js/util.js"> </script>
<script src="assets/js/main.js"> </script>	
</body>
</html>