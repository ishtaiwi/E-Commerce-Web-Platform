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
  
<style>
body {
  font-family: 'lato', sans-serif;
}
.container {
  max-width: 1000px;
  margin-left: auto;
  margin-right: auto;
  padding-left: 10px;
  padding-right: 10px;
}

h2 {
  font-size: 26px;
  margin: 20px 0;
  text-align: center;

}

.responsive-table {
  li {
    border-radius: 3px;
    padding: 25px 30px;
    display: flex;
    justify-content: space-between;
    margin-bottom: 25px;
	
  }
  .table-header {
    background-color: #088178;
    font-size: 14px;
    text-transform: uppercase;
    letter-spacing: 0.03em;
	color: #ffffff;
  }
  .table-row {
    background-color: #ffffff;
    box-shadow: 0px 0px 9px 0px rgba(0,0,0,0.1);
  }
  .col-1 {
    flex-basis: 20%;
  }
  .col-2 {
    flex-basis: 40%;
  }
  .col-3 {
    flex-basis: 25%;
  }
  .col-4 {
    flex-basis: 25%;
  }
 
  
  @media all and (max-width: 767px) {
    .table-header {
      display: none;
    }
    .table-row{
      
    }
    li {
      display: block;
    }
    .col {
      
      flex-basis: 100%;
      
    }
    .col {
      display: flex;
      padding: 10px 0;
      &:before {
        color: #6C7A89;
        padding-right: 10px;
        content: attr(data-label);
        flex-basis: 50%;
        text-align: right;
      }
    }
  }
}

.cc{
    padding: 40px 80px;
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: flex-start;
}
#cart table {
    width: 100%;
    border-collapse: collapse;
    table-layout: fixed;
    white-space: nowrap;
}
#cart table img {
    width:70px ;
}
#cart table thead {
    border: 1px solid #e2e9e1;
    border-left: none;
    border-right: none;
}
#cart table thead td {
    font-weight: 700;
    text-transform: uppercase;
    font-size: 13px;
    padding: 18px 0;
    text-align: center;
}

#cart table tbody tr td {
    padding-top: 15px;
}
#cart table tbody td {
    font-size: 13px;
    text-align: center;
}
#addp{
  width: 100%;
  background-color:  #088178;
  color: white;
  font-weight:bold;
  border: none;
  border-radius: 12px;
  height: 50px;
 margin: 5px 0;
  position: relative;
 
}
.vbtn{
  color: #088178;
  background:none;
  border: none;
}
.vbtn i:hover{
  color: red;
}

</style>

</head>
<body>

<?php 
session_start();
if ((!(isset($_SESSION['valid'])))||$_SESSION['valid']!=1||$_SESSION['usertype']!=1) {
   
   
    header("Location: http://localhost/ecommerce/web/login.html");
    session_unset();
   }

?>
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

   
<div class="container">
	
<div class="container">
  <h2>orders</h2>
  <ul class="responsive-table">
    <li class="table-header">
      <div class="col col-1">order Id</div>
      <div class="col col-2">Customer Name</div>
      <div class="col col-3">Amount </div>
      <div class="col col-4">Payment Status</div>
    </li>
   <?php 
     $servername="localhost";
	 $username= "root";
	 $password= "";
	 $dbname= "ecommerce";
	 $conn = new mysqli($servername, $username, $password, $dbname);
	 if ($conn->connect_error) {

		 die("connection failed".$conn->connect_error);}
		 else{

			$sql = "SELECT `orders`.`OrderID`, `user`.`user_name`, `orders`.`OrderDate`, `orders`.`TotalAmount`,`orders`.`payment` FROM `orders`,`user` WHERE user.user_id=orders.`UserID`";
            $result = $conn->query($sql);

            if(!$result){
                die("".$conn->error);
            }
            while($row = $result->fetch_assoc()){
				$status;
				if($row["payment"]==0){
					$status='pending';
				}else{
					$status='done';
				}
				
				echo "
				<form action='orderdet.php' method='post'>
				<li class='table-row'>
				<div class='col col-1' data-label='Order Id'>".$row["OrderID"]."</div>
				<div class='col col-2' data-label='Customer Name'>".$row["user_name"]."</div>
				<div class='col col-3' data-label='Amount'>$".$row["TotalAmount"]."</div>
				<div class='col col-4' data-label='Payment Status'>".$status."</div>
				<div class='col col-5' data-label='Payment Status'>
        <button type='submit' name='order'  class='vbtn' value='".$row["OrderID"]."'><i class='fa-solid fa-eye fa-xl' style='color: #0e8b5b;'></i></button>
        
        </form></div>
			  </li> ";
            }
  }

    ?>

	
  </ul>
</div>

<button id='addp' onclick="window.location.href = 'addprod.php'; ">add product</button>
<section id="cart" class="cc" >
        <table width="100%">
            <thead>
                <tr>
                  <td>edit</td>
                    <td>Image</td>
                    <td>Product</td>
                    <td>Quantity</td>
                    <td>Price</td>
                    
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
           
               $sql = "SELECT * FROM `products`";
               $result = $conn->query($sql);

               if(!$result){
                   die("".$conn->error);
               }
              
               while($row = $result->fetch_assoc()){
                
           echo "<tbody>
          
                <tr>

                <td><a href='edit.php?prod_id=".$row["prod_id"]."'><i class='fa-regular fa-pen-to-square'></i></a></td>                    
                <td><img src='".$row["prod_image"]."' alt=''></td>
                    <td>".$row["prod_name"]."</td>
                   
                    <td>".$row["quantity"]."</td>
                        <td>$".$row["prod_price"]."</td>
                       
                </tr>
               
            </tbody>";} 

           echo"


        </table>
    </section>";
$conn->close();
    ?>
</body>
</html>

