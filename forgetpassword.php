<!DOCTYPE HTML>
<!--
	Editorial by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<head>
<title>Forget The Password ?</title>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
<link rel="stylesheet" href="assets/css/main.css" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<script>

function validation(){
   //take value from feild and cheack 
     var getEmail = document.getElementById("email").value;
     var getPhoneNumber = document.getElementById("phoneNumber").value;
    
         var flag = true;
     if ( getEmail=="" &&  getPhoneNumber=="" )  {
         //if the field is empty show message
         alert("YOU SHOULD FILL YOUR PHONE NUMBER OR YOU EMAIL");
         
         flag = false;
         return flag;
     }
        
return flag;
}
</script>

</head>
<body>
 <?php


// define variables and set to empty values
$emailErr = $phoneNumberErr = "";
$email = $phoneNumber = "";
$flagEmail1 = false;
$flagPhoneNum= false;



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    

if (!empty($_POST["email"]) && empty($_POST["phoneNumber"])|| !empty($_POST["email"]) ) {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
    }
    else {$flagEmail1 = true;}
    
    }
  
if (empty($_POST["email"])&& !empty($_POST["phoneNumber"]) || !empty($_POST["phoneNumber"])){
    $phoneNumber = test_input($_POST["phoneNumber"]);
    // check if e-mail address is well-formed
    if(!preg_match("/^[0-9]{3}-[0-9]{4}-[0-9]{4}$/", $phoneNumber)) {
        $phoneNumberErr = "Only number and same format allowed";
    } else {$flagPhoneNum = true;}
 
    }
    
    
    if($flagEmail1 == true || $flagPhoneNum == true){
        //if email and phone number is true show message to confirm the user want a new password 
        
    echo "<script type='text/javascript'>alert('Are you sure you want to send the password to your email or phone number?');</script>";
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
<header>
<h1> Forgot Your Password? </h1>
<br>
<p> please enter your email address or your phone number to send to you a new password </p>
<!--<p><span class="error">* required field.</span></p>-->



<form method="post" onsubmit="return validation()"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
   
    <p class="error"> You should fill in at least one field</p>
    Email: 
    <span class="error"><?php echo $emailErr;?></span>
    <input type="text" name="email" id="email" placeholder="email"><br>
    
    Phone number: 
    <span class="error"><?php echo $phoneNumberErr;?></span>
    <input type="text" name="phoneNumber" id="phoneNumber" placeholder="000-0000-0000"><br><br>
    
    <button type="submit" name="submit" >Send My Password</button>
    &nbsp &nbsp &nbsp &nbsp
    <button type="button" onclick="window.location='index.php';" > Cancel </button>

</form>



</header>
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
<!-- Menu -->
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

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/skel.min.js"></script>
<script src="assets/js/util.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>
