<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link rel="stylesheet" href="styles.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>

<?php
session_start();
?>
<body>
  <div class="wrapper">
    <header>Login Form</header>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">      
          <input type="email" name="Email" placeholder="Enter Email"class="email" >
             
          <input type="password" name="Password" placeholder="Enter Password"class="pass">
           
      <input type="submit" name="submit" value="Login" class="loginbtn">
    </form>

    <?php
                   if(isset($_POST["submit"])){
                    $Email = $_POST['Email'];
                    $PASSWORD = $_POST['Password'];

                    $db_server = "localhost";
                    $db_user = "root";
                    $db_password = "";
                    $db_name = "applogin";
                    $db_port = "3333";
                    
                    $conn = mysqli_connect($db_server,$db_user,$db_password,$db_name,$db_port); 
                        $chksql ="SELECT COUNT(Email) as EMAILS FROM USERCREDENTIAL WHERE EMAIL= '$Email' ";
                        $chkResult=mysqli_query($conn,$chksql);
                        $getResult= mysqli_fetch_array($chkResult);
                        $chknum = $getResult['EMAILS'];
                        if($chknum != 0){
                          echo "1";
                          $sql = "SELECT * FROM USERCREDENTIAL WHERE EMAIL= '$Email' ";
                          $results=mysqli_query($conn,$sql);
                          $row = mysqli_fetch_array($results);
                          if(MD5($PASSWORD)==$row['PASSWORDS']) {
                              $_SESSION['id'] = $row[0];
                              header("Location: http://localhost/application/Home.php");
                              exit();
                            
                          }

                    
                        else{
                          echo'<script>alert("Wrong Login Credentials");</script>';
                          
                        }
                        
                        }
                      }
 
                        


                   
                  
              ?>
    <div> <p>Click Register if Not Registered</p><button type="button" onclick="location.href='RegistrationPage.php'"class="regButton" >Register</button></div>
  </div>

  
</body>

</html>