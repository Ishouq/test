<!DOCTYPE HTML>
<!--
	Editorial by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<?php include_once "connection.php";?>
<html>
<head>
<title>Home</title>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
<link rel="stylesheet" href="assets/css/main.css" />
<meta name="viewport" content="width=device-width, initial-scale=1">
 </head>
<body>
    <?php
                if(isset($_POST['logout'])){
                     
                 
                $sql="SELECT ID,Password FROM university WHERE state='on'";         
                $result = $conn->query($sql);   
                if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    ini_set ('display_errors', 1);
                    error_reporting (E_ALL & ~E_NOTICE);
                    $ID = $row['ID'];
                     
            echo "<script type='text/javascript'>alert('you have been logged out successfully.');</script>";
                       
                    $sql1="UPDATE university SET state='off' WHERE ID='$ID'";
                      $result1 = $conn->query($sql1);
                       
                }
            } else {
            //if the user not logged in
            echo "<script type='text/javascript'>alert('you must be login in the university.');</script>";
                }
            }
             
            ?>
<!-- Wrapper -->
<div id="wrapper">
<!-- Main -->
<div id="main">
<div class="inner">
<!-- Header -->
<header id="header">
<img src="images\fieldExploringLOGO.png" style="width:50%;height:50%">
<ul class="icons"><li><a href="#twitter" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
<li><a href="#facebook" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
<li><a href="#Snapchat" class="icon fa-snapchat-ghost"><span class="label">Snapchat</span></a></li>
<li><a href="#Instagram" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
</ul>
</header>
<!-- Content -->			
<center>
<div class="table-wrapper">								
<br/>
<h2>Trips Table</h2>
<br/><br/><br/>
<table style="font-size:12px; width: 84%; height:70%;" class="alt">
<thead>
<tr>
<th>ID</th>
<th>Name</th>
<th>Department</th>
<th>Place</th>
<th>Date</th>
<th>Time</th>
<th>Period</th>
<th>Registeration start</th>
<th>Registeration end</th>
<th>Students number</th>
<th>Price</th>
</tr>
</thead>
<tbody>
      <?php 
      //we need to take all info from db and print info in table for show it for admin
        $sql3 = "SELECT * FROM trip ORDER BY Department_Trip";
        //conection of db 
        $result3 = $conn->query($sql3);
        //use method fetch_assoc to bring row from $result3 and we can echo the info after that
        while ($row = $result3->fetch_assoc()) {
         
         ?>
<tr>
<td><?php echo $row['ID_Trip'] ?></td>
<td><?php echo $row['Name_Trip'] ?></td>
<td><?php echo $row['Department_Trip'] ?></td>
<td><?php echo $row['Place'] ?></td>																	
<td><?php echo $row['Date'] ?></td>
<td><?php echo $row['Time'] ?></td>
<td><?php echo $row['Period'] ?></td>
<td><?php echo $row['Registerationstart'] ?></td>
<td><?php echo $row['Registerationend'] ?></td>
<td><?php echo $row['Studentsnumber'] ?></td>
<td><?php echo $row['Price'] ?></td>
</tr>
<?php } ?>
</tbody>
</table>
<a href="addtrip.php"><button class="button special" type="button" name="Add" id="addTrip">Add Trip</button></a><br/><br/>
<a href="Edittrip.php"><button class="button special" type="button" name="Edit" id="editTrip">Edit Trip</button></a><br/><br/>
<a href="deleteTrip.php"><button class="button special" type="button" name="Delete" id="deleteTrip">Delete Trip</button></a><br/><br/>
</center>
					
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
                <!-- log out -->
                    <section id="logout" class="alt">
                                        <form method="post" >
                                        <button tupe="submit" name="logout">Logout</button>
                                        </form>       
                    </section>

		   <!-- Menu -->
                <nav id="menu">
                   <header class="major">
                    <h2>Menu</h2>
                   </header>
                    <ul>
                        <li><a href="AdminHome.php">Home</a></li>
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
		</div>
            </div>
	</div>
<!-- Scripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/skel.min.js"></script>
<script src="assets/js/util.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>