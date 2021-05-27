<?php
require ('config.php');
class DbConnection
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

}

?>