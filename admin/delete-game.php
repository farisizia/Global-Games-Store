<?php

require '../functions.php';

$id_game = $_GET["id"];

if (delete_game($id_game) > 0) {
	 echo "<script>
          alert('game successfully deleted')
            document.location.href = 'games-list.php';
         </script>";
          
} else {
	 echo "<script>
          alert('game unsuccess deleted')
            document.location.href = 'games-list.php';
         </script>";
         
}

?>