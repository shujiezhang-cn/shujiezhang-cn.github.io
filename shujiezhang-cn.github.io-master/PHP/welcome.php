<html>
<head>
	<title><?php echo $_GET["user_name"]; ?></title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="../assets/css/main.css" />
</head>
<body>

			<!-- Header -->
			<section id="header">
				<header>
					<span class="image avatar"><img src="../images/default.gif" alt="" /></span>
					<h1 id="logo"><a href="#"><?php echo $_GET["user_name"]; ?></a></h1>
					<p>Undergraduate Student <br />
					Peking University, China</p>
				</header>
				<nav id="nav">
					<ul>
						<li><a href="#one" class="active">Information</a></li>
						<li><a href="#two">Subscription</a></li>
						<li><a href="#three">Leave a message</a></li>
						<!--<li><a href="#four">Contact</a></li>-->
					</ul>
				</nav>
				
			</section>

<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<div id="main">

						<!-- One -->
							<section id="one">
								
								<div class="container">
									<header class="major">
										<h2>Welcome, <?php echo $_GET["user_name"]; ?></h2>
										<p>You can find some interesting demos here~ Enjoy yourselves!</p>
									</header>
									
								</div>
							</section>
							
							<section id="two">
								
								<div class="container">
									<header class="major">
<?php
$username = filter_input(INPUT_GET, 'user_name');
$password = filter_input(INPUT_GET, 'password');
if (!empty($username)){
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "demo";

//create connction
$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()){
	die('Connect Error ('. mysqli_connect_error() .')'. mysqli_connect_error());
}
/*
else{
	$sql = "INSERT INTO account (name, password) values ('$username','$password')";
	if ($conn->query($sql)){
		echo "New Record is inserted successfully!";
	}
	else{
		echo "Error: " . $sql . "<br>" . $conn->error;
	}*/
else{
$sql = "SELECT count(*) as total FROM account WHERE name = '". $username . "'";
//$sql = "SELECT count(*) as total FROM account WHERE name = 'yuxuan'";
if ($conn->query($sql)){
	//echo "Load Successfully!";
	$result=mysqli_query($conn, $sql);
	$data=mysqli_fetch_assoc($result);
	$num = $data['total'];
	if ($num)
	{
		//echo "welcome";
	}
	else{
		//echo "FBI warning!";
		//$message = "Sorry, you are not in the user list. Please contact Ziming with your username and password.";
		//echo "<script>";
		//echo "alert('". $message ."')";
		//echo "</script>";
		//echo "<script>";
		//echo "window.location.href = '../index.html'";
		//echo "</script>";
		echo "<div class='box'>";
		//echo "Warning!";
		echo "<p><h3 style='background-color:#F7819F;'>Warning!</h3></p>";
		echo "<p><h3 style='background-color:#F7819F;'>Sorry, you are not in the user list. Please contact Ziming with your username and password!</h3></p>";
		echo "</div>";
		
	}
	
	//echo $conn->query($sql); querey return what???
}
else{
	echo "Error: " . $sql . "<br>" . $conn->error;
	}
}
}
?>
									</header>
									
								</div>
							</section>
							
					</div>
			</div>

</body>

</html> 