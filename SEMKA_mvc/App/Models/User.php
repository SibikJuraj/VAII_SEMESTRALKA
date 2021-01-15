<?php

namespace App\Models;

use App\Core\Model;

class User extends Model
{
    protected int $id;
    protected string $login;
    protected string $password;

    /**
     * User constructor.
     * @param $login
     */
    public function __construct(string $login = '',string $password = '')
    {
        $this->login = $login;
        $this->password = $password;
    }

    public static function setDbColumns()
    {
        return ['id', 'login', 'password'];
    }

    static public function setTableName()
    {
        return 'users';
    }

    // region Getters and Setters

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

