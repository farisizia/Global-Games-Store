<?php

require '../functions.php';

$id_product = $_GET["id"];

if (delete_product($id_product) > 0) {
	 echo "<script>
          alert('product successfully deleted')
            document.location.href = 'product.php';
         </script>";
          
} else {
	 echo "<script>
          alert('product unsuccess deleted')
            document.location.href = 'product.php';
         </script>";
         
}

?>