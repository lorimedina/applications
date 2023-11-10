<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Page</title>


    <link rel="stylesheet" href="post.css" />


    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />
</head>

<body>
<?php session_start();


?>
<div>
    <button type="button" id="logout" onclick="location.href='LoginPage.php'" class="loginbtn">Logout</button>
    <script>
    document.getElementById('logout').onclick = function() {
    
    window.location.href = 'loginPage.php';
};</script>
    </div>
    <div class="container">
    <header>Edit Post</header>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <?php
                    $userid =$_SESSION['id'];
                    $conte = $_GET['contentid'];
                    
                   $db_server = "localhost";
                   $db_user = "root";
                   $db_password = "";
                   $db_name = "applogin";
                   $db_port = "3333";
                   $con = "";
                   $conn = mysqli_connect($db_server,$db_user,$db_password,$db_name,$db_port); 
                        $sql = "SELECT TITLE,CONTENT FROM USERCONTENT WHERE CONTENTID = '$conte'";
                        $results=mysqli_query($conn,$sql);
                        $row = mysqli_fetch_array($results);
                        $TITLE = $row[0];
                        $CONTENT = $row[1];
                              
                            
                          

                        
                        
                      
           
              ?>
          <label>TITLE</label>
          <input type="name" name="Title"class="title" value="<?php echo $conte; ?>">

       
     
          <br>
          <label>CONTENT</label>
          <textarea name="Content"class="content"><?php echo $CONTENT; ?></textarea>
          <br>
          <input type=text hidden name="uid"value="<?php echo $conte?>">

     
    
      <input type="submit" name="submit" value="Post" class="sub">
    </form>
    <?php
                   if(isset($_POST["submit"])){
                    $uid= $_POST['uid'];
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
                        $sql = "UPDATE USERCONTENT SET TITLE='$Title',CONTENT='$Content',CONTENTDATE='$Date' WHERE CONTENTID = '$uid'";
                        $results=mysqli_query($conn,$sql);
                        header("Location: http://localhost/application/Home.php");
                        exit();

                        
                        }
                      
           
              ?>
    </div>

</body>

</html>