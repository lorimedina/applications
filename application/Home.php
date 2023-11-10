<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>HOME PAGE</title>


    <link rel="stylesheet" href="homestyles.css" />


    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />
</head>

<body>
    <div>
    <button type="button" id="logout" onclick="location.href='LoginPage.php'" >Logout</button>
    <script>
    document.getElementById('logout').onclick = function() {
    
    window.location.href = 'loginPage.php';
};</script>
    </div>
<?php session_start(); 
       $id =$_SESSION['id'];


        $db_server = "localhost";
        $db_user = "root";
        $db_password = "";
        $db_name = "applogin";
        $db_port = "3333";
        $con = "";
        $conn = mysqli_connect($db_server,$db_user,$db_password,$db_name,$db_port);
        $sql = "SELECT CONTENTID,TITLE,CONTENT,CONTENTDATE FROM USERCONTENT WHERE USERID = '$id'";
        $results=mysqli_query($conn,$sql);
        


        while($row = $results->fetch_assoc()) {
            echo'<hr>'; 
            $contentID=$row['CONTENTID']; 
            echo 'TITLE:';
            echo '<br>';
            echo($row["TITLE"] . "<BR>");
            echo 'Content:';
            echo '<br>';
            echo($row["CONTENT"] . "<BR>");
            echo 'Date Posted:';
            echo '<br>';
            echo($row["CONTENTDATE"] . "<BR>");
            echo "<a href='delete.php?contentid=$contentID'class='del'>Delete  </a>";
            echo "<a href='EditPost.php?contentid=$contentID'class='edi'>  Edit</a><br>";
         
            
           
  
        };
     
     ?>
    
    <div class="container">
    
    
    
     <?php
    
     ?>  
    </div>
    <div class="container">
    <button type="button" onclick="redirectToCreatePost()">Create new post</button>
    

<script>
function redirectToCreatePost() {
    var id = "<?php echo $id; ?>";
    window.location.href = 'CreatePost.php?id=' + id;
}
</script>
       
    </div>

</body>

</html>