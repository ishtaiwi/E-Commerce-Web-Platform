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
<?php 
session_start();
if ((!(isset($_SESSION['valid'])))||$_SESSION['valid']!=1) {
   
   
    header("Location: http://localhost/ecommerce/web/login.html");
   }

?>
    <section class="menud">
        
        <nav class="navbar">
          
            <div class="logo"><h1>E-Mart</h1></div>
            <input type="checkbox" id="check">
            <label for="check" class="checkbutton"><i class="fa fa-bars"> </i></label>
            <ul class="menu">
                <li><a href="index.php" >home</a></li>
                <li> <a href="shop.php">products</a></li>
                <li><a href="about.html">about</a></li>
                <li><a href="">contact us</a></li>
                <li><a href="#" class="active"><i class="fa-solid fa-basket-shopping"></i></a></li>

            </ul>
        </nav>
    </section>

    

    <section class="cartImg">
        <h1>&#x23 cart</h1>
    </section>

    <section id="cart" class="cc" >
        <table width="100%">
            <thead>
                <tr>
                    <td>Remove</td>
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
           
               $sql = "SELECT cart.`id`,cart.`product_id`, cart.`quantity`,products.prod_name,products.prod_image,products.prod_price FROM `cart` INNER JOIN products ON cart.product_id=products.prod_id WHERE user_id=".$_SESSION['id'];
               $result = $conn->query($sql);

               if(!$result){
                   die("".$conn->error);
               }
               $subtotal=0;
               $total=0;
               while($row = $result->fetch_assoc()){
                $total=0;
                $total=$row["prod_price"]*$row["quantity"];
                $subtotal+=$total;
           
           
           
           echo "<tbody>
                <tr>
                    <td><a href='deleteitem.php?id=$row[id]'><i class='far fa-times-circle'></i></a></td>
                    <td><img src='".$row["prod_image"]."' alt=''></td>
                    <td>".$row["prod_name"]."</td>
                    <td>$".$row["prod_price"]."</td>
                    <td>
                        ".$row["quantity"]."</td>
                        <td>$".$total."</td>
                </tr>
            </tbody>";} 

           echo"


        </table>
    </section>";
echo"
<form action='placeorder.php' method='post'>
    <div id='subtotal'>
        <h3>Cart Totals</h3>
        <table>
            <tr>
                <td>Cart subtotal</td>
                <td>$ ".$subtotal."</td>
            </tr>
            <tr>
                <td>Shipping</td>
                <td>Free</td>
            </tr>
            <tr>
                <td><strong>Total</strong></td>
                <td><strong>$".$subtotal."</strong></td>
            </tr>
        </table>
        <input type='submit' value='place order' name='pros' class='normal'>
    </div>
    </form>
";
    ?>

    <footer class="foo">
        <div class="col">
            <h1>E-Mart</h1>
            <h4>Contact</h4>
            <p><strong>Address:</strong>Rafidia-street25,Nablus</p>
            <p><strong>Phone:</strong>+970 568 446 291</p>
            <p><strong>Hours:</strong>10:00 AM - 10:00 PM , sat - thu </p>
            <div class="folloe">
                <h4>Follow us</h4>
                <div class="icon">
                    <i class="fab fa-facebook" aria-hidden="true"></i>
                    <i class="fab fa-instagram" aria-hidden="true"></i>
                    <i class="fab fa-youtube" aria-hidden="true"></i>
                </div>
            </div>
        </div>

        <div class="col">
            <h4>About</h4>
            <a href="#">About us</a>
            <a href="#">Delivary Information</a>
            <a href="#">Privacy Policy</a>
            <a href="#"> contact us</a>
        </div>


        <div class="col">
            <h4>My Account</h4>
            <a href="#">Sign In</a>
            <a href="#"> View Cart</a>
            <a href="#"> My Wishlist</a>
            <a href="#"> Help</a>
        </div>

        <div class="col install" >
            <h4>Install App</h4>
            <p>From Add Store or Google Play</p>
            <div claa=" row">
                <img src="img/shop/app.jpg" alt="">
                <img src="img/shop/play.jpg" alt="">
            </div>
            <p>Secured Payment Geteways</p>
            <img src="img/shop/pay.png" alt="">
        </div>
    </footer>


</body>


