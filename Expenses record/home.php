<?php require_once 'process.php'; ?>
<?php
//session_start();

$servername = "localhost";
$username = "root";
$password = "";
$db_name = "daily_exp";
  
// Create connection
$con = mysqli_connect( $servername, $username, $password, $db_name );

  //mysqli_select_db("$dbname","$con");
  
  //$username = mysql_real_escape_string($con);

    /* Find and get row*/
    //$getit = mysql_query("SELECT * FROM account WHERE username='$username'",$con);
    //$row = mysql_fetch_array($getit);

  //  $username = $row['username']
   
  if($_SESSION["username"]==true)
  ?> 
  
<?php  if(isset($_SESSION['message'])): ?>

<?php endif ?> 
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EXPENCES RECORD</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
    <nav class="navbar navbar-dark bg-dark text-center">
       <span class="navbar-brand mb-0 h1 text-center">EXPENCES RECORD</span> 
       <span class="navbar-brand mb-0 h1 text-center" style="color: gold; font-size: 30px;">
     <?php 
     
        //echo $username;
       echo  "Welcome To Your Portal"." ".$_SESSION["username"];
     
                       // $user=$_SESSION["username"]
                       // $myquery=mysqli_query("select * from account where username='$user'");
                     //$row=mysqli_fetch_array($myquery);
 ?>     
           
        </span>
     <span class="navbar-brand mb-0 h1 text-center"><a href="logout.php">Logout</a></span>
    </nav>
    <br><br><br>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h2 class="text-center">Add Expences</h2>
                <hr><br>
                <form action="process.php" method="POST">
             
                    <div class="form-group">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <label for="budgetTitle">Item Name</label>
                        <input type="text" name="budget" class="form-control" id="budgetTitle" placeholder="Enter Item Name" required autocomplete="off"  value="<?php echo $name; ?>">
                    </div>
                    <div class="form-group">
                        <label for="amount">Amount</label>
                        <input type="text" name="amount" class="form-control" id="amount" placeholder="Enter Amount" required  value="<?php echo $amount; ?>">
                    </div>
                    <div class="form-group">
               
               <label for="Username">Last Date</label>
              
               <input type="text" name="user" class="form-control" id="Username" placeholder="Enter Last Date" required autocomplete="off"  value="<?php 
               echo $user; ?>">
           </div>
                    <?php if($update == true): ?>
                    <button type="submit" name="update" class="btn btn-success btn-block">Update</button>
                    <?php else: ?>
                    <button type="submit" name="save" class="btn btn-primary btn-block">Save</button>
                    <?php endif; ?>
                </form>
            </div>
            <div class="col-md-8">
                <h2 class="text-center">Total Expences List : ₹ <?php echo $total;?></h2>
                <hr>
                <br><br>

                <?php 

                    if(isset($_SESSION['massage'])){
                        echo    "<div class='alert alert-{$_SESSION['msg_type']} alert-dismissible fade show ' role='alert'>
                                    <strong> {$_SESSION['massage']} </storng>
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                        <span aria-hidden='true'>&times;</span>
                                    </button>
                                </div>
                                ";
                    }

                ?>
                <h2> TOTAL EXPENCES LIST</h2>
                
                <?php 
                    $usern=$_SESSION["username"];
                    $r=mysqli_query($con, "select * from account where username='$usern'");
                    $row=mysqli_fetch_array($r);
                    $usid=$row["id"];
                    $result = mysqli_query($con, "SELECT * FROM bugcalculator where user_id=$usid");
                ?>
                <div class="row justify-content-center">
                    <table class="table">
                        <thead>
                            <tr>
                                
                                <th>Item Name</th>
                                <th>Budget Amount</th>
                                <th>Added Date & Time</th>
                                <th>Due Date</th>
                                <th colspan="2">Action</th>
                            </tr>
                        </thead>
                        <?php 
                            while($row = $result->fetch_assoc()): ?>
                            <tr>
                              
                                <td><?php echo $row['name']; ?></td>
                                <td> ₹ <?php echo $row['amount']; ?></td>
                                <td><?php echo $row['reg_date']; ?></td>
                                <td><?php echo $row['user']; ?></td> 

                                <td>
                                    <a href="home.php?edit=<?php echo $row['id']; ?>" class="btn btn-success">edit</a>
                                    <a href="process.php?delete=<?php echo $row['id']; ?>"  class="btn btn-danger">delete</a>
                                </td>
                            </tr>
                            

                        <?php endwhile ?>
                    </table>
                </div>
            </div>
        </div>
    </div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>    
</body>
</html>