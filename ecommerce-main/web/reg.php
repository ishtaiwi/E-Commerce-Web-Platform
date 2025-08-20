<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecommerce";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['reg'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $bdate = $_POST['bdate'];

    $passwordhash = password_hash($password, PASSWORD_DEFAULT);
    $sql = "SELECT * FROM user WHERE user_name ='". $username."'";
    $result = $conn->query($sql);
    if(mysqli_num_rows($result)>0){
        echo"user name already in use";
        
    }
    else{
        $sql = "SELECT * FROM user WHERE email ='". $email."'";
        $result = $conn->query($sql);
        if(mysqli_num_rows($result)>0){echo"email already in use";}

        else{
    $stmt = $conn->prepare("INSERT INTO `user`(`user_name`, `email`,`user_pass`,`user_bd`) VALUES (?,?,?,?)");
    $stmt->bind_param("ssss", $username, $email ,$passwordhash,$bdate);

    $result = $stmt->execute();

    if ($result) {
        $stmt->close();
        header("Location: login.html");
    } else {
        echo "Error registering user: " . $conn->error;
    }
        }
}}

$conn->close(); 

?>
  
</body>
</html>
