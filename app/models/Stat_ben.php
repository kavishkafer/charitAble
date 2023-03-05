<?php
 class Stat_ben {
    private $db;
    public function __construct(){
        $this->db = new Database;
    }
    
public function No_of_requests($Id){

    $this->db->query('select * from donation_table where B_Id = :Id');
    $this->db->bind(':Id', $Id);
    $row = $this->db->resultSet();
    //check row
    if($this->db->rowCount() > 0){
        return $this->db->rowCount();
}
else return false;
}
public function donationQuantity($Id)
{
    $this->db->query('select donation_quantity from donation_table where B_Id = :Id');
    $this->db->bind(':Id', $Id);
    $row = $this->db->single();
    //check row
    if ($this->db->rowCount() > 0) {
        return $row;
    }
    else return false;
}

 }