1.need to have a mysql  or other database to properly used

2.change all of this to your own db server settings:
	$db_server = "localhost";
        $db_user = "root";
        $db_password = "";
        $db_name = "applogin";
        $db_port = "3333";
        $con = "";
        $conn = mysqli_connect($db_server,$db_user,$db_password,$db_name,$db_port);
3. if using mssql change all parts with mysqli_code to sqlrsv

4. directly go to registration.php or login.php to start