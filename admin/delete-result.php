<?php

require '../functions.php';

$id = $_GET["id"];

if (deleteresult($id) > 0) {
	 echo "<script>
          alert('result successfully deleted')
            document.location.href = 'result.php';
         </script>";
          
} else {
	 echo "<script>
          alert('result unsuccess deleted')
            document.location.href = 'result.php';
         </script>";
         
}

?>