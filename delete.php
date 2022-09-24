<?php
require_once './db.php';

$id = $_GET["id"];
$sql = "delete from patients where id = :id";
$query = $conn->prepare($sql);
$query->bindParam(":id", $id, PDO::PARAM_STR);
$query->execute();
header("Location: index.php");
