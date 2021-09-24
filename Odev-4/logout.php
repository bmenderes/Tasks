<?php

session_start();
session_destroy();

header('Location:index.php');

?>
<div style="margin-left: 200px; width: 200px ">
   <h1><a href="logout.php">Çıkış</a></h1>
   </div>