<?php

namespace App\Models;

use App\Core\Model;

class User extends Model
{
    protected int $id;
    protected $login;
    protected $password;

    /**
     * User constructor.
     * @param $login
     */
    public function __construct($login = '', $password = '')
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
     * @param mixed|string $login
     */
    public function setLogin($login): void
    {
        $this->login = $login;
    }

    /**
     * @return mixed|string
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
     * @return mixed|string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param mixed|string $password
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

