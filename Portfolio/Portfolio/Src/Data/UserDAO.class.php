<?php
namespace Src\Data;
use Src\Entities\user;
class UserDAO {
    public static function getAll() {
        $stmt=parent::getAll('user');
        /*$sql = "select * from user";
        $stmt= parent::execPreppedStmt($sql);*/
        $arr = array();
        if ($stmt) {
            $resultSet=$stmt->fetchAll();
            foreach ($resultSet as $result) {
                $user = User::create($result['id'], $result['email'], $result['name'], $result['pw'], $result['salt'], $result['accesslvl']);
                array_push($arr, $user);
            }
            return $arr;
        } else {
            return false;
        }
    }

    public static function execPreppedStmt($sql, $args=null) {
        $db = new \PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $db->prepare($sql);
        $db = null;
        $stmt->execute($args);
        return $stmt;
    }

    public static function getByName($name) {
        $sql = "select * from user where name =?";
        $stmt = UserDAO::execPreppedStmt($sql, func_get_args());
        $result = $stmt->fetch();
        if ($result) {
            $user = User::create($result['id'], $result['email'], $result['name'], $result['pw'], $result['salt'], $result['accesslvl']);

            return $user;
        } else {
            return false;
        }
    }

    public static function getByEmail($email) {
        $sql = "select * from user where email = '$email'";
        $db = new \PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $resultSet = $db->query($sql);
        if ($resultSet) {
            $result = $resultSet->fetch();
            if ($result) {
                $user = new User($result['id'], $result['email'], $result['name'], $result['pw'], $result['salt'], $result['accesslvl']);
                return $user;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public static function create($email,$name, $pw,  $salt, $acceslvl = 1) {
        $sql = "insert into user (email,name,pw,salt,accesslvl) values (?,?,?,?,?)";
        $args=func_get_args();
        $stmt=  UserDAO::execPreppedStmt($sql, $args);
        $result = $stmt->fetch();
        echo "<pre>";
        var_dump($result);
        echo "</pre>";
        echo __LINE__ . "<br>" . __FILE__ . "<br>";
        die;
        $db = null;
    }

    public static function delete($id) {
        
    }

    public static function update($user) {
        
    }

}
