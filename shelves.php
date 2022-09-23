<?php
  include"connection.php";
  include"navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
  <title>Books</title>
  <style type="text/css">
    .srch
    {
      padding-left: 800px;
    }
    body {
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
  color: #f1f1f1;
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
.h
{
width: 300px;
height: 50px;
color: white;
background-color:red;
}

  </style>
</head>
<body>
  <div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <div style="color: white;margin-left: 80px;">
                        <?php
                        if(isset($_SESSION['login_user']))
                       {echo "<img class='img-circle profile_img' height=70 width=70 src='images/".$_SESSION['pic']." '>";
                        
                         echo " Welcome ".$_SESSION['login_user'];
                       }
                      ?>
                    </div>
<div class="h">  <a href="shelves.php">Shelves</a></div>
</div>

<div id="main">
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>


<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.body.style.backgroundColor = "white";
}
</script>
  </style>
</head>
<body>
  <!------------search bar------->
  <div class="srch">
    <form class="navbar-form"method="post"name="form1">
        <input type="text" name="search"placeholder="search shelves"required="">
        <button style="background-color:blue ;" type="submit" name="submit"class="btn btn default">
         <span class="glyphicon glyphicon-search"></span> 
        </button>
      
    </form>
  </div>
<h2>Categories Of Shelves</h2>
<?php
if(isset($_POST['submit']))
{
$q=mysqli_query($db," SELECT * FROM shelves where type like '%$_POST[search]%'");
if(mysqli_num_rows($q)==0)
{
   echo "Sorry! No shelf found,try searching again";
}
else
{
 echo "<table class='table table-bordered table-hover'>";
             echo"<tr style='background-color:blue;'>";
             //Table header
                echo"<th>"; echo"Block A"; echo"</th>";
                echo"<th>"; echo"Block B"; echo"</th>";
                echo"<th>"; echo"Block C"; echo"</th>";
                echo"<th>"; echo"Block D"; echo"</th>";
                echo"<th>"; echo"Block E"; echo"</th>";
                echo"<th>"; echo"Block F"; echo"</th>";
                echo"<th>"; echo"Block G"; echo"</th>";
                echo"<th>"; echo"Block H"; echo"</th>";
                echo"<th>"; echo"Block I"; echo"</th>";
                echo"<th>"; echo"Block J"; echo"</th>";
         echo"</tr>";

             while ($row=mysqli_fetch_assoc($q)) 
             {
             echo"<tr>";
             echo"<td>"; echo $row  ['Block A']; echo"</td>";
             echo"<td>"; echo $row  ['Block B']; echo"</td>";
             echo"<td>"; echo $row  ['Block C']; echo"</td>";
             echo"<td>"; echo $row  ['Block D']; echo"</td>";
             echo"<td>"; echo $row  ['Block E']; echo"</td>";
             echo"<td>"; echo $row  ['Block F']; echo"</td>";
             echo"<td>"; echo $row  ['Block G']; echo"</td>";
             echo"<td>"; echo $row  ['Block H']; echo"</td>";
             echo"<td>"; echo $row  ['Block I']; echo"</td>";
             echo"<td>"; echo $row  ['Block J']; echo"</td>";
             echo"</tr>";
             }
     echo"</table>"; 
   }
 }
/*if button is not pressed*/
else
{
$res=mysqli_query($db," SELECT * FROM `shelves`;");
 echo "<table class='table table-bordered table-hover'>";
             echo"<tr style='background-color:blue;'>";
             //Table header
                echo"<th>"; echo"Block A"; echo"</th>";
                echo"<th>"; echo"Block B"; echo"</th>";
                echo"<th>"; echo"Block C"; echo"</th>";
                echo"<th>"; echo"Block D"; echo"</th>";
                echo"<th>"; echo"Block E"; echo"</th>";
                echo"<th>"; echo"Block F"; echo"</th>";
                echo"<th>"; echo"Block G"; echo"</th>";
                echo"<th>"; echo"Block H"; echo"</th>";
                echo"<th>"; echo"Block I"; echo"</th>";
                echo"<th>"; echo"Block J"; echo"</th>";

                
             echo"</tr>";

             while ($row=mysqli_fetch_assoc($res)) 
             {
             echo"<tr>";
             echo"<td>"; echo $row  ['Block A']; echo"</td>"; 
             echo"<td>"; echo $row  ['Block B']; echo"</td>"; 
             echo"<td>"; echo $row  ['Block C']; echo"</td>"; 
             echo"<td>"; echo $row  ['Block D']; echo"</td>"; 
             echo"<td>"; echo $row  ['Block E']; echo"</td>"; 
             echo"<td>"; echo $row  ['Block F']; echo"</td>"; 
             echo"<td>"; echo $row  ['Block G']; echo"</td>"; 
             echo"<td>"; echo $row  ['Block H']; echo"</td>"; 
             echo"<td>"; echo $row  ['Block I']; echo"</td>"; 
             echo"<td>"; echo $row  ['Block J']; echo"</td>";
             echo"</tr>";
             }
     echo"</table>" ; 
}




             
?>
</body>
</html>