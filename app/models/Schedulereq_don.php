<?php
class Schedulereq_don {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }
    public function getRequests(){
        $this->db->query('SELECT * FROM schedulereq_dons');

        $results = $this->db->resultSet();

        return $results;
    }

    public function addRequests($data){
        $this->db->query('INSERT INTO schedulereq_dons (name, tel_no, address, food_type, date, time, id) VALUES(:name, :tel_no, :address, :food_type, :date, :time, :user_id)');
        //Bind values
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':tel_no', $data['tel_no']);
        $this->db->bind(':address', $data['address']);
        $this->db->bind(':food_type', $data['food_type']);
        $this->db->bind(':date', $data['date']);
        $this->db->bind(':time', $data['time']);
        $this->db->bind(':user_id', $data['user_id']);


        //Execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function deleteRequest($id){
        $this->db->query('DELETE FROM schedulereq_dons WHERE id = :id');
        // Bind values
        $this->db->bind(':id', $id);
        
        // Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

}