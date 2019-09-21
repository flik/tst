<!DOCTYPE html>
<html lang="en">
  <head>
    
    <title>test</title>
  
    <!-- Custom styles for this template -->
    <link href="css/jquery.dataTables.min.css" rel="stylesheet" />
  </head>

  <body>
    <h1>You can select customer and check detail of orders related customer </h1>
  <h2><a href='http://localhost/tst/customers.php?customers=1'> Customers </a> </h2>
  <hr>

    <table id="example" class="display" style="width:100%">
      <thead>
          <tr>
              <th>customerNumber</th>
              <th>customerName</th>
              <th>contactLastName</th>
              <th>contactFirstName</th>
              <th>phone.</th> 
              <th>creditLimit</th> 
              <th>Orders</th> 
          </tr>
      </thead>
      <tfoot>
          <tr>
              <th>customerNumber</th>
              <th>customerName</th>
              <th>contactLastName</th>
              <th>contactFirstName</th>
              <th>phone.</th> 
              <th>Orders</th>  
          </tr>
      </tfoot>
  </table>

    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script>
      $(document).ready(function() {
    $('#example').DataTable( {
        "ajax": "http://localhost/tst/php/server.php?customers=1",
        "columns": [
            { "data": "customerNumber" },
            { "data": "customerName" },
            { "data": "contactLastName" },
            { "data": "contactFirstName" },
            { "data": "phone" }, 
            { "data": "creditLimit" },
            { "data": "orders" }
        ]
    } );
} );
    </script> 
  </body>
</html>
