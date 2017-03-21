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
     * @var int
     */
    private $id;

    /**
     * UserManager constructor.
     * @param BddManager $bdd
     */
    public function __construct($bdd)
    {
        $this->bdd = $bdd;
    }

    public function clear()
    {
       $this->firstName = "";
       $this->lastName = "";
       $this->email = "";
       $this->password = "";
       $this->id = "";
    }

    /**
     * @param array $data
     */
    public function hydrate($data)
    {
        $this->clear();
        $this->setId($data["id"]);
        $this->setFirstName($data["firstname"]);
        $this->setLastname($data["lastname"]);
        $this->setEmail($data["email"]);
        $this->setPassword($data["password"]);
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
    public function updateUser()
    {
        $sql = "UPDATE " . self::TABLE . " SET firstname = '$this->firstName', lastname = '$this->lastName', email = '$this->email', password = '$this->password' where id = $this->id;";
        $this->bdd->execSql($sql);
    }

    /**
     * @return \mysqli_result
     */
    public function listUser():\mysqli_result
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
     */
    public function getUser($id)
    {
        $sql = "SELECT * FROM " . self::TABLE . " WHERE id = " . $id;
        $result = $this->bdd->execSql($sql);
        $data = mysqli_fetch_assoc($result);
        $this->setFirstName($data["firstname"]);
        $this->setLastName($data["lastname"]);
        $this->setEmail($data["email"]);
        $this->setPassword($data["password"]);
        $this->setId($id);
    }

    /**
     * @param string $field
     * @return string
     */
    private function escapeField($field)
    {
        return mysqli_real_escape_string($this->bdd->getConnection(), $field);
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $this->escapeField($firstName);
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $this->escapeField($lastName);
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $this->escapeField($email);
    }

    /**
     * @return string
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