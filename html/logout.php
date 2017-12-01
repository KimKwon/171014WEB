<?php
	session_start();

    $_SESSION["id"] = "";
    $_SESSION["status"] = "log_out";
    header("Location: index.php");
?>
