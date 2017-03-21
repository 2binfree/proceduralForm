<?php

namespace wcs;

class UserManager
{
    const TABLE = "contact";

    /**
     * @var BddManager
     */
    private $bdd;

    /**
     * @var string
     */
    private $firstName;
    private $lastName;
    private $email;
    private $password;


    /**
     * UserManager constructor.
     * @param BddManager $bdd
     */
    public function __construct($bdd)
    {
        $this->bdd = $bdd;
    }

    public function addUser()
    {
        $sql = "INSERT INTO " . self::TABLE . " (firstname, lastname, email, password) 
                VALUES ('$this->firstName', '$this->lastName', '$this->email', '$this->password');";
        $this->bdd->execSql($sql);
    }

    /**
     * @param integer $id
     */
    public function updateUser($id)
    {
        $sql = "UPDATE " . self::TABLE . " SET firstname = '$this->firstName', lastname = '$this->lastName', email = '$this->email', password = '$this->password' where id = $id;";
        $this->bdd->execSql($sql);
    }

    /**
     * @return mixed
     */
    public function listUser()
    {
        $sql = "SELECT * FROM " . self::TABLE;
        return $this->bdd->execSql($sql);
    }

    /**
     * @param integer $id
     * @return bool|\mysqli_result
     */
    public function removeUser($id)
    {
        $sql = "DELETE FROM " . self::TABLE . " WHERE id = " . $id;
        return $this->bdd->execSql($sql);
    }

    /**
     * @param integer $id
     * @return array|null
     */
    public function getUser($id)
    {
        $sql = "SELECT * FROM " . self::TABLE . " WHERE id = " . $id;
        $result = $this->bdd->execSql($sql);
        return mysqli_fetch_assoc($result);
    }

    private function escapeField($field)
    {
        return mysqli_real_escape_string($this->bdd->getConnection(), $field);
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $this->escapeField($firstName);
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $this->escapeField($lastName);
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $this->escapeField($email);
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = md5($password);
    }


}