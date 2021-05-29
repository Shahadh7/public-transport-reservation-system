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
            $SQL = $db->prepare("SELECT username,nic,user_id FROM users WHERE username != 'admin'");
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

    public function deleteUser($user_id) {
        try{
            $db = $this->dbConnect();
            $SQL = $db->prepare("DELETE FROM users WHERE user_id = ? ");
            $SQL->bindParam(1,$user_id);
            $SQL->execute();
        }catch (PDOException $e) {
            echo 'Error Message: ' . $e->getMessage() . "<BR>";
            echo 'Exception Caught on line: ' . $e->getLine() . "<BR>";
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
        return "succes";
    }

    public function searchUser($text) {
        try{
            $searchText = "%".$text."%";
            $db = $this->dbConnect();
            $SQL = $db->prepare("SELECT username,nic,user_id FROM users WHERE username LIKE ? ");
            $SQL->bindParam(1,$searchText);
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

    public function updateUser($userId,$username,$nic)
    {
        try{
            $db = $this->dbConnect();
            $SQL = $db->prepare("UPDATE users SET username = :username , nic = :nic WHERE user_id = :userId ");
            $SQL->bindParam(":username",$username);
            $SQL->bindParam(":nic",$nic);
            $SQL->bindParam(":userId",$userId);
            $SQL->execute();
            return "updated"; 
        } catch (PDOException $e) {
            echo 'Error Message: ' . $e->getMessage() . "<BR>";
            echo 'Exception Caught on line: ' . $e->getLine() . "<BR>";
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function getAllTransportVehicles() {
        try
        {
            $db = $this->dbConnect();
            $SQL = $db->prepare("SELECT * FROM vehicle");
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

    public function deleteVehicle($vehicle_id) {
        try{
            $db = $this->dbConnect();
            $SQL = $db->prepare("DELETE FROM vehicle WHERE vehicle_id = ? ");
            $SQL->bindParam(1,$vehicle_id);
            $SQL->execute();
        }catch (PDOException $e) {
            echo 'Error Message: ' . $e->getMessage() . "<BR>";
            echo 'Exception Caught on line: ' . $e->getLine() . "<BR>";
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
        return "succes";
    }

    public function updateVehicle($vehicleId,$name,$type,$locationFrom,$locationTo,$owner,$seatCount,$numPlate)
    {
        try{
            $db = $this->dbConnect();
            $SQL = $db->prepare("UPDATE vehicle SET name = :name , type = :type , location_from = :locationFrom , location_to = :locationTo , owner = :owner , seat_count = :seatCount , number_plate = :numPlate   WHERE vehicle_id = :vehicleId ");
            $SQL->bindParam(":name",$name);
            $SQL->bindParam(":type",$type);
            $SQL->bindParam(":locationFrom",$locationFrom);
            $SQL->bindParam(":locationTo",$locationTo);
            $SQL->bindParam(":owner",$owner);
            $SQL->bindParam(":seatCount",$seatCount);
            $SQL->bindParam(":numPlate",$numPlate);
            $SQL->bindParam(":vehicleId",$vehicleId);
            $SQL->execute();
            return "updated"; 
        } catch (PDOException $e) {
            echo 'Error Message: ' . $e->getMessage() . "<BR>";
            echo 'Exception Caught on line: ' . $e->getLine() . "<BR>";
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function addVehicle($name,$type,$locationFrom,$locationTo,$owner,$seatCount,$numPlate) {
        try {
            $db = $this->dbConnect();
            $SQL = $db->prepare("INSERT INTO vehicle(name,type,location_from,location_to,owner,seat_count,number_plate)VALUES(?,?,?,?,?,?,?)");
            $SQL->bindParam(1, $name);
            $SQL->bindParam(2, $type);
            $SQL->bindParam(3, $locationFrom);
            $SQL->bindParam(4, $locationTo);
            $SQL->bindParam(5, $owner);
            $SQL->bindParam(6, $seatCount);
            $SQL->bindParam(7, $numPlate);
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

    public function getAllPricing() {
        try
        {
            $db = $this->dbConnect();
            $query = "SELECT pricing.*,vehicle.name
                      FROM pricing,vehicle
                      WHERE pricing.vehicle_id = vehicle.vehicle_id
            ";
            $SQL = $db->prepare($query);
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

    public function getAllVehiclesWithNoPricing() {
        try
        {
            $db = $this->dbConnect();
            $query = "SELECT vehicle_id,name
                      FROM vehicle
                      WHERE vehicle_id NOT IN (SELECT vehicle_id FROM pricing)
            ";
            $SQL = $db->prepare($query);
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

    public function deletePricing($pricing_id) {
        try{
            $db = $this->dbConnect();
            $SQL = $db->prepare("DELETE FROM pricing WHERE pricing_id = ? ");
            $SQL->bindParam(1,$pricing_id);
            $SQL->execute();
        }catch (PDOException $e) {
            echo 'Error Message: ' . $e->getMessage() . "<BR>";
            echo 'Exception Caught on line: ' . $e->getLine() . "<BR>";
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
        return "succes";
    }

    public function addNewPricing($vehicle_id,$price) {
        try {
            $db = $this->dbConnect();
            $SQL = $db->prepare("INSERT INTO pricing(vehicle_id,price)VALUES(?,?)");
            $SQL->bindParam(1, $vehicle_id);
            $SQL->bindParam(2, $price);
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

    public function updatePricing($pricingId,$price) {
        try{
            $db = $this->dbConnect();
            $SQL = $db->prepare("UPDATE pricing SET price = :price WHERE pricing_id = :pricingId ");
            $SQL->bindParam(":price",$price);
            $SQL->bindParam(":pricingId",$pricingId);
            $SQL->execute();
            return "updated"; 
        } catch (PDOException $e) {
            echo 'Error Message: ' . $e->getMessage() . "<BR>";
            echo 'Exception Caught on line: ' . $e->getLine() . "<BR>";
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function getCounts() {
        try
        {
            $db = $this->dbConnect();
            $SQL = $db->prepare("SELECT COUNT(user_id) as users_count FROM users");
            $SQL->execute();
            $result1 = $SQL->fetchAll(PDO::FETCH_ASSOC);
        }catch (PDOException $e) {
            echo 'Error Message: ' . $e->getMessage() . "<BR>";
            echo 'Exception Caught on line: ' . $e->getLine() . "<BR>";
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        };

        try
        {
            $db = $this->dbConnect();
            $SQL = $db->prepare("SELECT COUNT(reservation_id) as reserve_count FROM reservation");
            $SQL->execute();
            $result2 = $SQL->fetchAll(PDO::FETCH_ASSOC);
        }catch (PDOException $e) {
            echo 'Error Message: ' . $e->getMessage() . "<BR>";
            echo 'Exception Caught on line: ' . $e->getLine() . "<BR>";
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        };

        try
        {
            $db = $this->dbConnect();
            $SQL = $db->prepare("SELECT COUNT(vehicle_id) as vehicle_count FROM vehicle");
            $SQL->execute();
            $result3 = $SQL->fetchAll(PDO::FETCH_ASSOC);
        }catch (PDOException $e) {
            echo 'Error Message: ' . $e->getMessage() . "<BR>";
            echo 'Exception Caught on line: ' . $e->getLine() . "<BR>";
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        };

        $data = [
            "user_count" => $result1[0],
            "reserve_count" => $result2[0],
            "vehicle_count" => $result3[0],
        ];
        return $data;
    }


    public function getAllPricingInfo() {
        try
        {
            $db = $this->dbConnect();
            $query = "SELECT vehicle.name, vehicle.location_from, vehicle.location_to, vehicle.type, pricing.price 
                      FROM vehicle,pricing
                      WHERE vehicle.vehicle_id = pricing.vehicle_id";
            $SQL = $db->prepare($query);
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

    public function listAllMessages() {
        try
        {
            $db = $this->dbConnect();
            $query = "SELECT * FROM message";
            $SQL = $db->prepare($query);
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

    public function deleteMessage($id) {
        try{
            $db = $this->dbConnect();
            $SQL = $db->prepare("DELETE FROM message WHERE message_id = ? ");
            $SQL->bindParam(1,$id);
            $SQL->execute();
        }catch (PDOException $e) {
            echo 'Error Message: ' . $e->getMessage() . "<BR>";
            echo 'Exception Caught on line: ' . $e->getLine() . "<BR>";
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
        return "succes";
    }

}

?>