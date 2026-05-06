<?php
session_start();
require_once "db.php";

$id = $_GET["id"];

$conn->query("DELETE FROM cart_items WHERE id = $id");

header("Location: bag.php");
exit;
?>