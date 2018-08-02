<!DOCTYPE HTML>
<!--
	Editorial by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<?php include_once "connection.php";?>
<html>
    <head>
        <title>Delete Trip</title>
        <meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="assets/css/main.css" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script>
            
            function validation(){
                //cheack of value the admin select it
                var selected = document.getElementById("select").value;
                if(selected==0){
                    //if admin not selected from drop down list show message
                    alert("YOU MUST CHOSE FROM THE DROP DOWN LIST")
                }
                else{
                            //if admin choose value from drop down list show aleart message
                var result=confirm("ARE YOU SURE YOU WANT TO DELETE THE SELECTED TRIP ?");
                alert('THE TRIP SUCCESSFULLY DELETED');
                }
                return result;
            }
            
    //method take value from drop down list
            function getText(element) {
                var textHolder = element.options[element.selectedIndex].text;
                document.getElementById("txt_holder").innerHTML = textHolder;
            }
  
        </script>
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
                    
                    
                    <!-- Content -->
		    <br/><h3>Select the trip you want to delete from the list: </h3><br/>
                   
                    <form name="deleteTrip" method="post" >
                        <?php 
                        //select the trip name the admin need to delete it from trip table
                         $sql = "SELECT Name_Trip FROM trip";
                         $result = $conn->query($sql);
                         ?> 
                        <select id="select" name="Name_Trip" onchange="getText(this)">
                            <option value="0" >- Trip Name -</option>
                            <?php 
                            //use fetch assoc to bring info from table in db
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value='". $row['Name_Trip']. "'>". $row['Name_Trip']."</option>";
                                
                            }
                            
                            ?>
                        </select>
                        <br/><br/>
                       
                        <input class="button special" type="submit" name="Delete" value="Delete" 
                               onclick="return validation()"/>

                    </form>
                    
                    
                        <?php
                        if( isset( $_POST['Delete']) ) {
                            $DeleteTripName = $_POST['Name_Trip'];
                            
                         $sql1 = "DELETE FROM trip WHERE Name_Trip ='$DeleteTripName'";
                         $result1 = $conn->query($sql1);
                         
                        }
                         $conn->close();
                        
                        ?>                   
                    
								
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