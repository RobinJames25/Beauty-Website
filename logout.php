<?php 
session_start();
session_unset();
session_destroy();
session_regenerate_id(true);

ob_start();
header("Location: sign_in.php");
exit();
?>
