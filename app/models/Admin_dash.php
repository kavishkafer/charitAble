<?php
class Admin_dash {
    private $db;
    
    public function __construct(){
        $this->db = new Database;
    }


    public function getBenCount(){
        $results = $this->db->query('SELECT * FROM registered_users');
        $rows = $this->db->rowCount($results);
        return $rows;
    }

    public function getDonCount(){
        $results = $this->db->query('SELECT * FROM donor_details');
        $rows = $this->db->rowCount($results);
        return $rows;
    }

}