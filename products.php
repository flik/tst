<!DOCTYPE html>
<html lang="en">
  <head>
    
    <title>test</title>
  
    <!-- Custom styles for this template -->
    <link href="css/jquery.dataTables.min.css" rel="stylesheet" />
  </head>

  <body>
  <hr>
  <h2><a href='http://localhost/tst/customers.php?customers=1'> Customers </a> </h2>
  <hr>

    <table id="example" class="display" style="width:100%">
      <thead>
          <tr>
              <th>productName</th>
              <th>productScale</th>
              <th>productVendor</th>
              <th>productDescription</th>
              <th>quantityInStock</th>  
              <th>buyPrice</th>  
              <th>Order</th> 
          </tr>
      </thead>
      <tfoot>
          <tr>
              <th>productName</th>
              <th>productScale</th>
              <th>productVendor</th>
              <th>productDescription</th>
              <th>quantityInStock</th>  
              <th>buyPrice</th> 
              <th>Order</th> 
          </tr>
      </tfoot>
  </table>

    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script>
      $(document).ready(function() {

        function order(id,idb) {
        alert(id);
      }

    $('#example').DataTable( {
        "ajax": "http://localhost/tst/php/server.php?products=1&selected=<?php echo $_GET['selected']; ?>",
        "columns": [
            { "data": "productName" },
            { "data": "productScale" },
            { "data": "productVendor" },
            { "data": "productDescription" },
            { "data": "quantityInStock" },
            { "data": "buyPrice" },
            { "data": "Order" }
        ]
    } );

    
} );
    </script> 
  </body>
</html>
