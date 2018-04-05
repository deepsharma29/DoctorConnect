<!DOCTYPE html>
<html lang="en">
<head>

  		     <link rel="stylesheet" href="screenstyles.css">

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
 <form action="" method="post">
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="uName" placeholder="User Name" required autofocus/><br><br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" name="password" placeholder="Password" required /><br><br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" class="btn btn-info" value=" Submit " name="submit" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="submit"  id="sign-up" value="sign-up" class="btn" formaction="signup.html"/>
	</form>
	
	
	
		</main>
		<footer><br>
		<a href="mailto:info@your_company_name.net">Request information</a>
	      </footer>
	</div>
	<?php
   session_start();
   $counter=0;
  if(isset($_POST["submit"]))
  {
  include 'connect.php';
		$conn=OpenCon();
     $sql="SELECT * FROM register";
     if($result = $conn->query($sql))
     {
       if($result->num_rows >0 )
       {
         
         while($row=$result->fetch_array())
         {
          
            $username=$row['email'];
            $password=$row['pass'];
            $user=$_POST['uName'];
            $pass=$_POST['password'];
           $c=$result->num_rows;
            if($username === $user && $password === $pass)
            {
             
             
            $_SESSION['myValue']=(string)$user;
              header('Location:profile.php');
         
            }
            else
            {
              $counter++;
              if($c == $counter )
              {
              
                echo "<script type= 'text/javascript'>alert('Username and Password is Incorrect');</script>";
              }
              }
           
          }
         
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
    }
    else
    {
      
    }
     
	//  if (isset($_POST["submit"]))
	//  {
	// 	include 'connect.php';
	// 	$conn=OpenCon();
  //    $sql="SELECT * FROM register";
  //    if($result = $conn->query($sql))
  //    {
  //      if($result->num_rows >0 )
  //      {
  //        echo "<table border=1>";
  //        echo "<tr>";
  //        echo "<th>name</th>";
  //        echo "<th>email</th>";
  //        echo "<th>city</th>";
  //        echo "</tr>";
  //        while($row=$result->fetch_array())
  //        {
  //          echo "<tr>";
  //         // echo "<th><a href='records.php?edit=" . $row['student_id'] . "'>Edit</a>" . $row['student_name'] . "</th>";
  //          echo "<th>" . $row['fname'] . "</th>";
  //          echo "<th>" . $row['lastname'] . "</th>";
          
  //          echo "</tr>";
  //        }
  //        echo "</table>";
  //       }
  //      else
  //      {
  //        echo "no record found";

  //      }
  //    } 
  //    else
  //    {
  //      echo "could not be able to execute the query";
  //    }
  //    function del()
  //    {
  //     echo "<script type= 'text/javascript'>alert('New record created successfully');</script>";
	//  }
	// }
	// else
	// {
	// 	echo "<script type= 'text/javascript'>alert('problem');</script>";
	// } 
     ?>
	</body>
        </html>
