<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Create Post Page</title>


    <link rel="stylesheet" href="post.css" />


    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />
</head>

<body>
<div>
    <button type="button" id="logout" onclick="location.href='LoginPage.php'" class="loginbtn">Logout</button>
    <script>
    document.getElementById('logout').onclick = function() {
    
    window.location.href = 'loginPage.php';
};</script>
    </div>
    <?php session_start();
    $id =$_GET['id'];
    $userid =$_SESSION['id'];
    ?>

    <div class="container">
    <header>Create Post</header>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      
          <label>TITLE</label>
          <input type="name" name="Title" placeholder="Enter Title">

       
     
          <br>
          <label>CONTENT</label>
          <textarea name="Content" placeholder="Enter Content"></textarea>
          <br>

     
    
      <input type="submit" name="submit" value="Post">
    </form>
    <?php
                   if(isset($_POST["submit"])){
                    $Title = $_POST['Title'];
                    $Content = $_POST['Content'];
                    $Date = date('Y-m-d H:i:s');
                        $db_server = "localhost";
                        $db_user = "root";
                        $db_password = "";
                        $db_name = "applogin";
                        $db_port = "3333";
                        $con = "";
                        $conn = mysqli_connect($db_server,$db_user,$db_password,$db_name,$db_port);  
                        $sql = "INSERT INTO USERCONTENT(TITLE,USERID,CONTENT,CONTENTDATE) VALUES ('$Title','$userid','$Content','$Date')";
                        $results=mysqli_query($conn,$sql);
                        header("Location: http://localhost/application/Home.php");
                        exit();
                  

                        
                        }
                      
           
              ?>
    </div>

</body>

</html>