<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$db_name = "daily_exp";
  
// Create connection
$con = mysqli_connect( $servername, $username, $password, $db_name );
//mysqli_select_db("$dbname","$con"); 
//if($_SESSION["username"]==true)
// Check connection
if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}

 //  echo "welcome"." ".$_SESSION["username"];
  //}

  $usern=$_SESSION["username"];
 $r=mysqli_query($con, "select * from account where username='$usern'");
 $row=mysqli_fetch_array($r);
 $usid=$row["id"];
  
$total = 0;
$update = false;
$id=0;
$user='';
$name = '';
$amount = '';
$reg_date='';

                   


if(isset($_POST['save'])){
   
       
        $budget = $_POST['budget'];
        $amount = $_POST['amount'];
        $user   = $_POST['user'];
        $reg_date=$_POST['reg_date'];

        $query = mysqli_query($con, "INSERT INTO bugcalculator (user, name, amount, reg_date, user_id) VALUE ('$user', '$budget', '$amount', NOW(), '$usid')"); 
        
        $_SESSION['massage'] = "Recode has been saved !";
        $_SESSION['msg_type'] = "primary";

        header("location: home.php?result=true");
        

    }

    //calculate Total budget
    $result = mysqli_query($con, "SELECT * FROM bugcalculator where user_id=$usid");
    while($row = $result->fetch_assoc()){
        $total = $total + $row['amount'];
    }

    //delete data

    if(isset($_GET['delete'])){
        $id = $_GET['delete'];

        $query = mysqli_query($con, "DELETE FROM bugcalculator WHERE id=$id");
        $_SESSION['massage'] = "Recode has been Delete !";
        $_SESSION['msg_type'] = "danger";

        header("location: home.php");

    }

    if(isset($_GET['edit'])){
        $id = $_GET['edit'];
        $update = true;
        $result = mysqli_query($con, "SELECT * FROM bugcalculator WHERE id=$id");

      
        if( mysqli_num_rows($result) == 1){
            $row = $result->fetch_assoc();
            $name = $row['name'];
            $amount = $row['amount'];
            $user = $row['user'];
            

        }
    
    }

    if(isset($_POST['update'])){
        $id = $_POST['id'];
        $budget = $_POST['budget'];
        $amount = $_POST['amount'];
        $user   = $_POST['user'];
        $reg_date=$_POST['reg_date'];

        $query = mysqli_query($con, "UPDATE bugcalculator SET user='$user', name='$budget', amount='$amount', reg_date=NOW() WHERE id='$id'");
        $_SESSION['massage'] = "Recode has been Update !";
        $_SESSION['msg_type'] = "success";
        header("location: home.php");
    }


?>
