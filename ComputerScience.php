
<!DOCTYPE HTML>
<!--
	Editorial by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<?php include_once "connection.php";?>
<html>
	<head>
		<title>Computer Science</title>
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
				  	<li><a href="#twitter" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
					<li><a href="#facebook" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
					<li><a href="#Snapchat" class="icon fa-snapchat-ghost"><span class="label">Snapchat</span></a></li>
					<li><a href="#Instagram" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
					</ul>
		
                                        </header>
            <!-- Banner -->
<section id="banner">
					       <div class="content" >
						<header>
						<h1><strong>Computer Science</strong></h1>
                                                   <header class="major">
							<h2>New trips</h2>
					         	</header>
         <!-- show new trip when date of trip greter than today's date -->                     		
      <?php 
        $date = date("Y-m-d");
        $sql = "SELECT * FROM trip WHERE Department_Trip='computer science' AND Date >'$date'";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            ?>
      
         <table style="font-size:12px; width: 84%; height:70%;" class="alt">
       <!-- result in table -->        
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
<th>Register</th>
<th>More</th>
</tr>
</thead>
<tbody>
    <?php
            
        while ($row = $result->fetch_assoc()) {
         
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
<td><a href="RegisterCS.php" name="register" >Register</a></td>
<td><a href="ComputerScience.html">More</a></td>
</tr>
<?php }
} else {
            
    echo "There are no new trips available now.";
    
} 

?>

</tbody>
</table>
                                                </header>
						
						</div>
                                                
					</section>

						<!-- Section -->

					<section>
					<header class="major">
					<h2>Previous trips</h2>
					</header>
  <!-- show Previous trip when date of trip less than today's date -->
      <?php 
        $sql1 = "SELECT * FROM trip WHERE Department_Trip='computer science' AND Date < '$date'";
        $result1 = $conn->query($sql1);
        
                if ($result1->num_rows > 0) {
            ?>
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
<th>More</th>
</tr>
</thead>
<tbody>
     <?php
            
        while ($row = $result1->fetch_assoc()) {
         
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
<td><a href="previousTripsCS.html">More</a></td>
</tr>
<?php }
} else {
            
    echo "There are no old trips.";
    
} 

?>

</tbody>
</table>
					
					</section>
                                                
                                   <header id="header">
					</header>
					<br>
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
                                     
				<section id="login" class="alt">
			
				</section>

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