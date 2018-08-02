<!DOCTYPE HTML>
<!--
Editorial by HTML5 UP
html5up.net | @ajlkn
Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<?php include_once "connection.php";?>
<html>
<head>
<title>Edit Trips</title>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
<link rel="stylesheet" href="assets/css/main.css" />
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <!--validation js-->
    <script>
            function validate(){  
                //cheack from user to choose from drop down list
                var selected = document.getElementById("select").value;
                //if user do not choose any thing from drop down list we will show message
                if(selected ==0){
                    alert("YOU MUST CHOOSE FROM THE DROP DOWN LIST");
                }
                //we take a value from user and cheack
                var date = document.getElementById("date").value;
                var time = document.getElementById("time").value;
                var period = document.getElementById("Period").value;
                var stuNum = document.getElementById("studentsNum").value;
                var price = document.getElementById("price").value;
//if user do not select from drop down list or do not fill any feild we show message
             
            if(selected != 0 && date== ""&&time== ""&& (period== -1) &&stuNum== ""&&price== "" ){
                alert("YOU SHOULD FILL IN  AT LEAST ONE OF THE FEILDS");
            }
            
        }
        //function to get element the admin select it from drop down list
         function getText(element) {
                var textHolder = element.options[element.selectedIndex].text;
                document.getElementById("txt_holder").innerHTML = textHolder;
            }
               
</script>

<!--PHP-->

    <?php 
  $dateErr = $timeErr = $periodErr  = $studNumErr = $priceErr="";
  $Date = $time = $studNum = $price = "";
  $flagDate = FALSE;
  $flagTime = FALSE;
  $flagperiod = FALSE;
  $flagPrice = FALSE;
  $flagStudentsNum = FALSE;
  
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
  //cheack of all feild in page not empty
  if ( !empty($_POST["date"]) && empty($_POST["time"]) && empty($_POST["price"])
          &&empty($_POST["studentsNum"]) || !empty($_POST["date"])) {
    $Date = test_input($_POST["date"]);
    // check if name only contains letters and whitespace
     if (!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$Date)) {
      $dateErr = "write the date in this format YYYY-MM-DD"; 
    } else {$flagDate = true;
    
if( isset( $_POST['edit']) ) {
    //if admin need edit the trip , the admin select the trip name and ubdate this trip
    $selectedValue=$_POST['Name_Trip'];
    $sql1="UPDATE trip SET Date='$Date' WHERE Name_Trip='$selectedValue'";
    $result1 = $conn->query($sql1);
 }
    }
  }
  
  
  if ( empty($_POST["date"]) && !empty($_POST["time"]) && empty($_POST["price"])
          && empty($_POST["studentsNum"]) || !empty($_POST["time"]) ) {
    $time = test_input($_POST["time"]);
    // check if name only contains letters and whitespace
     if (!preg_match("/(2[0-3]|[01][0-9]):([0-5][0-9])/",$time)) {
      $timeErr = "write the time in this format HH:DD "; 
    } else  { $flagTime = true;
    if( isset( $_POST['edit']) ) {
    $selectedValue=$_POST['Name_Trip'];
    $sql2="UPDATE trip SET Time='$time' WHERE Name_Trip='$selectedValue'";
    $result2 = $conn->query($sql2);
 }
    }
  }

 if($_POST['Period'] == -1){
 $periodErr ="";} 
 else{
     $flagperiod=true;
     if( isset( $_POST['edit']) ) {
    $selectedValue=$_POST['Name_Trip'];
    $selectedPeriod=$_POST['Period'];
    $sql5="UPDATE trip SET Period='$selectedPeriod' WHERE Name_Trip='$selectedValue'";
    $result5 = $conn->query($sql5);
     }
 }

  
   if ( empty($_POST["date"]) && empty($_POST["time"]) && empty($_POST["price"])
          && !empty($_POST["studentsNum"]) || !empty($_POST["studentsNum"]) ) {
    $studNum = test_input($_POST["studentsNum"]);
    // check if name only contains letters and whitespace
     if (!preg_match("/^[0-9]{2,3}$/",$studNum)) {
      $studNumErr = "only numbers with 2 to 3 digits are allowed"; 
    } else  { $flagStudentsNum= true;
    
    if( isset( $_POST['edit']) ) {
    $selectedValue=$_POST['Name_Trip'];
    $sql3="UPDATE trip SET Studentsnumber='$studNum' WHERE Name_Trip='$selectedValue'";
    $result3 = $conn->query($sql3);
 }
    }
  }
  
  if ( empty($_POST["date"]) && empty($_POST["time"]) && !empty($_POST["price"])
          && !empty($_POST["studentsNum"]) || !empty($_POST["price"]) ) {
    $price = test_input($_POST["price"]);
    // check if name only contains letters and whitespace
     if (!preg_match("/^[0-9]{2,3}$/",$price)) {
      $priceErr = "only numbers with 2 to 3 digits are allowed"; 
    }else { $flagPrice= true;
    if( isset( $_POST['edit']) ) {
    $selectedValue=$_POST['Name_Trip'];
    $sql4="UPDATE trip SET Price='$price' WHERE Name_Trip='$selectedValue'";
    $result4 = $conn->query($sql4);
 }
    }
  }
  //if all info the admin need to edit is true we  will show message 
  
  if($flagDate || $flagPrice || $flagStudentsNum || $flagTime || $flagperiod == true ){
      
    echo "<script type='text/javascript'>alert('ARE YOU SURE YOU WANT TO EDIT THE SELECTED TRIP ?');</script>";
        echo "<script type='text/javascript'>alert('THE TRIP SUCCESSFULLY MODEFIED');</script>";

  }
  
 }
  function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
   
 ?>



<!-- Wrapper -->
<div id="wrapper">
<!-- Main -->
<div id="main">
<div class="inner">
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
<center>
<h2 id="content">Please select the trip from menu you want to edit</h2>

<span class="error">* You must choose at least one of the fields.</span>
</center>
<br><br>	

<center><form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onsubmit="return validate()" >
 <?php 
                         $sql = "SELECT Name_Trip FROM trip";
                         $result = $conn->query($sql);
                         ?> 

                       <center>    <select id="select" name="Name_Trip" onchange="getText(this)">
                            <option value="0" >- Trip Name -</option>
                            <?php 
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value='". $row['Name_Trip']. "'>". $row['Name_Trip']."</option>";
                                $conn->close();    
                            }
                            
                            ?>
   </select></center>

<br><br>
             
  Date:<span class="error"><?php echo $dateErr;?></span><br>
 <input type="text" name="date" id="date">
  <br><br>
  Time:<span class="error"><?php echo $timeErr;?></span><br>
 <input type="text" name="time" id="time">
  <br><br>
  Period:<span class="error"><?php echo $periodErr;?></span><br>
  <select name="Period" id="Period">
         <option value="-1">Select One</option>
         <option value="PM">PM</option>
         <option value="AM">AM</option>
</select>
  <br><br>
   Students number :<span class="error"><?php echo $studNumErr;?></span><br>
 <input type="text" name="studentsNum" id="studentsNum">
  <br><br>
  price:<span class="error"><?php echo $priceErr;?></span><br>
 <input type="text" name="price" id="price">
  <br><br>
  <input name="edit" type="submit" value="Edit">  
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