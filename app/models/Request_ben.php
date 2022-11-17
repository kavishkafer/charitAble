<?php
class Request_ben{
    private $db;
    public function __construct(){
        $this->db = new Database;
    }
    public function getRequests(){
        $this->db->query('SELECT * FROM donation_table');
        $results = $this->db->resultSet();
        return $results;
    }
    public function addRequests($data){
        $this->db->query('INSERT INTO donation_table (Donation_Description, Donation_Quantity, Donation_Type, Donation_Priority) VALUES(:Donation_Description, :Donation_Quantity, :Donation_Type, :Donation_Priority)');
        // Bind values
        $this->db->bind(':Donation_Description', $data['Donation_Description']);
        $this->db->bind(':Donation_Quantity', $data['Donation_Quantity']);
        $this->db->bind(':Donation_Type', $data['Donation_Type']);
        $this->db->bind(':Donation_Priority', $data['Donation_Priority']);
        
        // Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }
} 