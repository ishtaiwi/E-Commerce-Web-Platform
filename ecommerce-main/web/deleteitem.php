<?php 
if(isset($_GET["id"]) ) {

    $servername="localhost";
    $username= "root";
    $password= "";
    $dbname= "ecommerce";
    $conn = new mysqli($servername, $username, $password, $dbname);
   
    
        $sql = "DELETE FROM `cart` WHERE `id`=".$_GET["id"];
    
        $conn->query($sql);
}
header("location: /ecommerce/web/cart.php");
exit();
?>