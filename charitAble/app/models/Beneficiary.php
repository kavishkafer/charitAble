<?php
class Beneficiary {
    private $db;
    
    public function __construct(){
        $this->db = new Database;
    }

    public function getBeneficiaryDetails(){
        $this->db->query('SELECT * FROM beneficiary_details');

        $results = $this->db->resultSet();

        return $results;
    }
}