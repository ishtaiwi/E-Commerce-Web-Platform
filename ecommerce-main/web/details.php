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
    <?php session_start();?>

    <script>
       url=window.location.href;
       searchparams = new URL(url).searchParams;
      
      const urlParams = new URLSearchParams(window.location.search);
      const prodidParam = urlParams.get('prodid');
        const imageUrlParam = urlParams.get('productImg');
        const priceparam = urlParams.get('productPrice');
        const productNameParam = urlParams.get('productName');
       
        const decodedImageUrl = decodeURIComponent(imageUrlParam);

       
        document.addEventListener('DOMContentLoaded', function () {
            idelement = document.getElementById('proid');

             imgElement = document.getElementById('detailsimg');
             pricelement = document.getElementById('pprice');
            nameelement = document.getElementById('pname');
             imgElement.src = decodedImageUrl;
             pricelement.innerHTML = priceparam;
             nameelement.innerHTML = productNameParam;
             idelement.value=prodidParam;
           
});
      

    </script>
   
</head>
<body>

   

    <section class="menud">
        
        <nav class="navbar">
          
            <div class="logo"><h1>E-Mart</h1></div>
            <input type="checkbox" id="check">
            <label for="check" class="checkbutton"><i class="fa fa-bars"> </i></label>
            <ul class="menu">
                <li><a href="index.php">home</a></li>
                <li> <a href="shop.php">products</a></li>
                <li><a href="about.html">about</a></li>
                <li><a href="">contact us</a></li>
                <li><a href="cart.php"><i class="fa-solid fa-basket-shopping"></i></a></li>
            </ul>
        </nav>
    </section>


    <section class="ss">
        <div class="pp">
            <img id="detailsimg" src="" alt="">

        </div>
        <form method="post">
            <input type="hidden" value="" id="proid" name="proid">
        <div class="word">
            <h6>Home / T-Shirt</h6>
            <h3 id="pname">Men's Fashion T Shirt</h3>
            <h2 id="pprice">$139.00</h2>
            <select name="size" id="size">
                <option value="">select size</option>
                <option value="">small</option>
                <option value="">large</option>
                <option value="">xl</option>
                <option value="">xxl</option>
            </select>
            <input type="number" value="0" step="1" min="0" name="qty" id="qty">
           
            <input type="submit"  id="atc" value="Add to cart" name="atc">
            <h4>Product Details</h4>
            <p>
                The Gildan Ultra Cotton T-shirt is made from a substantial 6.0 oz. per sq. yd. 
                fabric constructed from 100% cotton, this classic fit preshrunk
                jersey knit provides unmatched comfort with each wear. Featuring 
                a taped neck and shoulder, and a seamless double-needle collar,
                and available in a range of colors, it offers it all in the ultimate
                head- turning package.
            </p>
        </div>
        </form>
    </section>

    <section class="Featured">
        <h2>Featured Products</h2>
        <p>Summer Collection New modren Design</p>
        <div class="grid-container">
        <div class="grid-item">
            <img src="img/shop/f1.jpg" alt="">
            <div class="des">
                <span>adidas</span>
                <h5>Cartoon Astronaut T-Shirts</h5>
                <div class="star">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                </div>
                <h4>$78</h4>
                <div>
                    <a href="" class="os"><i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="grid-item">
            <img src="img/shop/f2.jpg" alt="">
            <div class="des">
                <span>adidas</span>
                <h5>Cartoon Astronaut T-Shirts</h5>
                <div class="star">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                </div>
                <h4>$78</h4>
                <div>
                    <a href="" class="os"><i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="grid-item">
            <img src="img/shop/f3.jpg" alt="">
            <div class="des">
                <span>adidas</span>
                <h5>Cartoon Astronaut T-Shirts</h5>
                <div class="star">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                </div>
                <h4>$78</h4>
                <div>
                    <a href="" class="os"><i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="grid-item">
            <img src="img/shop/f4.jpg" alt="">
            <div class="des">
                <span>adidas</span>
                <h5>Cartoon Astronaut T-Shirts</h5>
                <div class="star">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                </div>
                <h4>$78</h4>
                <div>
                    <a href="" class="os"><i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    </section>

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
            <p><strong>Address:</strong>Rafidia-street25,Nablus</p>
            <p><strong>Phone:</strong>+970 568 446 291</p>
            <p><strong>Hours:</strong>10:00 AM - 10:00 PM , sat - thu </p>
            <div class="follow">
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











<?php 
if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["atc"])){
    
    $servername="localhost";
    $username= "root";
    $password= "";
    $dbname= "ecommerce";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {

        die("connection failed".$conn->connect_error);}
    if($_POST["qty"]!=0){
        $sql = "INSERT INTO `cart`(`user_id`, `product_id`, `quantity`) VALUES ('".$_SESSION["id"]."','".$_POST["proid"]."','".$_POST["qty"]."')";
        
        if ($conn->query($sql) === TRUE) {
            echo "
            <div class='message-container'>
           <div class='message-box'>
             <p><i class='fa-solid fa-check' style='color: #0caa09;'></i>Added succesfully.</p>
           </div>
         </div>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

    } else {
        echo "
            <div class='message-container'>
           <div class='message-box'>
             <p>Please choose quantity.</p>
           </div>
         </div>";
    }


}

?>



</body>
</html>