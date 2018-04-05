<!DOCTYPE html>
<html lang="en">
<head>

  		     <link rel="stylesheet" href="screenstyles.css">
			 <link rel="stylesheet" href="image.css">

  <title>DOCTOR CONNECT </title>
  <meta charset="utf-8">
  <meta name="viewport" content ="width+device-width, initial-scale=1">
</head>
<body>

 <div id="container">
 <header>
 <img src="images/51767987.jpg"  width="200" height="200">&nbsp;&nbsp;&nbsp;
 <h2>DOCTOR CONNECT</h2>
 <h5>Caring For You And Your Family.</h5>
 </header>
 <main>
 <form>
 <div class="pic-container pic-medium pic-circle">
  <img class="pic" src="http://szzljy.com/images/circle/circle8.jpg" alt="">
  <div class="pic-overlay">
      <a><i class="fa fa-window-close-o" aria-hidden="true"></i></a>
      <a><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
  </div>
</div><br>
	<input type="button" id="account" value="Account" class="btn" /><br><br>
	<input type="submit" id="logout" value="Logout" class="btn" formaction="signup.html"/>
	</form>
	<div <style="float:right">
	<?php
	session_start(); 
		include 'connect.php';
			$conn=OpenCon();
			
			
			
		 $em= $_SESSION['myValue'];
		 $sql="SELECT * FROM register where email='$em'";
		 
	     if($result = $conn->query($sql))
	     {
	       if($result->num_rows >0 )
	       {
	         echo "<table border=1>";
	         echo "<tr>";
			 echo "<th>name</th>";
			 echo "<th>Last name</th>";
			 echo "<th>email</th>";
			
			 echo "<th>Date of Birth</th>";
			
			 echo "<th>Gender</th>";
	         echo "<th>expertise</th>";
	         echo "</tr>";
	         while($row=$result->fetch_array())
	         {
						 
	           echo "<tr>";
	          // echo "<th><a href='records.php?edit=" . $row['student_id'] . "'>Edit</a>" . $row['student_name'] . "</th>";
	           echo "<th>" . $row['fname'] . "</th>";
			   echo "<th>" . $row['lastname'] . "</th>";
			   echo "<th>" . $row['email'] . "</th>";
			  
			   echo "<th>" . $row['DateofBirth'] . "</th>";
			   echo "<th>" . $row['gender'] . "</th>";
			   echo "<th>" . $row['expertise'] . "</th>";
			  
	           echo "</tr>";
	         }
	         echo "</table>";
	        }
	       else
	       {
	         echo "no record found";
	
	       }
	     } 
	     else
	     {
	       echo "could not be able to execute the query";
	     }
	     
	?>
	</div>
		</main>
		<footer><br>
		<a href="mailto:info@your_company_name.net">Request information</a
	      </footer>
	</div>
	
	</body>
        </html>
