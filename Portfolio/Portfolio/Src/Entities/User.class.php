<?php
namespace Src\Entities;
class User {

    private static $IdMap = array();
    private $id; //int 1 primary key
    private $email; //char 150 emailadress
    private $name; //char 50 username
    private $pw; //char 50 paswoord
    private $salt;
    private $accesslvl; //int 1 accesslevel (CMS,...)0 normal user 1 admin

    private function __construct($id, $email, $name, $pw, $salt, $accesslvl) {
        $this->id = $id;
        $this->email = $email;
        $this->name = $name;
        $this->pw = $pw;
        $this->salt = $salt;
        $this->accesslvl = $accesslvl;
    }

    static function create($id, $email, $name, $pw, $salt, $accesslvl) {
        if (!isset(self::$IdMap[$id])) {
            self::$IdMap[$id] = new User($id, $email, $name, $pw, $salt, $accesslvl);
            return self::$IdMap[$id];
        }
    }

// <editor-fold defaultstate="collapsed" desc="GETTERS & SETTERS">

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getPw() {
        return $this->pw;
    }

    public function setPw($pw) {
        $this->pw = $pw;
    }

    public function getAccesslvl() {
        return $this->accesslvl;
    }

    public function setAccesslvl($accesslvl) {
        $this->accesslvl = $accesslvl;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getSalt() {
        return $this->salt;
    }

    public function setSalt($salt) {
        $this->salt = $salt;
    }

// </editor-fold>
}