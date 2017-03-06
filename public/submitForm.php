<?php
/**
 * Created by PhpStorm.
 * User: ubuntu
 * Date: 22/09/16
 * Time: 11:07
 */
require "../src/bdd.php";

$conn = getConnection();

$firstname   = mysqli_real_escape_string($conn, $_POST["firstname"]);
$lastname    = mysqli_real_escape_string($conn, $_POST["lastname"]);
$email       = mysqli_real_escape_string($conn, $_POST["email"]);

$sql = "INSERT INTO contact (firstname, lastname, email) VALUES ('$firstname', '$lastname', '$email');";
execSql($conn, $sql);

header('Location: /?page=index&addcontact=ok');