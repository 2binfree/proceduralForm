<?php

/**
 * @return mysqli
 */
function getConnection()
{
    require "../config/credentials.php";
    $mysqli = new mysqli(HOST, USER, PASSWORD, DBNAME);
    if ($mysqli->connect_errno) {
        throw new mysqli_sql_exception("Failed to connect to MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error);
    }
    return $mysqli;
}

/**
 * @param  mysqli $mysqli
 * @param $sql
 * @return mixed
 */
function execSql($mysqli, $sql){
    if (!$result = $mysqli->query($sql)){
        throw new mysqli_sql_exception("Failed to run query : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error);
    }
    return $result;
}
