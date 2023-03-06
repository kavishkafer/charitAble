<?php 
class BenReqDon{
private $db;
public function __construct(){
$this->db = new Database;


}



public function getAllRequests(){
    $this->db->query('SELECT * FROM `donation_table` AS D INNER JOIN `beneficiary_details` AS B ON D.`B_Id`=B.`B_Id` WHERE D.`Accepted`=false AND D.`Completed`=false');
    $row = $this->db->resultSet();

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


public function acceptRequest($Id, $D_Id){

$this->db->query('UPDATE donation_table SET Accepted = true, D_Id = :D_Id WHERE Donation_ID = :Id');
$this->db->bind(':Id', $Id);
$this->db->bind(':D_Id', $D_Id);
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

public function getBenDetails($id)
{
    $this->db->query('SELECT * FROM beneficiary_details WHERE User_Id = :User_Id');
    $this->db->bind(':User_Id', $id);
    $row = $this->db->single();
    return $row;
}
public function getDonId($id){
    $this->db->query('SELECT * FROM donor_details WHERE User_Id = :User_Id');
    $this->db->bind(':User_Id', $id);
    $row = $this->db->single();
    return $row;
}

}



