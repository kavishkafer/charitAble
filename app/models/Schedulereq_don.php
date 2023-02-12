<?php
class Schedulereq_don {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }
    public function getRequests(){
        $this->db->query('SELECT * FROM shedule_request_table
        INNER JOIN donor_details
        ON `shedule_request_table`.`D_Id` = `donor_details`.`D_Id` AND ' . $_SESSION['user_id'] . ' = `donor_details`.`User_Id` ');

        $results = $this->db->resultSet();

        return $results;
    }

    public function getDRequestByID($id)
    {
        $this->db->query('SELECT * FROM shedule_request_table WHERE B_Req_ID = :B_Req_ID');
        $this->db->bind(':B_Req_ID', $id);
        $row = $this->db->single();
        return $row;
    }
    public function getDonId($id){
        $this->db->query('SELECT * FROM donor_details WHERE User_Id = :User_Id');
        $this->db->bind(':User_Id', $id);
        $row = $this->db->single();
        return $row;
    }

    public function addRequests($data){
        $this->db->query('INSERT INTO shedule_request_table (D_Name, D_Tel_No, D_Address, Food_Type, D_Date, Time, Donation_Quantity, D_Id) VALUES(:D_Name, :D_Tel_No, :D_Address, :Food_Type, :D_Date, :Time, :Donation_Quantity, :D_Id)');
        //Bind values
        $this->db->bind(':D_Name', $data['D_Name']);
        $this->db->bind(':D_Tel_No', $data['D_Tel_No']);
        $this->db->bind(':D_Address', $data['D_Address']);
        $this->db->bind(':Food_Type', $data['Food_Type']);
        $this->db->bind(':Donation_Quantity', $data['Donation_Quantity']);
        $this->db->bind(':D_Date', $data['D_Date']);
        $this->db->bind(':Time', $data['Time']);
        $this->db->bind(':D_Id', $data['user_id']);


        //Execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function deleteRequest($id){
        $this->db->query('DELETE FROM shedule_request_table where B_Req_ID = :B_Req_ID');
        // Bind values
        $this->db->bind(':B_Req_ID', $id);
        
        // Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    public function getNames(){
        $this->db->query('SELECT * FROM beneficiary_details');

        $results = $this->db->resultSet();

        return $results;
    }

}