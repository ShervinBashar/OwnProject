<?php
//delete header error for refresh
ob_start();
session_start();
session_unset();
//CONNECT TO DB
include_once("database.php");
//USER CLICKS REGISTER
if(isset($_REQUEST['register'])){
    //CLEAN-UP USER INPUT
   $fullname = strip_tags($_REQUEST['fullname']);
   $email = strip_tags($_REQUEST['email']);
   

   $fullname = stripslashes($fullname);
   $email = stripslashes($email);
   

   $fullname = mysqli_real_escape_string($connection, $fullname);
   $email = mysqli_real_escape_string($connection, $email);
   

   //CHECK IF AC ALREADY EXISTS
   $SQL_select = "SELECT Email FROM people WHERE Email = '$email'";
  if(mysqli_num_rows (mysqli_query($connection, $SQL_select))){
      echo "*Account Already Exists.";
  }
 

elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "*Please Enter a Valid Email Address.";
}


else{
    
    $SQL_insert = "INSERT INTO `people` (`Full name`, `Email`) VALUES ('$fullname', '$email')";
    
    mysqli_query($connection, $SQL_insert);
    echo "Account Created!";
    header("refresh: 2; url=index.php");
}   

}

mysqli_close($connection);
?>
<html>
    <head>
       <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@1,500&display=swap" rel="stylesheet">
        <title>Registration</title>
        <script src="https://kit.fontawesome.com/9088d16628.js" crossorigin="anonymous"></script>
        <style>

           body {
               font-family: 'Playfair Display', serif;
             background-image: radial-gradient(circle, #a0c0f0, #84aff0, #679def, #478ced, #127aeb);
  color: purple;
 
}

input[type=text]{
    -webkit-border-radius: 20px;
    -moz-border-radius: 20px;
     border-radius: 20px;
     border: 1px solid #2d9fd9;
     color: #a0d18c;
     width: 250px;
     height: 30px;
     padding-left: 10px;
    }
    
input[type=text]:focus {
     outline: none;
     border: 1px solid #a0d18c;
     color: #2d9fd9;
}


h3 {
  color: white;
  text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px darkblue;
}

    .container {
  width: 300px;
  clear: both;
}

.container input {
  width: 100%;
  clear: both;
}
/*vertical center*/
.vertical-center {
  margin: 0;
  position: absolute;
  top: 50%;
  -ms-transform: translateY(-50%);
  transform: translateY(-50%);
}
a {
  color: darkblue;
  text-decoration: none; 
}
a:hover {
  color: black;
}



        </style>
    </head>
    <body>
        <center>
       <div class="navbar"></div>
        <div class="content">
            <div class="container">
                 <div class="vertical-center">
                    
           <h3>Sign up for Newaletter &nbsp;<i class="fas fa-id-card"></i></h3>
            
            <form action="" method="post">
                
                <p>Full name: <input type="text" name="fullname" placeholder="Enter full name"></p>
                <p>Email: <input type="text" name="email" placeholder="Enter Email"></p>
               
               
                <input type="submit" style="font-face: 'Comic Sans MS'; color: darkblue; background-color: ; border: 2pt ridge lightgrey" name="register" value="Register">
            </form>
            
             </div>
            <br>
           
        </div>
        <div class="footer"></div>
        
        </center> 
    </body>

</html>
