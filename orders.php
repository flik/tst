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
              <th>Product_Name</th>
              <th>quantityOrdered</th>
              <th>orderDate</th>
              <th>status</th>
              <th>comments</th>  
          </tr>
      </thead>
      <tfoot>
          <tr>
              <th>Product_Name</th>
              <th>quantityOrdered</th>
              <th>orderDate</th>
              <th>status</th>
              <th>comments</th>  
          </tr>
      </tfoot>
  </table>

    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script>
      $(document).ready(function() {
    $('#example').DataTable( {
        "ajax": "http://localhost/tst/php/server.php?customer=<?php echo $_GET['customer']; ?>",
        "columns": [
            { "data": "Product_Name" },
            { "data": "quantityOrdered" },
            { "data": "orderDate" },
            { "data": "status" },
            { "data": "comments" } 
        ]
    } );
} );
    </script> 
  </body>
</html>
