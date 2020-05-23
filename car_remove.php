<?php
// Get id of car to be removed
$id = $_POST["id"];
session_start();
unset($_SESSION["cart"][$id]);

// Relocate to car reserve page
header("Location: car_reserve.php");
?>