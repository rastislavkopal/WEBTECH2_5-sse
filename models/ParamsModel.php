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


    public function updateParams($record)
    {
        try {
            $conn = $this->db->getConnection();
            $stmt = $conn->prepare("UPDATE records SET a=:a, y1=:y1, y2=:y2, y3=:y3 WHERE id=1");

            return $stmt->execute($record);
        } catch (PDOException $e) {
            return "Connection failed: " . $e->getMessage();
        }
    }


    public function getParams()
    {
        try {
            $conn = $this->db->getConnection();
            $stmt = $conn->prepare("SELECT a, y1, y2, y3 FROM records WHERE id=1 LIMIT 1");
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return "Connection failed: " . $e->getMessage();
        }
    }



}


