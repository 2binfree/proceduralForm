<?php

namespace wcs;

class BddManager
{
    /**
     * @var \mysqli
     */
    private $connection;

    public function __construct()
    {
        $mysqli = new \mysqli(HOST, USER, PASSWORD, DBNAME);
        if ($mysqli->connect_errno) {
            throw new \mysqli_sql_exception("Failed to connect to MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error);
        }
        $this->connection = $mysqli;
    }

    /**
     * @return \mysqli
     */
    public function getConnection()
    {
        return $this->connection;
    }

    /**
     * @param string $sql
     * @return bool|\mysqli_result
     */
    public function execSql($sql)
    {
        if (!$result = $this->connection->query($sql)) {
            throw new \mysqli_sql_exception(
                "Failed to run query : (" .
                $this->connection->connect_errno . ") " .
                $this->connection->connect_error
            );
        }
        return $result;
    }
}