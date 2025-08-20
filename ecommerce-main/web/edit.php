<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Document</title>
    <link rel="stylesheet" href="add.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" 
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" 
    crossorigin="anonymous" 
    referrerpolicy="no-referrer" />
</head>
<body>


    <?php
if (isset($_GET['prod_id'])) {
    $prod_id = $_GET['prod_id'];

    $servername='localhost';
    $username= 'root';
    $password= '';
    $dbname= 'ecommerce';
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {

        die('connection failed'.$conn->connect_error);}
    
        $sql = 'SELECT * FROM `products` where prod_id='.$prod_id;
        $result = $conn->query($sql);

        if(!$result){
            die(''.$conn->error);
        }
       
        $row = $result->fetch_assoc();
         
    echo "

     <form  method='post'>
     <h1>Edit product</h1>
     <table>
       <tr>
         <td><label for='barcode'>Barcode:</label></td>
         <td><input id='barcode' name='barcode' type='text' value='".$row["prod_barcode"]."'></td>
       </tr>
       <tr>
         <td><label for='name'>Name:</label></td>
         <td><input id='name' name='name' type='text' value='".$row["prod_name"]."'></td>
       </tr>
       <tr>
         <td><label for='price'>Price:</label></td>
         <td><input id='price' name='price' type='text' value='".$row["prod_price"]."'></td>
       </tr>
       <tr>
         <td><label for='des'>Description:</label></td>
         <td><input id='des' name='des' type='text' value='".$row["prod_des"]."'></td>
       </tr>
       <tr>
         <td><label for='image'>Image URL:</label></td>
         <td><input id='image' name='image' type='text' value='".$row["prod_image"]."'></td>
       </tr>
       <tr>
         <td><label for='qty'>Quantity:</label></td>
         <td><input id='qty' name='qty' type='text' value='".$row["quantity"]."'></td>
       </tr>
       <tr>
         <td><label for='sec'>Choose section:</label></td>
         <td>
           <input list='sec' name='sec' id='sec' value='".$row["section"]."'>
           <datalist id='sections'>
           <option value='f'>
           <option value='n'>
           </datalist>
         </td>
       </tr>
     </table>
   
     <input type='submit' value='edit' name='edit'>
     <input type='submit' value='delete' name='delete' id='deletebtn'>
   </form>";

    }
    ?>
    <button id="bcbtn" onclick="window.location.href = 'adminp.php'; "><i class="fa-solid fa-backward" style="color: #fafafa;"></i> back</button>

<?php if (isset($_POST['edit'])) {

$servername="localhost";
$username= "root";
$password= "";
$dbname= "ecommerce";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {

    die("connection failed".$conn->connect_error);}

    $sql = "UPDATE `products` SET `prod_barcode`='".$_POST['barcode']."', `prod_name`='".$_POST['name']."', `prod_des`='".$_POST['des']."', `prod_price`='".$_POST['price']."', `prod_image`='".$_POST['image']."', `quantity`='".$_POST['qty']."', `section`='".$_POST['sec']."', `cat_id`='1'  WHERE `prod_id`=".$prod_id;

    if ($conn->query($sql) === TRUE) {
      echo "New record updated successfully";
      header("Location: http://localhost/ecommerce/web/adminp.php");
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
  }
  
  if (isset($_POST['delete'])) {

    $servername="localhost";
    $username= "root";
    $password= "";
    $dbname= "ecommerce";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
    
        die("connection failed".$conn->connect_error);}
    
        $sql = "DELETE FROM `products` WHERE `prod_id`=".$prod_id;
    
        if ($conn->query($sql) === TRUE) {
            header("Location: http://localhost/ecommerce/web/adminp.php");
          
      } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
      }
      }
  ?> 
</body>
</html>