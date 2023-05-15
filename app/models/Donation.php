<?php
class Donation {
    private $db;
    
    public function __construct(){
        $this->db = new Database;
    }

    public function getDonationDetails(){
        $this->db->query('SELECT * FROM donation_table INNER JOIN beneficiary_details ON donation_table.B_Id = beneficiary_details.B_Id 
        INNER JOIN donor_details ON donation_table.D_Id = donor_details.D_Id');
        $results = $this->db->resultSet();
        return $results;
    }

    public function getRegBenDetails(){
        $this->db->query('SELECT * FROM beneficiary_details WHERE status_2 = "pending" ORDER BY B_Id ASC');
        $results = $this->db->resultSet();
        return $results;
    }

    public function approveRequest($id) {
        $this->db->query('UPDATE beneficiary_details SET status_2 = "approved" WHERE B_id = :B_id');
        $this->db->bind(':B_id', $id);
        $results = $this->db->resultSet();
        return $results;
    }

    public function denyRequest($id) {
        $this->db->query('DELETE FROM beneficiary_details WHERE B_id = :B_id');
        $this->db->bind(':B_id', $id);
        $results = $this->db->resultSet();
        return $results;
    }

    public function getBeneficiaryById($id){
        $this->db->query('SELECT * FROM beneficiary_details WHERE B_Id = :B_Id');
        $this->db->bind(':B_Id', $id);
        $row = $this->db->single();
        return $row;
    }

    // Load table data from file
    public function LoadData() {
        $this->db->query('SELECT * FROM donation_table INNER JOIN beneficiary_details ON donation_table.B_Id = beneficiary_details.B_Id 
        INNER JOIN donor_details ON donation_table.D_Id = donor_details.D_Id');
        $results = $this->db->resultSet();
        return $results; 
    }
}