<?php

/**
 * @return mysqli
 */
function getConnection()
{
    $user       = "ubuntu";
    $password   = "";
    $host       = "localhost";
    $db         = "proc_form";
    $mysqli = new mysqli($host, $user, $password, $db);
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        die();
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
        echo "failed to run query : (" . $mysqli->errno . ") " . $mysqli->error;
        die();
    }
    return $result;
}
