<html>
<head>
<title>Register</title>
 <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EXPENCES RECORD</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
     body {
        background-color: #F3EBF6;
        font-family: 'Ubuntu', sans-serif;
    }
    
    .main {
        background-color: #FFFFFF;
        width: 500px;
        height: 500px;
        margin: 7em auto;
        border-radius: 1.5em;
        box-shadow: 0px 11px 35px 2px rgba(0, 0, 0, 0.14);
   
    }
    
    .sign {
        padding-top: 40px;
        color: #8C55AA;
        font-family: 'Ubuntu', sans-serif;
        font-weight: bold;
        font-size: 23px;
    }
    
    .un {
    width: 76%;
    color: rgb(38, 50, 56);
    font-weight: 700;
    font-size: 14px;
    letter-spacing: 1px;
    background: rgba(136, 126, 126, 0.04);
    padding: 10px 20px;
    border: none;
    border-radius: 20px;
    outline: none;
    box-sizing: border-box;
    border: 2px solid rgba(0, 0, 0, 0.02);
    margin-bottom: 50px;
    margin-left: 46px;
    text-align: center;
    margin-bottom: 27px;
    font-family: 'Ubuntu', sans-serif;
    }
    
    form.form1 {
        padding-top: 40px;
    }
    
    .pass {
            width: 76%;
    color: rgb(38, 50, 56);
    font-weight: 700;
    font-size: 14px;
    letter-spacing: 1px;
    background: rgba(136, 126, 126, 0.04);
    padding: 10px 20px;
    border: none;
    border-radius: 20px;
    outline: none;
    box-sizing: border-box;
    border: 2px solid rgba(0, 0, 0, 0.02);
    margin-bottom: 50px;
    margin-left: 46px;
    text-align: center;
    margin-bottom: 27px;
    font-family: 'Ubuntu', sans-serif;
    }
    
   
    .un:focus, .pass:focus {
        border: 2px solid rgba(0, 0, 0, 0.18) !important;
        
    }
    
    .submit {
      cursor: pointer;
        border-radius: 5em;
        color: #fff;
        background: linear-gradient(to right, #9C27B0, #E040FB);
        border: 0;
        padding-left: 40px;
        padding-right: 40px;
        padding-bottom: 10px;
        padding-top: 10px;
        font-family: 'Ubuntu', sans-serif;
        margin-left: 35%;
        font-size: 13px;
        box-shadow: 0 0 20px 1px rgba(0, 0, 0, 0.04);
    }
    
    .forgot {
        text-shadow: 0px 0px 3px rgba(117, 117, 117, 0.12);
        color: #E1BEE7;
        padding-top: 15px;
        text-align: center;
    }
    .register {
        text-shadow: 0px 0px 3px rgba(117, 117, 117, 0.12);
        color: #E1BEE7;

        text-align: center;
    }
    
    a {
        text-shadow: 0px 0px 3px rgba(117, 117, 117, 0.12);
        color: #E1BEE7;
        text-decoration: none
    }
    
    @media (max-width: 600px) {
        .main {
            border-radius: 0px;
        }
    }
    pre{
      font-size: 23px;
    }
  </style>
</head>

<body>

 <nav class="navbar navbar-dark bg-dark text-center">
                <span class="navbar-brand mb-0 h1 text-center">EXPENCES RECORD</span> 
         </nav>
                <br><br>
  <div class="main">
    <p class="sign" align="center">REGISTER FOR NEW ACCOUNT</p>
    <form class="form1" method="POST">
      <input class="un " type="text" align="center" id="username" name="username" placeholder="Username">
      <input class="pass" type="password" align="center" id="password" name="password" placeholder="Password"><br><br>
      <input class="submit" type="submit" name="submit" align="center" value="REGISTER"><br><br>
                                 
    </div>
     
</body>

</html>

<?php
if(isset($_POST['submit'])){

$servername = "localhost";
$username = "root";
$password = "";
$db_name = "daily_exp";

// Create connection
$conn = new mysqli($servername, $username, $password, $db_name);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$username =$_POST['username'];
$password =$_POST['password'];

// to prevent from sqli


// $username=stripcslashes($username);
// $password=stripcslashes($password);
// $username=mysqli_real_escape_string($conn, $username);
// $password=mysqli_real_escape_string($conn, $password);

// $user_check_query = "SELECT * FROM account WHERE username='$username'  LIMIT 1";
//   $result = mysqli_query($conn, $user_check_query);
//   $user = mysqli_fetch_assoc($result);
  
  
$sql ="INSERT INTO account(username, password) VALUES ('$username','$password')";

$result = mysqli_query($conn, $sql);

if($result){
  echo "<script> alert('Register Successfully');
                               window.location='index.php';
                     </script>";

}
else{
  echo "<h2><center>Please enter valid username or password</center><h1>";
}
}
?>