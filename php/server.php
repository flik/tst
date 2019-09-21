<?php

/**
 *  
 *
 * @package  PHP Custom Script
 * @author   Muhammad Ashfaq <ashfaqzp@gmail.com>
 */

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

if(isset($_GET['order_product'])) {
    print_r($_POST); 
    exit;
}

$sql = 'SELECT customerNumber, customerName, contactLastName, contactFirstName, phone,  creditLimit  FROM `customers` WHERE 1 ';
 
 if(isset($_GET['customer'])) {
    $sql = 'SELECT Product_Name, quantityOrdered, orderDate, `status`, comments  FROM `ordersview` WHERE customerNumber='.$_GET['customer'];
 }

 if(isset($_GET['products'])) {
    $sql = 'SELECT productCode, productName, productScale, productVendor, `productDescription`, quantityInStock, buyPrice  FROM `products` WHERE 1';
 }
 
$str = '{"data": [';
   
$result  =  $conn->query($sql);


$i = 0;
 
if(isset($_GET['customers'])) {
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {

                $row['orders'] = "<a href='http://localhost/tst/orders.php?customer=".$row['customerNumber']."'> Detail </a>";

                $row['customerName'] = "<a href='http://localhost/tst/Products.php?products=1&selected=".$row['customerNumber']."'>".$row['customerName']."</a>";

            if(($result->num_rows-1) == $i)
                $str .= json_encode($row);
            else
                $str .= json_encode($row).',';

            $i++;
        }
    }
}

if(isset($_GET['products'])) {
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
   
            if(isset($row['productCode'])){ 
                $row['Order'] = " <a href='http://localhost/tst/checkout.php?customer=".$_GET['selected']."&product=".$row['productCode']."'> Order </a>";
                //$row['Order'] = "<input type='text'  id='qty'  name='qty'> <br><a href='javascript:{}' onclick='order(".$_GET['selected'].",".$row['productCode'].")'> Order </a>";
               
                unset($row['productCode']);
            }else
                $row['Order'] = 'Order';
            
            if(($result->num_rows-1) == $i)
                $str .= json_encode($row);
            else
                $str .= json_encode($row).',';
            $i++;
        }
    }
} 

if(isset($_GET['customer'])) {
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {

            $row['Product_Name'] = "<a href='#'> ".$row['Product_Name']." </a>";

            if(($result->num_rows-1) == $i)
                $str .= json_encode($row);
            else
                $str .= json_encode($row).',';
            $i++;
        }
    }
}

echo $str .= ']}'; 
//