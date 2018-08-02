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

<br/><br/><br/>

<?php 

   $search=$_POST['query'];
   
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
//query for search the trip by name of  department 

       $sql="SELECT * FROM trip WHERE  Department_Trip='$search' ";
if(!($result = mysqli_query($conn,$sql))){
print("not execute <br>");   
die(mysql_error()."</body></htm>");
}


//result in table 
if ($result->num_rows > 0) {
echo"<strong><br>Trip: </strong>"." "."<strong>".$search."</strong><br>";
echo "<br>";
echo'<table  class="alt"><tr> <th >ID</th> <th >Name</th> <th >Place</th> 
<th >Date</th> <th >Time</th>
<th >Period</th><th >Registeration start</th> 
<th>Registeration end</th> <th >Students</th> <th >Price</th> </tr>';
//fetch_assoc() to bring info from db and show it in table
while($row = $result->fetch_assoc()) {

echo  "<tr><td>".$row["ID_Trip"] ."</td> <td>".$row["Name_Trip"]."</td> <td>".$row["Place"]."</td> <td>".$row["Date"]."</td> <td>"
.$row["Time"] ."</td> <td>".$row["Period"]."</td> <td>".$row["Registerationstart"]."</td> <td>".$row["Registerationend"]."</td> <td>"
.$row["Studentsnumber"]."</td> <td>".$row["Price"]."</td> </tr>";
}
echo"</table>";
} else {
echo "0 results";
}
$conn->close();//close connection

   }
   ?>
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