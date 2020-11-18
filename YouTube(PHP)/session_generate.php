<?php
session_start();
$_SESSION["sess_id"] = $_POST["id"]; //array형태

echo "session value: " . $_SESSION["sess_id"];
?>