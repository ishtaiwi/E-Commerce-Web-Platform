<?php 
session_start();
$servername="localhost";
$username= "root";
$password= "";
$dbname= "ecommerce";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {

    die("connection failed".$conn->connect_error);}
    $sql1 = "SELECT cart.`id`,cart.`product_id`, cart.`quantity`,products.prod_name,products.prod_image,products.prod_price FROM `cart` INNER JOIN products ON cart.product_id=products.prod_id WHERE user_id=".$_SESSION['id'];
    $currentDate = date("Y-m-d H:i:s");
            $result = $conn->query($sql1);
            $sql = "INSERT INTO `orders`(`UserID`, `OrderDate`) VALUES ('".$_SESSION['id']."','$currentDate')";
           
            $conn->query($sql);
            $last_inserted_id = $conn->insert_id;
            if(!$result){
                die("".$conn->error);
            }
            $subtotal=0;
               $total=0;
            while($row = $result->fetch_assoc()){
                $total=0;
                $total=$row["prod_price"]*$row["quantity"];
              $sqlu="INSERT INTO `orderdetails`(`OrderID`, `ProductID`, `Quantity`, `Subtotal`) VALUES ('$last_inserted_id','$row[product_id]','$row[quantity]','$total')";
                $conn->query($sqlu);
                $subtotal+=$total;
            }
          $sqlf= "UPDATE `orders` SET `TotalAmount`='$subtotal' WHERE `OrderID`=$last_inserted_id";
          $conn->query($sqlf);
          $conn->close();

          header("location: index.php");
         
?>