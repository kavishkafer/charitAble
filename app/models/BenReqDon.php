<?php 
class BenReqDon{
private $db;
public function __construct(){
$this->db = new Database;


}

public function getAllRequest(){
$this->db->query('select * from donation_table where accepted = false and completed = false ');

//Assign Result Set
$row = $this->db->resultSet();
//check row
if($this->db->rowCount() > 0){
return $row;
}
else{ 
return false;
}
}
public function getRequestDetails($id){
$this->db->query('select * from donation_table where Donation_ID = :D_Id');
$this->db->bind(':D_Id', $id);
$row = $this->db->single();
return $row;
}


public function acceptRequest($Id){
$this->db->query('UPDATE donation_table SET Accepted = true  WHERE Donation_ID = :Id');
$this->db->bind(':Id', $Id);
if($this->db->execute()){
return true;
}
else{
return false;
}
}
public function completeRequest($Id){
$this->db->query('UPDATE donation_table SET completed = true WHERE Donation_ID = :Id');
$this->db->bind(':Id', $Id);
if($this->db->execute()){
return true;
}
else{
return false;
}
}
public function getBenDetails($id) {
    $this->db->query('SELECT * FROM beneficiary_details WHERE User_Id = :User_Id');
    $this->db->bind(':User_Id', $id);
    $row = $this->db->single();
    return $row;


}



}