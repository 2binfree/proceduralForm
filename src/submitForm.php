<?php
/**
 * Created by PhpStorm.
 * User: ubuntu
 * Date: 22/09/16
 * Time: 11:07
 */
require "bdd.php";

$firstname   = $_POST["firstname"];
$lastname    = $_POST["lastname"];
$email       = $_POST["email"];

$conn = getConnection();
$sql = "INSERT INTO contact (firstname, lastname, email) VALUES ('$firstname', '$lastname', '$email');";
execSql($conn, $sql);

header('Location: /?page=index&addcontact=ok');