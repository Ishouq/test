<!DOCTYPE HTML>
<!--
Editorial by HTML5 UP
html5up.net | @ajlkn
Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<?php include_once "connection.php";?>
<html>
<head>
<title>Add Trips</title>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
<link rel="stylesheet" href="assets/css/main.css" />
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <!--validation js-->
    <script type="text/javascript">
            function validate(){
                //get all value in field to cheack of them
                var tID = document.getElementById("tripId").value;
                var tName = document.getElementById("TripName").value;
                var tDepartment = document.getElementById("TripDepartment").value;
                var tplace = document.getElementById("TripPlace").value;
                var date = document.getElementById("date").value;
                var time = document.getElementById("time").value;
                var period = document.getElementById("Period").value;
                var regStart = document.getElementById("RegisterationStart").value;
                var regEnd = document.getElementById("RegisterationEnd").value;
                var stuNum = document.getElementById("studentsNum").value;
                var price = document.getElementById("price").value;
//if all field or some field is empty , show message
                if(tID =="" ||tName== ""||tDepartment== ""||tplace== ""||date== ""||time== ""||period== ""||regStart== ""||regEnd== ""||stuNum== ""||price== ""){
                  alert("YOU SHOULD FILL ALL THE FEILDS");   
                }
                else{
                    //if all field are fill will show confirm and aleart message
                confirm("ARE YOU SURE YOU WANT TO ADD THIS TRIP");
                alert('THE TRIP SUCCESSFULLY ADDED');
            
        }
           
            } 
            </script>
    
    <!--PHP-->
 <?php
 $tIdErr = $tNameErr = $tDepErr = $tPlaceErr =$dateErr = $timeErr =$periodErr = $RegStartErr = $RegEndErr = $studNumErr = $priceErr="";
 $tID = $tName = $tDepartment = $tPlace = $Date = $time = $regStart = $regEnd = $studNum = $price = "";
 
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
     //cheack of feild id not empty 
  if (empty($_POST["tripId"])) {
      //if feild is empty show message
    $tIdErr = "ID is required";
  } else {
      //if feild not empty we cheack of the value of feild
    $tripId = test_input($_POST["tripId"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z]{1}+[0-9]{3}$/",$tripId)) {
      $tIdErr = "Only letters and numbers allowed"; 
    }
  }
  
  if (empty($_POST["TripName"])) {
    $tNameErr = "Name of the trip is required";
  } else {
    $tName = test_input($_POST["TripName"]);
    // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$tName)) {
      $tNameErr = "Only letters and white space allowed"; 
    }
  }
  
  if (empty($_POST["TripName"])) {
    $tDepErr = "Name of the department is required";
  } else {
    $tDepartment = test_input($_POST["TripDepartment"]);
    // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$tDepartment)) {
      $tDepErr = "Only letters and white space allowed"; 
    }
  }
  
  if (empty($_POST["TripPlace"])) {
    $tPlaceErr = "the place of the trip is required";
  } else {
    $tPlace = test_input($_POST["TripPlace"]);
    // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$tPlace)) {
      $tPlaceErr = "Only letters and white space allowed"; 
    }
  }
  
  if (empty($_POST["date"])) {
    $dateErr = "the date of the trip is required";
  } else {
    $Date = test_input($_POST["date"]);
    // check if name only contains letters and whitespace
     if (!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$Date)) {
      $dateErr = "write the date in this format YYYY-MM-DD"; 
    }
  }
  
  if (empty($_POST["time"])) {
    $timeErr = "the time of the trip is required";
  } else {
    $time = test_input($_POST["time"]);
    // check if name only contains letters and whitespace
     if (!preg_match("/(2[0-3]|[01][0-9]):([0-5][0-9])/",$time)) {
      $timeErr = "write the time in this format HH:DD "; 
    }
  }
  
 if($_POST['Period'] == -1){
 $periodErr ="Please select one on the List";}
        
if (empty($_POST["RegisterationStart"])) {
    $RegStartErr = "the date of begining of regestration is required";
  } else {
    $regStart = test_input($_POST["RegisterationStart"]);
    // check if name only contains letters and whitespace
     if (!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$regStart)) {
      $RegStartErr = "write the date in this format YYYY-MM-DD"; 
    }
  }
  
  if (empty($_POST["RegisterationEnd"])) {
    $RegEndErr = "the date of end of regestration is required";
  } else {
    $regEnd = test_input($_POST["RegisterationEnd"]);
    // check if name only contains letters and whitespace
     if (!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$regEnd)) {
      $RegEndErr = "write the date in this format YYYY-MM-DD"; 
    }
  }
  
   if (empty($_POST["studentsNum"])) {
    $studNumErr = "the students number is required";
  } else {
    $studNum = test_input($_POST["studentsNum"]);
    // check if name only contains letters and whitespace
     if (!preg_match("/^[0-9]{3}$/",$studNum)) {
      $studNumErr = "only 3 numbers is allowed"; 
    }
  }
  
  if (empty($_POST["price"])) {
    $priceErr = "the price of the trip is required";
  } else {
    $price = test_input($_POST["price"]);
    // check if name only contains letters and whitespace
     if (!preg_match("/^[0-9]{4}$/",$price)) {
      $priceErr = "only 4 numbers is allowed"; 
    }
  }
 }
  function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
  //cheack of the add have values insert it to db 
      if( isset( $_POST['add']) ) {
     $sql="INSERT INTO trip (ID_Trip, Name_Trip, Department_Trip, Place, Date, Time, Period, Registerationstart, Registerationend, Studentsnumber, Price)VALUES('$_POST[tripId]','$_POST[TripName]','$_POST[TripDepartment]','$_POST[TripPlace]','$_POST[date]','$_POST[time]','$_POST[Period]','$_POST[RegisterationStart]','$_POST[RegisterationEnd]','$_POST[studentsNum]','$_POST[price]')";
     $result1 = $conn->query($sql);
     
      }
        $conn->close();     
 ?>
      

<!-- Wrapper -->
<div id="wrapper">
<!-- Main -->
<div id="main">
<div class="inner">
<header id="header">
<img src="images\fieldExploringLOGO.png" style="width:50%;height:50%">
<ul class="icons">
<li><a href="#twitter" class="icon fa-twitter"><span class="label">Twitter</span></a> </li>
<li><a href="#facebook" class="icon fa-facebook"><span class="label">Facebook</span></a> </li>
<li><a href="#Snapchat" class="icon fa-snapchat-ghost"><span class="label">Snapchat</span></a> </li>
<li><a href="#Instagram" class="icon fa-instagram"><span class="label">Instagram</span></a> </li>
</ul>
</header>

<!-- Content -->
<center>
<h2 id="content">Please enter the required information of the trip to be added</h2>
</center>
<br><br>	
<br>
<center><form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onsubmit="return validate()" >
        <span class="error">* is required</span><br><br>
        
 Trip id:<span class="error">* <?php echo $tIdErr;?></span><br>
 <input type="text" name="tripId" id="tripId">
  <br><br>
  Trip name:<span class="error">* <?php echo $tNameErr;?></span><br>
 <input type="text" name="TripName" id="TripName">
  <br>
  department:<span class="error">* <?php echo $tDepErr;?></span><br>
 <input type="text" name="TripDepartment" id="TripDepartment">
  <br><br>
    Trip place:<span class="error">* <?php echo $tPlaceErr;?></span><br>
 <input type="text" name="TripPlace" id="TripPlace">
  <br><br>
   Date:<span class="error">* <?php echo $dateErr;?></span><br>
 <input type="text" name="date" id="date">
  <br><br>
  Time:<span class="error">* <?php echo $timeErr;?></span><br>
 <input type="text" name="time" id="time">
  <br><br>
  Period:<span class="error">* <?php echo $periodErr;?></span><br>
  <select name="Period" id="Period">
         <option value="-1">Select One</option>
         <option value="PM">PM</option>
         <option value="AM">AM</option>
</select>

  <br><br>
 Registeration start:<span class="error">* <?php echo $RegStartErr;?></span><br>
 <input type="text" name="RegisterationStart" id="RegisterationStart">
  <br><br>
  Registeration end :<span class="error">* <?php echo $RegEndErr;?></span><br>
 <input type="text" name="RegisterationEnd" id="RegisterationEnd">
  <br><br>
   Students number :<span class="error">* <?php echo $studNumErr;?></span><br>
 <input type="text" name="studentsNum" id="studentsNum">
  <br><br>
  price:<span class="error">* <?php echo $priceErr;?></span><br>
 <input type="text" name="price" id="price">
  <br><br>
  <input name="add" type="submit" value="Submit">  
</form> </center>

								
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
<!-- Section -->							
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

