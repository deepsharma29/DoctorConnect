<<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<?php
	
     
    if (isset($_POST['ret']))
    {
        echo "hello";
    }
    else
   {
       echo "<script type= 'text/javascript'>alert('problem');</script>";
   }   
       include 'connect.php';
       $conn=OpenCon();
    $sql="SELECT * FROM register";
    if($result = $conn->query($sql))
    {
      if($result->num_rows >0 )
      {
        echo "<table border=1>";
        echo "<tr>";
        echo "<th>name</th>";
        echo "<th>email</th>";
        echo "<th>city</th>";
        echo "</tr>";
        while($row=$result->fetch_array())
        {
          echo "<tr>";
         // echo "<th><a href='records.php?edit=" . $row['student_id'] . "'>Edit</a>" . $row['student_name'] . "</th>";
          echo "<th>" . $row['fname'] . "</th>";
          echo "<th>" . $row['lastname'] . "</th>";
         
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
    function del()
    {
     echo "<script type= 'text/javascript'>alert('New record created successfully');</script>";
    }
   
    
    ?>
<body>
    <form action="" method="POST">
    <button name="ret" value="submit">button</button>
    </form>
   
</body>
</html>