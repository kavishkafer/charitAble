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

    public function getDonorById($id){
        $this->db->query('SELECT * FROM Donor_details WHERE D_ID = :D_ID');
        $this->db->bind(':D_ID', $id);

        $row = $this->db->single();

        return $row;
    }

}