<!DOCTYPE HTML>
<!--
	Editorial by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<?php include_once "connection.php";
?>
<html>
	<head>
<title>Log In</title>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
<link rel="stylesheet" href="assets/css/main.css" />
<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<body>
            
            <?php 
$username = "";
$usernameErr = "";
$password = "";
$passwordErr = "";
$usernameFlag = FALSE;
$passwordFlag = FALSE;
  
if ($_SERVER["REQUEST_METHOD"] == "POST") {
     
  if (empty($_POST["username"])) {
    $usernameErr = "username is required";
  } else {
    $username = test_input($_POST["username"]);
    if (!preg_match("/^[s]{1}+[0-9]{6}$/",$username) ){
      $usernameErr = "Just letter s and 6 numbers allowed";
    }
    else{
        $usernameFlag = TRUE;
    }
  }
   
   if (empty($_POST["password"])) {
    $passwordErr = "password is required";
  } else {
    $password = test_input($_POST["password"]);
    if (!preg_match("/^[0-9]{6}$/",$password)) {
      $passwordErr = "just numbers with 6 digits are allowed";
    }
    else{
        $passwordFlag = TRUE;
    }
    
  }
  if($usernameFlag==true&&$passwordFlag==true){
      if (isset($_POST['login'])){
                 
            $User =trim($_POST['username']);
            $Pwd  =trim($_POST['password']);
             
            if (!empty ($User)&&($Pwd)){  
                $sql="SELECT ID,Password FROM university WHERE ID='$User' AND Password='$Pwd'";
 
                $result = $conn->query($sql);             
            
                if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    ini_set ('display_errors', 1);
                    error_reporting (E_ALL & ~E_NOTICE);
                    //if info for log in astudent is true and press on button log in ,the index page show for student
                    print '<meta http-equiv="refresh" content="0.5; URL=index.php">';
                    $sql1="UPDATE university SET state='on' WHERE ID='$User'";
                      $result1 = $conn->query($sql1);
                }
            } else {
            
                echo "<script type='text/javascript'>alert('you must be registered in the university.');</script>";
    
            } 
        } 
        
    }
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
  <form id="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  >
  
      <fieldset>
 <legend><h1>Log In</h1></legend>
<br>
User Name:<span class="error">* <?php echo $usernameErr;?></span>
<input type="text" name="username" placeholder="username" >
<br>
Password:<span class="error">* <?php echo $passwordErr;?></span>
<input type="password" name="password" placeholder="password">

<a href="forgetpassword.php">forget your password?</a>
<br>
<br>
<label>
    <button type="submit" name="login" id="login" placeholder="login"  >Log In</button>
   
    <br/>
</label>
<br>
</fieldset>
      
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
<!-- Scripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/skel.min.js"></script>
<script src="assets/js/util.js"></script>
<script src="assets/js/main.js"></script>
<script>
function checkID(){
        document.getElementById("form").action = "index.php";
    }
</script>
</body>
</html>
