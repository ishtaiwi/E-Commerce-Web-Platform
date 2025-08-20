<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="add.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" 
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" 
    crossorigin="anonymous" 
    referrerpolicy="no-referrer" />
</head>
<body>

<?php 
session_start();
if ((!(isset($_SESSION['valid'])))||$_SESSION['valid']!=1||$_SESSION['usertype']!=1) {
   
   
    header("Location: http://localhost/ecommerce/web/login.html");
    session_unset();
   }

?>

  <form  method="post">

  <h1>add product</h1>
    <table>
      <tr>
        <td><label for="barcode">Barcode:</label></td>
        <td><input id="barcode" name="barcode" type="text"></td>
      </tr>
      <tr>
        <td><label for="name">Name:</label></td>
        <td><input id="name" name="name" type="text"></td>
      </tr>
      <tr>
        <td><label for="price">Price:</label></td>
        <td><input id="price" name="price" type="text"></td>
      </tr>
      <tr>
        <td><label for="des">Description:</label></td>
        <td><input id="des" name="des" type="text"></td>
      </tr>
      <tr>
        <td><label for="image">Image URL:</label></td>
        <td><input id="image" name="image" type="text"></td>
      </tr>
      <tr>
        <td><label for="qty">Quantity:</label></td>
        <td><input id="qty" name="qty" type="text"></td>
      </tr>
      <tr>
        <td><label for="sec">Choose section:</label></td>
        <td>
          <input list="sec" name="sec" id="sec">
          <datalist id="sections">
          <option value="f">
          <option value="n">
          </datalist>
        </td>
      </tr>
    </table>
  
    <input type="submit" value="Add" name="add">
  </form>
  <button id="bcbtn" onclick="window.location.href = 'adminp.php'; "><i class="fa-solid fa-backward" style="color: #fafafa;"></i> back</button>

  <?php if (isset($_POST['add'])) {

$servername="localhost";
$username= "root";
$password= "";
$dbname= "ecommerce";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {

    die("connection failed".$conn->connect_error);}

    $sql = "INSERT INTO `products`(`prod_barcode`, `prod_name`, `prod_des`, `prod_price`, `prod_image`, `quantity`, `section`, `cat_id`) VALUES ('".$_POST['barcode']."','".$_POST['name']."','".$_POST['des']."','".$_POST['price']."','".$_POST['image']."','".$_POST['qty']."','".$_POST['sec']."','1')";

    if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
  }?> 

</body>
</html>