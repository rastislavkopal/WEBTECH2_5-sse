<?php

require_once 'Database.php';

class ParamsModel
{
    private $db;

    /**
     * RecordsModel constructor.
     */
    public function __construct()
    {
        $this->db = new Database();
    }


    public function createRecord($data)
    {
        try {
            $conn = $this->db->getConnection();
            $stmt = $conn->prepare("INSERT INTO records (user_id, a , y1, y2, y3 ) VALUES (:user_id, :a, :y1, :y2, :y3)");

            return $stmt->execute($data);
        } catch (PDOException $e) {
            return "Connection failed: " . $e->getMessage();
        }
    }

    public function updateParams($record)
    {
//        try {
//            $conn = $this->db->getConnection();
//            $stmt = $conn->prepare("UPDATE records SET a=:a, y1=:y1, y2=:y2, y3=y3 WHERE user_id=:user_id");
//
//            return $stmt->execute($record);
//        } catch (PDOException $e) {
//            return "Connection failed: " . $e->getMessage();
//        }
    }


    public function getParams($user_id)
    {
        try {
            $conn = $this->db->getConnection();
            $stmt = $conn->prepare("SELECT a, y1, y2, y3 FROM records WHERE user_id=? LIMIT 1");
            $stmt->execute([$user_id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return "Connection failed: " . $e->getMessage();
        }
    }

    public function clearParams($user_id)
    {
        try {
            $conn = $this->getConnection();

            $count=$conn->prepare("DELETE * FROM records WHERE user_id=:user_id");
            $count->bindParam(":user_id",$user_id);
            if($count->execute() && $count->rowCount())
                echo "Záznam bol úspešne zmazaný.";
            else
                echo "Nastala neočakávaná chyba. Prosím skúste to znova.";
        } catch (PDOException $e) {
            return "Connection failed: " . $e->getMessage();
        }
    }


}


