<?php

require '../functions.php';

$id = $_GET["id"];

if (delete($id) > 0) {
	 echo "<script>
          alert('account successfully deleted')
            document.location.href = 'edituser.php';
         </script>";
          
} else {
	 echo "<script>
          alert('account unsuccess deleted')
            document.location.href = 'edituser.php';
         </script>";
         
}

?>