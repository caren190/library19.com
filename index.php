?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>
		Library Management System
	</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

<style type="text/css">
	nav
	{
		float: right;
		word-spacing: 30px;
		padding: 20px;
	}
	nav li 
	{
		display: inline-block;
		line-height: 80px;
	}
	
    footer
	{
		height: 200px;
		width: 1361px;
		background-color: black;
	}
		.fa
		{
			margin: 0px 5px;
			padding: 5px;
			font-size: 20px;
			width: 20px;
			height: 20px;
			text-align: center;
			text-decoration: none;
			border-radius: 50%;
		}
		.fa:hover
		{
			opacity: .7;
		}
		.fa-facebook
		{
			background: #3B5998;
			color: white;
		}
		.fa-twitter
		{
			background: #55ACEE;
			color: white;
		}
		.fa-google
		{
			background: #dd4b39;
			color: white;
		}
		.fa-instagram
		{
			background: #125688;
			color: white;
		}
		.fa-yahoo
		{
			background: #400297;
			color: white;
		}
</style>
</head>


<body>
	<div class="wrapper">
		<header>
		<div class="logo">
			<img src="">
			<h1 style="color: white;">LIBRARY MANAGEMENT SYSTEM</h1>
		</div>

		<?php
		if(isset($_SESSION['login_user']))
		{
			?>
				<nav>
					<ul>
						<li><a href="index.php">HOME</a></li>
						<li><a href="books.php">BOOKS</a></li>
						<li><a href ="magazines.php">MAGAZINES</a></li>
                   .    <li><a href ="shelves.php">SHELVES</a></li>
						<li><a href="logout.php">LOGOUT</a></li>
					</ul>
				</nav>
			<?php
		}
		else
		{
			?>
						<nav>
							<ul>
								<li><a href="index.php">HOME</a></li>
								<li><a href="books.php">BOOKS</a></li>
								<li><a href ="magazines.php">MAGAZINES</a></li>
                                <li><a href ="shelves.php">SHELVES</a></li>
								<li><a href="login.php">LOGIN</a></li>
								<li><a href="registration.php">SIGN-UP</a></li>
							</ul>
						</nav>
		<?php
		}
			
		?>

			
		</header>
		<section>
		<div class="sec_img">
			<br><br><br>
			<div class="box">
				<br><br><br><br>
				<h1 style="text-align: center; font-size: 35px;">Welcome to library</h1><br><br>
				<h1 style="text-align: center;font-size: 25px;">Opens at: 09:00 </h1><br>
				<h1 style="text-align: center;font-size: 25px;">Closes at: 15:00 </h1><br>
			</div>
		</div>
		</section>
		

	</div>
	<?php  

		include "footer.php";
	?>
</body>
</html>