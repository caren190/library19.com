<?php
  include "connection.php";
  include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Book Request</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<style type="text/css">
		.srch
		{
			padding-left: 850px;

		}
		.form-control
    {
    	width: 300px;
    	height: 30px;
    	background-color: black;
    	color: white;
    }

		
		body {
			background-image: url(images/aa.jpg);
			background-repeat: no-repeat;
  font-family: "Lato", sans-serif;
  transition: background-color .5s;
}

.sidenav {
  height: 100%;
  margin-top: 50px;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #222;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: white;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
.img-circle
{
	margin-left: 20px;
}
.h:hover
{
	color:white;
	width: 300px;
	height: 50px;
	background-color: #00544c;
}
.container

{
	height: 500px;
	background-color: black;
	opacity: .6;
	color: white;
}

.scroll
{
  width: 100%;
  height: 500px;
  overflow: auto;
}
th,td
{
  width: 10%;
}
	</style>

</head>
<body>
<!--_________________sidenav_______________-->
	
	<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

  			<div style="color: white; margin-left: 60px; font-size: 20px;">

                <?php
                if(isset($_SESSION['login_user']))

                { 	echo "<img class='img-circle profile_img' height=120 width=120 src='images/".$_SESSION['pic']."'>";
                    echo "</br></br>";

                    echo "Welcome ".$_SESSION['login_user']; 
                }
                ?>
            </div><br><br>

 
  <div class="h"> <a href="books.php">Books</a></div>
  <div class="h"> <a href="request.php">Book Request</a></div>
  <div class="h"> <a href="issue_info.php">Issue Information</a></div>
  <div class="h"> <a href="expired.php">Expired List</a></div>
</div>
<div id="main">
  
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>


	<script>
	function openNav() {
	  document.getElementById("mySidenav").style.width = "300px";
	  document.getElementById("main").style.marginLeft = "300px";
	  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
	}

	function closeNav() {
	  document.getElementById("mySidenav").style.width = "0";
	  document.getElementById("main").style.marginLeft= "0";
	  document.body.style.backgroundColor = "white";
	}
	</script>
    <div class="container">
		<h4 style="text-align: center;">Information of Borrowed Books</h4>
		<?php	
		$c=0;

	if(isset($_SESSION['login_user']))
	{
		$sql="SELECT student.username,email,books.isbn,author,edition,publisher,issue,issue_book.return FROM student inner join issue_book ON student.username=issue_book.username inner join books ON issue_book.isbn=books.isbn WHERE issue_book.approve ='Yes'";
		$res=mysqli_query($db,$sql);
		echo "<table class='table table-bordered 'style='width:100%;' >";
			echo "<tr style='background-color: #6db6b9e6;'>";
				//Table header
			  echo "<th>"; echo " Username";  echo "</th>";
				echo "<th>"; echo "Student Email";  echo "</th>";
				echo "<th>"; echo "ISBN";  echo "</th>";
				echo "<th>"; echo "Author";  echo "</th>";
				echo "<th>"; echo "Edition";  echo "</th>";
				echo "<th>"; echo "Publisher";  echo "</th>";
				echo "<th>"; echo "Issue Date";  echo "</th>";
				echo "<th>"; echo "Return Date";  echo "</th>";
			echo "</tr>";	
      echo "</table>";
       echo "<div class='scroll'>";
      echo "<table class='table table-bordered' >";

			while($row=mysqli_fetch_assoc($res))
			{
				$d=date("Y-m-d");
				if($d > $row['return'])
				{
					$c=$c+1;
					$var='<p style="color:yellow; background-color:red;">EXPIRED</p>';
					mysqli_query($db,"UPDATE issue_book SET approve='$var' where `return`='$row[return]' and approve='Yes' limit $c;");
					echo $d."</br>";
				}


				echo "<tr>";
				echo "<td>"; echo $row['username']; echo "</td>";
				echo "<td>"; echo $row['email']; echo "</td>";
				echo "<td>"; echo $row['isbn']; echo "</td>";
				echo "<td>"; echo $row['author']; echo "</td>";
				echo "<td>"; echo $row['edition']; echo "</td>";
				echo "<td>"; echo $row['publisher']; echo "</td>";
				echo "<td>"; echo $row['issue']; echo "</td>";
				echo "<td>"; echo $row['return']; echo "</td>";
				echo "</tr>";
			}
		echo "</table>";
	}
	else
	{
		?>
<h4 style="text-align: center;">Login first to see Information of Borrowed Books</h4>
		<?php
	}
?>
	</div>
</div>
</body>
</html>