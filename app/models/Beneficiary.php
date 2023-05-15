<?php
class Beneficiary {
    private $db;
    
    public function __construct(){
        $this->db = new Database;
    }

    public function getBeneficiaryDetails(){
        $this->db->query('SELECT * FROM beneficiary_details WHERE status_2 = "approved" ORDER BY B_Id ASC');
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
    public function getReceivedDonationCount($id){
        $results = $this->db->query('SELECT * FROM donation_table WHERE E_ID = :E_ID AND Accepted = 1 AND Completed = 0 ');
        $this->db->bind(':E_ID', $id);
        $count = $this->db->resultSet();
        return $this->db->rowCount();
    }
    public function getCompletedEventCount($id){
        $results = $this->db->query('SELECT * FROM event_request_table WHERE E_ID = :E_ID AND Accepted = 1 AND Completed = 1 ');
        $this->db->bind(':E_ID', $id);
        $count = $this->db->resultSet();
        return $this->db->rowCount();
    }
}