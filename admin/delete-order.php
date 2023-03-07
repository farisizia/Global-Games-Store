<?php

require '../functions.php';

$id = $_GET["id"];

if (deleteorder($id) > 0) {
	 echo "<script>
          alert('order successfully deleted')
            document.location.href = 'order.php';
         </script>";
          
} else {
	 echo "<script>
          alert('order unsuccess deleted')
            document.location.href = 'order.php';
         </script>";
         
}

?>