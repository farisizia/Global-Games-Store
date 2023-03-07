<?php
session_start();
require 'functions.php';

$id_product = $_GET["id_product"];

$product_view = mysqli_query($conn,"SELECT * FROM orderproduct WHERE id_product = $id_product ");
$rows_view = mysqli_fetch_assoc($product_view);

$id_products = $rows_view['id_product'];
$id_order = $rows_view['id_order'];




if ($id_products == $id_product) {
	
 echo "<script>
          alert('Your Product HAS BEEN SOLD OUT , Please go to validation')
          document.location.href = 'validation.php?id_order=$id_order';

         </script>";
  } else {

  	 echo "<script>
          alert('still available')
          document.location.href = 'selling.php';

         </script>";
  }
?>