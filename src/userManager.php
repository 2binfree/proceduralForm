<?php
/**
 * Created by PhpStorm.
 * User: ubuntu
 * Date: 22/09/16
 * Time: 11:07
 */

function addUser($conn, $firstname, $lastname, $email, $password)
{
    $sql = "INSERT INTO contact (firstname, lastname, email, password) VALUES ('$firstname', '$lastname', '$email', '$password');";
    execSql($conn, $sql);
}

function updateUser($conn, $id, $firstname, $lastname, $email, $password)
{
    $sql = "UPDATE contact SET firstname = '$firstname', lastname = '$lastname', email = '$email', password = '$password' where id = $id;";
    execSql($conn, $sql);
}

function listUser($conn)
{
    $sql = "SELECT * from contact";
    return execSql($conn, $sql);
}

function removeUser($conn, $id)
{
    $sql = "DELETE FROM contact WHERE id = " . $id;
    return execSql($conn, $sql);
}

function getUser($conn, $id)
{
    $sql = "SELECT * FROM contact where id = " . $id;
    $result = execSql($conn, $sql);
    return mysqli_fetch_assoc($result);
}