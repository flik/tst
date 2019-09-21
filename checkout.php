<!DOCTYPE html>
<html lang="en">
<head>
  <title>Checkout Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery-3.3.1.js"></script>
  <script src="js/bootstrap.min.js"></script>
  
<script>

  function order(stock ) {
    var quantity =  parseInt($('#qty').val()); 
    if(isNaN(quantity)){
      alert("Quantity field required!");
      return false;
    }
       
    var dat = $("#product_form").serialize();
    $.post('http://localhost/tst/php/server.php?order_product=1', dat, function(data, status){
        alert("Data: " + data + "\nStatus: " + status);
      }).done(function() {
      alert( "second success" );
      })
      .fail(function() {
      alert( "error" );
      })
      .always(function() {
      alert( "finished" );
      });
  }

  $(document).ready(function() {

  });

</script>

</head>
<body>
<hr><h2><a href='http://localhost/tst/customers.php?customers=1'> Customers </a> </h2>
<hr>
<?php

$servername = "localhost";
$username = "xuser";
$password = "xuser";
$dbname = "classicmodels";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
  
$i = 0;
 
if(isset($_GET['customer'])) {
    $sql = "SELECT productCode, productName, productScale, productVendor, `productDescription`, quantityInStock, buyPrice  FROM `products` WHERE productCode='".$_GET['product']."';";

    $result  =  $conn->query($sql);
    $data = array();
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
         $data = $row ;
        }
      }
    }
?>

<div class="container">
  <h2>Product Detail</h2>
  <form action="#" id="product_form">
    <div class="form-group">
      <label  >Product Name: </label> <?php echo $data['productName']; ?><br>
      <label  >Product Scale: </label> <?php echo $data['productScale']; ?><br>
      <label  >Product Vendor: </label> <?php echo $data['productVendor']; ?><br>
      <label  >Product Description: </label> <?php echo $data['productDescription']; ?><br>
      <label  >Product Price: </label> <?php echo $data['buyPrice']; ?><br>
    </div>
    <div class="form-group col-xs-2">
      <label  >Quantity:</label>
      <input type="text" class="form-control col-xs-2" id="qty" value="1" placeholder="quantity" name="qty"> 
      <input type="hidden" value="<?php echo $_GET['product']; ?>" id="product" name="product">
      <input type="hidden" value="<?php echo $_GET['customer']; ?>" id="customer"  name="customer"> 

    </div>
    <hr>
    <button type="button" class="btn btn-default" onclick="order(<?php echo $data['quantityInStock']; ?>)"> Order </button>
  </form>
</div>

</body>
</html>
