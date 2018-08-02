<!DOCTYPE HTML>
<!--
Editorial by HTML5 UP
html5up.net | @ajlkn
Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->

<?php include_once "connection.php";?>
<html>
<head>
<title>Contact</title>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
<link rel="stylesheet" href="assets/css/main.css" />
<meta name="viewport" content="width=device-width, initial-scale=1">    
</head>
<body>
     <?php
$nameErr = $emailErr = $suggestionsErr ="";
$flagSuggestions= $flagName = $flagEmail =FALSE;
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //if any feilds empty do this statment 
if( empty($_POST["name"]) || empty($_POST["email"]) || (!strlen(trim($_POST['suggestions']))) ){
    echo "<script type='text/javascript'>alert('YOU SHOULD FILL ALL THE FEILDS');</script>";
}
   //if name field is empty print message is required  
if (empty($_POST["name"])) {
    $nameErr = "Name is required";
    
} else {
    $name = test_input($_POST["name"]);
    //check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
        $nameErr = "Only letters and white space allowed";
    } else {$flagName = true;}
} 
//if email field is empty print message is required 
if (empty($_POST["email"])) {
    $emailErr = "Email is required";
    
} else {
    $email = test_input($_POST["email"]);
    //check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format"; 
    }else{$flagEmail= true;}
}
//if suggestions field is empty print message is required 
if ((!strlen(trim($_POST['suggestions']))) ) {
    $suggestionsErr = "suggestion is required"; 
    
} else {
    $suggestions= test_input($_POST["suggestions"]);
    //check if e-mail address is well-formed
    if (!preg_match("/^[a-zA-Z ]*$/",$suggestions)) {
        $suggestionsErr = "Only letters and white space allowed"; 
    }else{$flagSuggestions= true;}
}
 //if all field not empty  
if( $flagSuggestions== true && $flagName == true && $flagEmail == true){
    echo "<script type='text/javascript'>alert('ARE YOU SURE YOU WANT TO SEND THE SUGGESTION ?');</script>";

  //insert suggestions into database
$sql="INSERT INTO  suggestion (userName,email,suggestion) VALUES('$name','$email','$suggestions') ";
if ($conn->query($sql) === TRUE) {
   //After insert into database 
    echo "<script type='text/javascript'>alert('THANK YOU ... we will reply to you as soon as possible');</script>";
} 
  

$conn->close();//close connection
} 

}
   
   
  //call this function to cheack 
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
<li><a href="#twitter" class="icon fa-twitter"><span class="label">Twitter</span></a> </li>
<li><a href="#facebook" class="icon fa-facebook"><span class="label">Facebook</span></a> </li>
<li><a href="#Snapchat" class="icon fa-snapchat-ghost"><span class="label">Snapchat</span></a> </li>
<li><a href="#Instagram" class="icon fa-instagram"><span class="label">Instagram</span></a> </li>
</ul>
</header>
<!-- Banner -->
 <!-- Form for contact us  -->
<section>
<header class="major">
<h2>We are happy to receive your suggestions:</h2>
</header>								
<section>               
<fieldset>
<h2><legend>  To send your suggestions: </legend></h2> <br>
<p><span class="error">* required field.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  
<h4> your Name: </h4> <span class="error">* <?php echo $nameErr;?></span>
<input type="text" name="name"  id="name" placeholder="user name"><br>

<h4> email: </h4> <span class="error">* <?php echo $emailErr;?></span>
<input type="email" name="email" id="email" placeholder="email"><br>

<h4> Write your suggestion : </h4> <span class="error">* <?php echo $suggestionsErr;?></span>
<textarea name="suggestions"  id="suggestions" rows="10" cols="50"> </textarea><br>


<label>
<button> Send comment</button>
</label>


</form>

</fieldset>
</section>

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
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/skel.min.js"></script>
<script src="assets/js/util.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>
