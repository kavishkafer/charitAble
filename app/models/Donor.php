<?php
class Donor {
    private $db;
    
    public function __construct(){
        $this->db = new Database;
    }


    public function getDonorDetails(){
        $this->db->query('SELECT * FROM donor_details');

        $results = $this->db->resultSet();

        return $results;
    }

}