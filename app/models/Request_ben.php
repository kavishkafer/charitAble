<?php
class Request_ben{
    private $db;
    public function __construct(){
        $this->db = new Database;
    }
    public function getRequests(){
        $this->db->query('SELECT * FROM donation_table
                          INNER JOIN beneficiary_details
                          ON `donation_table`.`B_Id` = `beneficiary_details`.`B_Id`');
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
    public function getRequestByID($id){
        $this->db->query('SELECT * FROM donation_table WHERE Donation_ID = :Donation_ID');
        $this->db->bind(':Donation_ID', $id);
        $row = $this->db->single();
        return $row;
    }

        public function UpdateRequest($data){
            $this->db->query('UPDATE donation_table SET Donation_Description = :Donation_Description, Donation_Quantity = :Donation_Quantity, Donation_Type = :Donation_Type, Donation_Priority = :Donation_Priority WHERE Donation_ID = :Donation_ID');
            // Bind values
            $this->db->bind(':Donation_Description', $data['Donation_Description']);
            $this->db->bind(':Donation_Quantity', $data['Donation_Quantity']);
            $this->db->bind(':Donation_Type', $data['Donation_Type']);
            $this->db->bind(':Donation_Priority', $data['Donation_Priority']);
            $this->db->bind(':Donation_ID', $data['Donation_ID']);
            
            // Execute
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }
        public function deleteRequest($id){
            $this->db->query('DELETE FROM donation_table WHERE Donation_ID = :Donation_ID');
            // Bind values
            $this->db->bind(':Donation_ID', $id);
            
            // Execute
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }
    }
