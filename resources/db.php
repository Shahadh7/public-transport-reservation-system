<?php
require ('config.php');
class Db
{

    private $DB_USER = DB_USER;
    private $DB_PASSWORD = DB_PASSWORD;
    private $DB_NAME = DB_NAME;
    public $connection;


    private function dbConnect()
    {

        $this->connection = null;
        try {
            $this->connection = new PDO("mysql:host=localhost;dbname=" . $this->DB_NAME, $this->DB_USER, $this->DB_PASSWORD);
            $this->connection->exec("set names utf8");

        } catch (PDOException $exception) {
            echo "Db Error:" . $exception;
        }
        return $this->connection;
    }

    public function getConnection(){
        return $this->dbConnect();
    }


    public function registerUser($username,$nic,$password) {
        try {
            $db = $this->dbConnect();
            $SQL = $db->prepare("INSERT INTO users(username,nic,password)VALUES(?,?,?)");
            $SQL->bindParam(1, $username);
            $SQL->bindParam(2, $nic);
            $SQL->bindParam(3, $password);
            $SQL->execute();
            return "Success";
        } catch (PDOException $e) {
            echo 'Error Message: ' . $e->getMessage() . "<BR>";
            echo 'Exception Caught on line: ' . $e->getLine() . "<BR>";
            return "Failed";
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
            return "Failed";
        }
    }

    public function login($username,$password){
        try {
            $db = $this->dbConnect();
            $SQL = $db->prepare("SELECT username,user_id FROM users WHERE username = ? AND password = ?");
            $SQL->bindParam(1, $username);
            $SQL->bindParam(2, $password);
            $SQL->execute();
            $result = $SQL->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Error Message: ' . $e->getMessage() . "<BR>";
            echo 'Exception Caught on line: ' . $e->getLine() . "<BR>";
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
        return $result;
    }

    public function adminLogin($username,$password){
        try {
            $db = $this->dbConnect();
            $SQL = $db->prepare("SELECT user_id,type FROM users WHERE type= 'admin' AND username = ? AND password = ?");
            $SQL->bindParam(1, $username);
            $SQL->bindParam(2, $password);
            $SQL->execute();
            $result = $SQL->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Error Message: ' . $e->getMessage() . "<BR>";
            echo 'Exception Caught on line: ' . $e->getLine() . "<BR>";
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
        return $result;
    }

    public function getUsers() {
        try
        {
            $db = $this->dbConnect();
            $SQL = $db->prepare("SELECT username,nic FROM users WHERE username != 'admin'");
            $SQL->execute();
            $result = $SQL->fetchAll(PDO::FETCH_ASSOC);
        }catch (PDOException $e) {
            echo 'Error Message: ' . $e->getMessage() . "<BR>";
            echo 'Exception Caught on line: ' . $e->getLine() . "<BR>";
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }

        return $result;
    }

}

?>