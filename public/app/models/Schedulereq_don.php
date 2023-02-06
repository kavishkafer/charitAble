<?php
class Schedulereq_don {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }
    public function getRequests(){
        $this->db->query('SELECT * FROM shedule_request_table');

        $results = $this->db->resultSet();

        return $results;
    }

    public function addRequests($data){
        $this->db->query('INSERT INTO shedule_request_table (D_Name, D_Tel_No, D_Address, Food_Type, D_Date, Time, D_Id) VALUES(:name, :tel_no, :address, :food_type, :date, :time, :D_Id)');
        //Bind values
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':tel_no', $data['tel_no']);
        $this->db->bind(':address', $data['address']);
        $this->db->bind(':food_type', $data['food_type']);
        $this->db->bind(':date', $data['date']);
        $this->db->bind(':time', $data['time']);
        $this->db->bind(':D_Id', $data['D_Id']);


        //Execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function deleteRequest($id){
        $this->db->query('DELETE FROM shedule_requst_table WHERE D_Id = :D_Id');
        // Bind values
        $this->db->bind(':D_Id', $id);
        
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