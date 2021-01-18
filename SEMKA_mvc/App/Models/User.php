<?php

namespace App\Models;

use App\Core\Model;

class User extends Model
{
    protected int $id;
    protected string $login;
    protected string $password;
    protected string $type;



    /**
     * User constructor.
     * @param $login
     */
    public function __construct(string $login = '',string $password = '',string $type = '')
    {
        $this->login = $login;
        $this->password = $password;
        $this->type = $type;
    }

    public static function setDbColumns()
    {
        return ['id', 'login', 'password', 'type'];
    }

    static public function setTableName()
    {
        return 'users';
    }

    // region Getters and Setters

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }




    /**
     * @param string $login
     */
    public function setLogin(string $login): void
    {
        $this->login = $login;
    }

    /**
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    // endregion

    public function jsonSerialize()
    {
        $object = parent::jsonSerialize();
        unset($object['password']);
        return $object;
    }

}

