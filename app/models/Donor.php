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

    public function addDonorDetails($data,$x){
        $this->db->query('INSERT INTO donor_details 
        (D_name, D_Email, D_Tel_No, D_Password, D_Address, User_Id) 
        VALUES(:D_Name, :D_Email, :D_Tel_No, :D_Password, :D_Address, :User_Id)');

        // bind values
        $this->db->bind(':D_Name', $data['D_Name']);
        $this->db->bind(':D_Email', $data['D_Email']);
        $this->db->bind(':D_Tel_No', $data['D_Tel_No']);
        $this->db->bind(':D_Password', $data['D_Password']);
        $this->db->bind(':D_Address', $data['D_Address']);
        $this->db->bind(':User_Id', $x);

        // Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

}