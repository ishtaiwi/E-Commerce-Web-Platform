<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" 
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" 
    crossorigin="anonymous" 
    referrerpolicy="no-referrer" />

    <title>Document</title>
</head>
<body>
    
<section class="menud">
        
        <nav class="navbar">
          
            <div class="logo"><h1>E-Mart</h1></div>
            <input type="checkbox" id="check">
            <label for="check" class="checkbutton"><i class="fa fa-bars"> </i></label>
            <ul class="menu">
              
                <li> <a href="">products</a></li>
                <li><a href="">orders</a></li>
                
            

            </ul>
        </nav>
    </section>

    

    <section class="cartImg">
       <?php
        echo" <h1>order :&#x23 ".$_POST["order"]."</h1>";
        ?>
    </section>

    <section id="cart" class="cc" >
        <table width="100%">
            <thead>
                <tr>
                    
                    <td>Image</td>
                    <td>Product</td>
                    <td>Price</td>
                    <td>Quantity</td>
                    <td>Subtotal</td>
                </tr>
            </thead>
            <?php

$servername="localhost";
$username= "root";
$password= "";
$dbname= "ecommerce";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {

    die("connection failed".$conn->connect_error);}
    else{

       $sql = "SELECT  products.prod_name,products.prod_image,products.prod_price,orderdetails.`Quantity`, orderdetails.`Subtotal` FROM `orderdetails`,products WHERE products.prod_id=orderdetails.ProductID AND OrderID=".$_POST["order"];
       $result = $conn->query($sql);

       if(!$result){
           die("".$conn->error);
       }
       while($row = $result->fetch_assoc()){
          
        echo"
        <tbody>
            <tr>
                
                <td><img src='".$row["prod_image"]."' alt=''></td>
                <td>".$row["prod_name"]."</td>
                <td>$".$row["prod_price"]."</td>
                <td>".$row["Quantity"]."</td>
                <td>".$row["Subtotal"]."</td>
                
            </tr>
        </tbody>";
       }
    }
          

           
?>

        </table>
    </section>

   

</body>


