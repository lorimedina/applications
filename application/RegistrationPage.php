<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registration Page</title>


   


    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />
</head>

<body>
    <div class="container">
        <header>Signup</header>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"method="post">
                    <input type="name" name="username" placeholder="Enter Username" class="username" />
                    <br>
                    <input type="email" name="email" placeholder="Enter Email" class="email" />
                    <br>
                    <input type="password" name="pass" placeholder="Enter Password" class="password" />
                    <br>
                    <input type="password"name="cpass" placeholder="Confirm Password" class="cPassword" />
                    <br>
                
                <input type="submit" name="submit" value="Register" />
            
        </form>
        <?php
         
                    $UsernameEmpty = "";
                    $EmailEmpty = "";
                    $PasswordEmpty = "";
                    $CPasswordEmpty = "";
                    $UsernameMatch = "";
                    $EmailMatch = "";

                   if(isset($_POST["submit"])){

                    if(empty($_POST['username'])){ 
                        $UsernameEmpty = "Username Field Empty";
                        echo $UsernameEmpty; }
                    if(empty($_POST['email'])){
                        $EmailEmpty = "Email Field Empty";
                        echo $EmailEmpty ;}
                    if(empty($_POST['pass'])){
                        $PasswordEmpty = "Password Field Empty";
                        echo $PasswordEmpty;}
                    if(empty($_POST['cpass'])){
                        $CPasswordEmpty = "Confirm Password Field Empty";
                        echo $CPasswordEmpty;}


                    $USERNAME=$_POST['username'];
                    $EMAIL=$_POST['email'];
                    $pass=$_POST['pass'];
                    $cpass=$_POST['cpass'];

                    $db_server = "localhost";
                    $db_user = "root";
                    $db_password = "";
                    $db_name = "applogin";
                    $db_port = "3333";
                    $con = "";
                    $conn = mysqli_connect($db_server,$db_user,$db_password,$db_name,$db_port);  

                    if ($UsernameMatch== ""){
                        $sql = "SELECT USERNAME FROM USERCREDENTIAL WHERE USERNAME = '$USERNAME' ;";
                        $results=mysqli_query($conn,$sql);
                        if ($results)
                        {  
                            $row = mysqli_num_rows($results); 
                               if ($row != 0){
                                     echo "<h3><b>SIMILAR USERNAME ALREADY EXIST</b></h3>";
                                     $UsernameMatch = "ERROR";
                                  } 
                                else{
                                    $UsernameMatch ="";
                                }
    
                        }
                    }
                    if ($EmailMatch== ""){
                        $sql = "SELECT EMAIL FROM USERCREDENTIAL WHERE EMAIL = '$EMAIL' ;";
                        $results=mysqli_query($conn,$sql);
                        if ($results)
                        {  
                            $row = mysqli_num_rows($results); 
                               if ($row != 0){
                                     echo "<h3><b>SIMILAR EMAIL ALREADY EXIST</b></h3>";
                                     $EmailMatch = "ERROR";
                                  } 
                                else{
                                    $EmailMatch ="";
                                }
    
                        }
                    }

                    if($pass==$cpass&&$EmailMatch ==""&&$UsernameMatch== ""){
                        echo"2";
                        $PASSWORD=md5($pass);


                        $sql = "INSERT INTO USERCREDENTIAL(USERNAME,EMAIL,PASSWORDS) VALUES ('$USERNAME','$EMAIL','$PASSWORD')";
                        $results=mysqli_query($conn,$sql);
                        echo '1';

                    }
                    else{
                        echo"Password Does not Match";
                        echo $pass;
                        echo $cpass;
                    }

                    
                 
                        
                        
                      }
                          
                        


                   
                  
              ?>
        <a href="LoginPage.php">Return to Login</a>
    </div>

</body>

</html>