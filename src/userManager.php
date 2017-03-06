<?php
/**
 * Created by PhpStorm.
 * User: ubuntu
 * Date: 22/09/16
 * Time: 11:07
 */

function addUser($conn, $firstname, $lastname, $email, $password)
{
    $sql = "INSERT INTO contact (firstname, lastname, email) VALUES ('$firstname', '$lastname', '$email');";
    execSql($conn, $sql);
}

function listUser($conn)
{
    $sql = "SELECT * from contact";
    return execSql($conn, $sql);

}