<?php

namespace App\Auth;

use App\Core\AAuthenticator;
use App\Models\User;

/**
 * Class DBAuthenticator
 * @package App\Auth
 */
class DBAuthenticator extends AAuthenticator
{
    /**
     * DBAuthenticator constructor
     */
    public function __construct()
    {
        session_start();
    }

    /**
     * Verify, if the user is in DB and has his password is correct
     * @param $login
     * @param $password
     * @return bool
     * @throws \Exception
     */
    function login($login, $password)
    {
        $foundUser = User::getAll("login = ?", [$login]);

        if (count($foundUser) == 1) {
            $foundUser = $foundUser[0];
            if (password_verify($password, $foundUser->getPassword())) {
                $_SESSION['user'] = $foundUser;
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    /**
     * Logout the user
     */
    function logout()
    {
        if (isset($_SESSION["user"])) {
            unset($_SESSION["user"]);
            session_destroy();
        }
    }


    /**
     * Get an instance of the logged in user
     * @return User
     */
    function getLoggedUser(): User
    {
        return $_SESSION['user'];
    }

    /**
     * Return if the user is authenticated or not
     * @return bool
     */
    function isLogged()
    {
        return isset($_SESSION['user']) && $_SESSION['user'] != null;
    }
}