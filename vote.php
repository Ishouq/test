<!DOCTYPE HTML>
<!--
	Editorial by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<?php include_once "connection.php";?>
<html>
	<head>
		<title>Vote</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
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
                        <div class="content">

                                <div class="w3-container">

                                </div>     
                <!-- Header -->
                <header>
                    <h1><strong>Vote</strong></h1>

                </header>
                <p><strong>vote for the NEXT TRRIP in the history department</strong></p>
                 <section>
                    <header class="major">
                            <h2>Suggested Trips</h2>
                    </header>
                    <div class="features">
                        <!-- Article -->
                    <article>
                    <img src="images/hira1.jpg" alt="" />
                     <div class="content">
                        <h3>Cave of Hira</h3>
                        <p>It is in this cave that Prophet Muhammad (may the blessings and peace of Allah be upon him)
                        found the solitude he needed to meditate. When Prophet Muhammad (may the blessings and peace of Allah be upon him) was 40 years old, 
                        he RECEIVED his first divine revelation from Allah (the Glorified and Exalted) through Angel Jibreel.</p>
                    </div>
                    </article>
                     <!-- Article -->
                    <article>
                    <img src="images/kisua.jpg" alt="" />
                    <div class="content">
                    <h3>The Kiswa Factory</h3>
                    <p>Al Kiswa Factory in Makkah is where the Kiswa, or the fabric that drapes the Kabah is made.
                    It is one of the most important signs of respect and VENERATION for the House of God, and its history is part of the history of 
                    the Holy Kaba itself. Since the Kaba was first built by Abraham and his son Ismail.</p>

                    </div>
                    </article>
                    <!-- Article -->                                  
                    <article>
                    <img src="images/thaur.jpg" alt="" />
                    <div class="content">
                        <h3>Cave of Thaur</h3>
                        <p>Thaur cave is located 5 miles south of Mecca and the mountain Thaur has many hill and caves.
                        Prophet Muhammad (may the blessings and peace of Allah be upon him) and companion Abu Bakr took
                        shelter in the cave before they took off to Madina, since the pagans of Mecca were trying to 
                        capture them and launched a search party.</p>
                     </div>
                    </article>

                    </div>
                    </section>
                  
                    <div class="box">
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
                    <strong><p style="color:#749ee0;" >Which one of the following historical monuments you want to visit?</p></strong>
                    <p>Note: ONLY the students of the history department can vote</p>
                    <div>
                        <input type="radio" id="demo-priority-low" name="trips" value="Cave of Hira">
                       <label for="demo-priority-low">Cave of Hira</label>
                      </div>
                        <div>
                         <input type="radio" id="demo-priority-normal" name="trips" value="Cave of Thaur">
                         <label for="demo-priority-normal">Cave of Thaur</label>
                        </div>
                      <div>
                        <input type="radio" id="demo-priority-high" name="trips" value="The Kiswa Factory">
                        <label for="demo-priority-high">The Kiswa Factory</label>
                      </div>
                      <br/>
                                              <div>
                                <ul class="actions">
                                <li><input type="submit" value="Vote" name="Vote" class="special" /></li>
			       
                                </ul>
                                </div>
                    </form> 
                        </div>
                        </section>
<?php  

$optionFlag = FALSE;

        
if (isset($_POST['Vote'])) {
    
if(isset($_POST['trips'])){
    

$sql6 = "SELECT Department FROM university WHERE state = 'on'";
        $result6 = $conn->query($sql6);
        while ($row = $result6->fetch_assoc()) {
          $departmet=$row['Department'] ;
        }
    
     if($departmet=="History"){
$seletedValue = $_POST['trips'];//  Displaying Selected Value
if($seletedValue=="Cave of Hira"){
    $optionFlag = TRUE;
    $sql = "SELECT Votes FROM vote WHERE tripName = '$seletedValue'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $Votes = $row['Votes'];
    $Votes++;
    
    $sql2="UPDATE vote SET Votes='$Votes' WHERE tripName='$seletedValue'";
    $result2 = $conn->query($sql2);
}
   else if($seletedValue=="Cave of Thaur"){
    $optionFlag = TRUE;
    $sql3 = "SELECT Votes FROM vote WHERE tripName = '$seletedValue'";
    $result3 = $conn->query($sql3);
    $row = $result3->fetch_assoc();
    $Votes = $row['Votes'];
    $Votes++;
    
    $sql1="UPDATE vote SET Votes='$Votes' WHERE tripName='$seletedValue'";
    $result1 = $conn->query($sql1);
} 
else if($seletedValue=="The Kiswa Factory"){
    $optionFlag = TRUE;
    $sql5 = "SELECT Votes FROM vote WHERE tripName = '$seletedValue'";
    $result5 = $conn->query($sql5);
    $row = $result5->fetch_assoc();
    $Votes = $row['Votes'];
    $Votes++;
    
    $sql4="UPDATE vote SET Votes='$Votes' WHERE tripName='$seletedValue'";
    $result4 = $conn->query($sql4);
}
     }
else{
            echo "<script type='text/javascript'>alert('YOU CANNOT VOTE BECAUSE YOU ARE NOT FROM HISTORY DEPARTMENT');</script>";
        }


}
else if ($optionFlag == False){
    echo "<script type='text/javascript'>alert('YOU SHOULD CHOSE ONE OPTION TO VOTE');</script>";  
} 
}




$conn->close();//close connection





  

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