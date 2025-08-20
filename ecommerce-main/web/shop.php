<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" 
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" 
    crossorigin="anonymous" 
    referrerpolicy="no-referrer" />

    <script>
      
      function details(selectedId) {
        
        var selectedElement = document.getElementById(selectedId);
        x={
        prodid:selectedId,    
        productName : selectedElement.querySelector('h4').innerText,
        productPrice : selectedElement.querySelector('span').innerText,
        productImg :  encodeURIComponent(selectedElement.querySelector('img').src) 
        };

       const searchParameters=new URLSearchParams(x);
       const url1="details.php?"+searchParameters;
       window.location.href=url1;
    }
  
      
      </script>
</head>
<body>
    <section class="menud">
        
        <nav class="navbar">
          
            <div class="logo"><h1>E-Mart</h1></div>
            <input type="checkbox" id="check">
            <label for="check" class="checkbutton"><i class="fa fa-bars"> </i></label>
            <ul class="menu">
                <li><a href="index.php" >home</a></li>
                <li> <a href="#" class="active">products</a></li>
                <li><a href="about.html">about</a></li>
                <li><a href="">contact us</a></li>
                <li><a href="cart.php"><i class="fa-solid fa-basket-shopping"></i></a></li>

            </ul>
        </nav>
    </section>


    <section class="s2">
        <p class="s2p">Save more with coupons & up to 70% off!</p>
    </section>


    <section id="product1" class="s3">
    <div class="grid-container">

    <?php
            $servername="localhost";
            $username= "root";
            $password= "";
            $dbname= "ecommerce";
            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {

                die("connection failed".$conn->connect_error);}
            
                $sql = "SELECT * FROM PRODUCTS";
                $result = $conn->query($sql);

                if(!$result){
                    die("".$conn->error);
                }
                while($row = $result->fetch_assoc()){
                    echo " <div id='pro' >
                    <div class='grid-item' id='".$row["prod_id"]."' onclick='details(".$row["prod_id"].") '>
                        
                        <img src='".$row["prod_image"]."' alt=''>
                        <div class='des'>
                        <p>".$row["prod_name"]."</p>
                        <h4>".$row["prod_des"]."</h4>
                        <div class='stars'>
                        <i class='fa-solid fa-star' style='color: #ffdd00;'></i><i class='fa-solid fa-star' style='color: #ffdd00;'></i><i class='fa-solid fa-star' style='color: #ffdd00;'></i><i class='fa-solid fa-star' style='color: #ffdd00;'></i><i class='fa-solid fa-star' style='color: #ffdd00;'></i>
                        </div>
                       
                            <span>$".$row["prod_price"]."</span>
                           
            
                    </div>
                    <div>
                        <a class='addtocart' href='#'><i class='fa-solid fa-plus'></i></a>
                            </div>
                    </div>
                </div>";
                }

       
    ?></div>
    </section>
    <div class="bu">
        <button>1</button>
        <button>2</button>
        <button><i class="fa fa-arrow-right" aria-hidden="true"></i>
        </button>

    </div>

    <section id="newsletter">
        <div class="newsText">
            <h4>Sign Up For newsletter</h4>
            <p>Get E-mail update about our latest shop and <span>special offers</span></p>
        </div>
        <div class="form">
            <input type="email" placeholder="Your Email adderss">
            <button class normal>Sign Up</button>
        </div>

    </section>



    <footer class="foo">
        <div class="col">
            <h1>E-Mart</h1>
            <h4>Contact</h4>
            <p><strong>Address:</strong>Rafidia street,Nablus</p>
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
</html>