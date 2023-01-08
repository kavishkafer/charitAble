<?php
class EventHoster {
    private $db;
    
    public function __construct(){
        $this->db = new Database;
    }


    public function getEventHosterDetails(){
        $this->db->query('SELECT * FROM eventHosters_details');

        $results = $this->db->resultSet();

        return $results;
    }

}