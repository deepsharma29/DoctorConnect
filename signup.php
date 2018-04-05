<!DOCTYPE html>
<html lang="en">

<head>

  <link rel="stylesheet" href="screenstyles.css">

  <title>DoctorConnect</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width+device-width, initial-scale=1">
  <style>
.error {color: #FF0000;}
</style>
</head>

<body>

  <?php
    // define variables and set to empty values
  $nameErr = $lastnameErr = $emailErr = $genderErr = $passwordErr = $expertiseErr= "";
  $name = $email = $gender = $password = $lastname = "";

  //checking the method of the server 
  //---------------------validation start-----------------------------------
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
      $nameErr = "Name is required";
    } else {
      $name = test_input($_POST["name"]);
        // check if name only contains letters ,numbers and underscores
      if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
        $nameErr = "Name must contain only letters,numbers and underscores!";
      }
    }


    if (empty($_POST["lastname"])) {
      $lastnameErr = "LastName cannot be blank!";
    } else {
      $name = test_input($_POST["lastname"]);
        // check if name only contains letters and whitespace
      if (!preg_match("/^[a-zA-Z ]*$/", $lastname)) {
        $lastnameErr = "Only letters and white space allowed";
      }
    }


    if (empty($_POST["email"])) {
      $emailErr = "Email is required";
    } else {
      $email = test_input($_POST["email"]);
        // check if e-mail address is well-formed
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
      }
    }

    if (empty($_POST["password"])) {
      $passwordErr = "Password must contain at least eight characters!";
    } else {
      $password = test_input($_POST["password"]);
	    // check if name only contains letters and whitespace
      if (!preg_match("/^[a-zA-Z ]*$/", $password)) {
        $passwordErr = "Only letters and white space allowed";
      }

    }
    if (empty($_POST["gender"])) {
      $genderErr = "Gender is required";
    } else {
      $gender = test_input($_POST["gender"]);
    }
  }

  function test_input($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
//------------------------------validation end-------------------------------------


//--------------------------------connection with database start ------------------------------

//checking if the method of the button register is set to POST
if(isset($_POST['register']))
    {
      //included the connection file 
      include 'connect.php';
      //calling the connection function which is defined in the connect file
      $conn=OpenCon();
      echo "connected Succeful";
      //getting the user input and storing the value in the variable through the post method
      $name=$_POST['name'];
      $lastname=$_POST['lastname'];
      $email=$_POST['email'];
      $password=$_POST['password'];
	  $DateofBirth= $_POST['year'] . "-" . $_POST['month'] . "-" . $_POST['day'];
      $gender=$_POST['gender'];
      $expertise=$_POST['mydropdown'];
	  
	  

      //storing the query in the sql variable
       $sql = "INSERT INTO register (fname,lastname,email,pass,DateofBirth,gender,expertise) VALUES ('$name','$lastname','$email','$password','$DateofBirth','$gender','$expertise')";
      
      //checking that the value of the variable is empty or not 
       if($name !="" && $lastname !="" && $email !="" && $password !="" && $gender !="" && $expertise !="")
      {
        //if the value is not empty then the query will execute
        if ($conn->query($sql) === TRUE) {
          echo "<script type= 'text/javascript'>alert('New record created successfully');</script>";
          } else {
          echo "<script type= 'text/javascript'>alert('Error: " . $sql . "<br>" . $conn->error."');</script>";
          }
      }
      else
      {
        echo "<script type= 'text/javascript'>alert('Fields are empty');</script>";
      } 
      //this will close the connection
        $conn->close();

    }

  ?>
    
    <div id="container">
      <header>
        <img src="images/51767987.jpg" width="250" height="250">&nbsp;&nbsp;&nbsp;
        <h1>DOCTOR CONNECT</h1>
        <h2>Caring For You And Your Family.</h2>
      </header>
      <main>

        <div class="form">

          <ul class="tab-group">

          </ul>

          <div class="tab-content">
            <div id="signup">
              <h1>Registration</h1>

              <form action="" method="post">

                <div class="top-row">
                  <div class="field-wrap">
                    <label>
                      First Name
                    </label>&nbsp;&nbsp;
                    <input type="text" name="name" />
                    <span class="error">*
                      <?php echo $nameErr; ?>
                    </span>
                  </div>
                  <br>

                  <div class="field-wrap">
                    <label>
                      Last Name
                    </label>&nbsp;&nbsp;
                    <input type="text" name="lastname"/>
                    <span class="error">*
                      <?php echo $lastnameErr; ?>
                    </span>
                  </div>
                  <br>
                </div>

                <div class="field-wrap">
                  <label>
                    Email
                  </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <input type="email" name="email" />
                  <span class="error">*
                    <?php echo $emailErr; ?>
                  </span>
                </div>
                <br>
               <div class ="field-wrap">
			   <label>
			   Password</label>
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <input type="password" id="psw" name="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"/>
				  <span class="error">*
				  <?php echo $passwordErr; ?>
				  </span>
				  </div>
				  <br>
                <div class="field-wrap">
                  <label>
                    Date of Birth
                  
                  </label>
                  <select name="month">
				<option value="Month">Month</option> 
 <option value="January">January</option>
 <option value="February">February </option>
 <option value="March">March</option>
 <option value="April">April</option>
  <option value="May">May</option>
 <option value="June">June</option>
  <option value="July">July</option>
 <option value="August">August</option>
 <option value="September">September</option>
 <option value="October">October</option>
 <option value="November">November</option>
 <option value="December">December</option>
                  </select>
                  <select name="day">
                    <option value="Day">Day</option>
					 <option value="01">01</option>
 <option value="02">02</option>
 <option value="03">03</option>
 <option value="04">04</option>
 <option value="05">05</option>
 <option value="06">06</option>
 <option value="07">07</option>
 <option value="08">08</option>
 <option value="09">09</option>
 <option value="10">10</option>
 <option value="11">11</option>
 <option value="12">12</option>
 <option value="13">13</option>
 <option value="15">15</option>
 <option value="16">16</option>
 <option value="17">17</option>
 <option value="18">18</option>
 <option value="19">19</option>
 <option value="20">20</option>
 <option value="21">21</option>
 <option value="22">22</option>
 <option value="23">23</option>
 <option value="24">24</option>
 <option value="25">25</option>
 <option value="26">26</option>
 <option value="27">27</option>
 <option value="28">28</option>
 <option value="29">29</option>
 <option value="30">30</option>
  <option value="31">31</option>

                  </select>
                  <select name="year">
                    <option value="Year">Year</option>
					<option value="1980">1980</option>
					<option value="1981">1981</option>
					 <option value="1982">1982</option>
 <option value="1983">1983</option>
 <option value="1984">1984</option>
 <option value="1985">1985</option>
 <option value="1986">1986</option>
 <option value="1987">1987</option>
 <option value="1988">1988</option>
 <option value="1989">1989</option>
 <option value="1990">1990</option>
 <option value="1991">1991</option>
 <option value="1992">1992</option>

                  </select>

                </div>
                <br>

                <div class="field-wrap">
                  <label>
                    Gender

                  </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <select  name="gender">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                  </select><span class="error">*
                      <?php echo $genderErr; ?>
                    </span>
                </div>
                <br>

                <div class="field-wrap">
                  <label>
                    Expertise
                  
                  </label>&nbsp;&nbsp;

                  <select name="mydropdown">
                    <option value="Cardiologist">Cardiologist</option>
                    <option value="Dermatologist">Dermatologist</option>
                    <option value="Family Doctor">Family Doctor</option>
                    <option value="Medical examiner">Medical examiner</option>
                    <option value="Neurologist">Neurologist</option>
                    <option value="Occupational medicine specialist">Occupational medicine specialist</option>
                    <option value="Orthopedic surgeon">Orthopedic surgeon</option>
                    <option value="Otolaryngologist">Otolaryngologist</option>
                    <option value="Pathologist">Pathologist</option>
                    <option value="Pediatrician">Pediatrician</option>
                    <option value="Plastic surgeon">Plastic surgeon</option>
                    <option value="Psychiatrist">Psychiatrist</option>
                    <option value="Pulmonologist">Pulmonologist</option>
                    <option value="Radiologist">Radiologist</option>
                  </select><span class="error">*
                      <?php echo $expertiseErr; ?>
                </div>
                <br>
                <button type="submit"  name="register" class="button button-block" />Register</button>

              </form>

            </div>


          </div>
          <!-- tab-content -->

        </div>
        <!-- /form -->

      </main>
    </div>
  <?php
    
  ?>
    <footer>
      &copy; Copyright 2017 All Rights Reserved.
      <br>
      <a href="mailto:info@yahoo.com">Request information</a>
      <br>

    </footer>
	<script>
var myInput = document.getElementById("psw");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) { 
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
}

  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) { 
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) { 
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }

  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
</script>
   </body></html>
