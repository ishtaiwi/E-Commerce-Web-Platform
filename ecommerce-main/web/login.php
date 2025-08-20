<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
            $servername="localhost";
            $username= "root";
            $password= "";
            $dbname= "ecommerce";
            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {

                die("connection failed".$conn->connect_error);}
            if($_SERVER["REQUEST_METHOD"]=="POST"&&(isset($_POST['login']))) {
                $email=$_POST['email'];
                $password=$_POST['password'];
                $stmt = $conn->prepare("SELECT * FROM user WHERE email=?");
                $stmt->bind_param("s", $email);
            
                $stmt->execute();
                $result = $stmt->get_result();
                $row = $result->fetch_row();
            
                if ($result->num_rows > 0) {
                    
                    if (password_verify($password, $row[3])) {
                        
                        session_start();
                        $_SESSION['id'] = $row[2];
                        $_SESSION['username'] = $row[0];
                        $_SESSION['usertype'] = $row[5];
                        $_SESSION['valid'] = 1;
                        if( $_SESSION['usertype'] == 0){
                        header("Location: index.php");}
                       else if($_SESSION['usertype'] == 1){ header("Location: adminp.php");}
                    } else {
                        echo 'Password is incorrect.';
                    }
                    
                } else {
                    echo "Invalid credentials. Please try again.";
                }
            
                $stmt->close();
            }
            ?>   
</body>
</html>

