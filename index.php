<!DOCTYPE HTML>
<!--
	Editorial by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
 <!-- call page counter  for visitor counter --> 
<?php include("pageview-counter.php"); ?>
 <?php include_once "connection.php";?>
<html>
<!-- Head -->
<head>
<title>Home Page</title>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
<link rel="stylesheet" href="assets/css/main.css" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css">
<link rel="stylesheet" type="text/css" href="serchcss.css">

<style>
.mySlides {display:none}
.w3-left, .w3-right, .w3-badge {cursor:pointer}
.w3-badge {height:13px;width:13px;padding:0}

</style>
</head>
<!-- Body -->
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
    <ul class="icons">
    <li><a href="#twitter" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
    <li><a href="#facebook" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
    <li><a href="#Snapchat" class="icon fa-snapchat-ghost"><span class="label">Snapchat</span></a></li>
    <li><a href="#Instagram" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
    </ul>

    </header>

    <!--Search --> 
    <form method="POST" action="search.php">
        <p></p>
    <input type="text" name="query" placeholder="Search by department..">
    </form>

    <!-- Banner -->
    <section id="banner">
    <div class="content">
      

    <div class="w3-content w3-display-container" style="max-width:800px">
    <a href="vote.php"><img class="mySlides" src="images\pic01.jpg" style="width:100%"></a>
    <img class="mySlides" src="images\pic02.jpg" style="width:100%">
    <img class="mySlides" src="images\pic03.jpg" style="width:100%">
    <div class="w3-center w3-section w3-large w3-text-white w3-display-bottommiddle" style="width:100%">
    <div class="w3-left w3-padding-left w3-hover-text-khaki" onclick="plusDivs(-1)">&#10094;</div>
    <div class="w3-right w3-padding-right w3-hover-text-khaki" onclick="plusDivs(1)">&#10095;</div>
    <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(1)"></span>
    <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(2)"></span>
    <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(3)"></span>
    </div>
    </div>

    <br>
    <!-- Description About Field Exploring -->
    <!-- Header -->
    <header>
    <br><br>
    <h1>WELCOME .. </h1>
    <p>Here where you can explore,learn and see the different sides of things .</p>
    </header>
    <p>This site is made for the students of UQU university of all departments.teh Feild trips will be orgniazed through this site to different and 
        selected regions to reach the goals which is exploration and support students understanding of the materials the trips also provide fun and 
        entertainment for students and make learning easier and faster through experimentation and direct observation 
        Through the site, the student can see previous trips, find out about the trips currently available, read about them and register in them.</p>
    <ul class="actions">
    </ul>
    </div>

    </section>
 <!-- About Us -->
    <!-- Section -->
    <section>
    <header class="major">
    <h2 id="about-us">About Us</h2>
    </header>
    <div class="features">
    <article>
    <span class="icon fa-diamond"></span>
    <div class="content">
    <h6>This website is made for the students of Umm Al Qura University in different departments.
    The site contributes to organizing trips to different places in order to explore and support the subjects taught at the university, 
    which helps to increase the students' absorption of information.
    The trips also provide the entertainment for the students and make the learning process easier and faster through experimentation.
    Through the site, the student can see the previous trips, find out what trips currently available, read about them and register in the trips.
    </h6>
        
    
    </div>
    
       
    </div>
    </section>
    <br/>
        <h5>Created By :<h5/>
 <p > Shouq Abid Alsalmi , Amal Mohammad Alreshi , Raghad Beshiet Almatrafi ,
Esraa Hasan Tunsi , Arwa Khalaf Al-thagafi </p>
<h5> Supervised by :<h5/>
    <p > Dr.Enas Bugis </p>
     <!-- Accounts of social media -->
    <!-- Header -->

    <header id="header">

    </header>
    <br/>
    <h6 id="twitter"><strong>Twitter:</strong> @FieldExploring</h6>
    <h6 id="facebook"><strong>facebook:</strong> FieldExploring</h6>
    <h6 id="Snapchat"><strong>Snapchat:</strong> FieldExploring</h6>
    <h6 id="Instagram"><strong>Instagram:</strong>Field_Exploring</h6>
    
    <!-- visitor counter  -->
    <p style="background-color: lightgrey; color: #f67878; width: 100px;padding: 10px;margin-left: 450px;
    border: 5px solid darkblue;text-align: center;">
    <?php echo pageview_counter(); ?> </p>


    </div>
    </div>




            <!-- Sidebar -->
            <div id="sidebar">
            <div class="inner">
                   <!--  LOGIN AS student or admin -->
                <section id="login" class="alt"><a href="adminLogin.php">log in as administrator</a><br><a href="studentLogin.php">log in as student</a></section>
                
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
            <li><a href="#about-us">About us</a></li>
            </ul>
            </nav>

            <!-- Section -->

            </div>
            </div>

</div>



<!-- Scripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/skel.min.js"></script>
<script src="assets/js/util.js"></script>
<script src="assets/js/main.js"></script>
<script>
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
showDivs(slideIndex += n);
}

function currentDiv(n) {
showDivs(slideIndex = n);
}

function showDivs(n) {
var i;
var x = document.getElementsByClassName("mySlides");
var dots = document.getElementsByClassName("demo");
if (n > x.length) {slideIndex = 1}    
if (n < 1) {slideIndex = x.length}
for (i = 0; i < x.length; i++) {
x[i].style.display = "none";  
}
for (i = 0; i < dots.length; i++) {
dots[i].className = dots[i].className.replace(" w3-white", "");
}
x[slideIndex-1].style.display = "block";  
dots[slideIndex-1].className += " w3-white";
}
</script>
</body>
</html>