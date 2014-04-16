<?php
namespace Src\Business;
use Src\Data\UserDAO;
class UserService {

    public static function haalUsersOp() {
        $lijst = UserDAO::getAll();
        return $lijst;
    }

    public static function getUserByName($name) {
        $user = UserDAO::getByName($name);
        return $user;
    }

    public static function getUserByEmail($email) {
        $user = UserDAO::getByEmail($email);
        return $user;
    }

    public static function controleerUserLogin($name, $pw) {
        $user = self::getUserByName($name);
        if ($user) {
            if ($user->getPw() == hash('sha256',$pw.$user->getSalt())) {
                return $user;
            } else {
                throw new IncorrectPwException();
            }
        } else {
            throw new UserNotFoundException();
        }
    }

    public static function registreerUser($email, $name, $pw, $passwordconfirm) {
        if ($pw == $passwordconfirm) {
            $user = UserService::controleerRegistratie($email, $name);
            if (!$user) {
                $salt = bin2hex(mcrypt_create_iv(rand(40,50), MCRYPT_DEV_URANDOM));
                echo($salt."<br>");
                $password = hash("sha256", $pw.$salt);
                echo($password."<br>");
                UserDAO::create($name, $password, $email,$salt,1);
            }
        }else {
                throw PasswordsDontMatchException;
            }
        }
    

    public static function controleerRegistratie($email, $name) {
        $user = UserDAO::getByEmail($email);
        if ($user) {
            throw new EmailAlreadyRegisteredException();
        }
        $user = UserDAO::getByname($name);
        if ($user) {
            throw new NameAlreadyRegisteredException();
        }
        return false;
    }

}
