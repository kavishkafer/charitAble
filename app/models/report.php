<?php 
class report {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }
    
    // public function getDonationDetailsCH(){
    //     $results =$this->db->query("SELECT * 
    //     FROM donation_table INNER JOIN beneficiary_details ON donation_table.B_Id = beneficiary_details.B_Id WHERE accepted = 1 AND completed = 1 AND B_Type = 'Children Home'");
    //     $count = $this->db->resultSet();
    //     return $this->db->rowCount();
    // }

    // public function getDonationDetailsEH(){
    //     $results =$this->db->query("SELECT *
    //     FROM donation_table INNER JOIN beneficiary_details ON donation_table.B_Id = beneficiary_details.B_Id WHERE accepted = 1 AND completed = 1 AND B_Type = 'Elder Home'");
    //     $count = $this->db->resultSet();
    //     return $this->db->rowCount();
    // }

    // public function getDonationDetailsDI(){
    //     $results =$this->db->query("SELECT * 
    //     FROM donation_table INNER JOIN beneficiary_details ON donation_table.B_Id = beneficiary_details.B_Id WHERE accepted = 1 AND completed = 1 AND B_Type = 'Disabled Institute'");
    //     $count = $this->db->resultSet();
    //     return $this->db->rowCount();
    // }

    // public function getDonationDetailsOther(){
    //     $results =$this->db->query("SELECT * 
    //     FROM donation_table INNER JOIN beneficiary_details ON donation_table.B_Id = beneficiary_details.B_Id WHERE accepted = 1 AND completed = 1 AND B_Type = 'Other'");
    //     $count = $this->db->resultSet();
    //     return $this->db->rowCount();

    // }
    public function getDonationDetailsByType($bType) {
    $query = "SELECT * 
              FROM donation_table 
              INNER JOIN beneficiary_details ON donation_table.B_Id = beneficiary_details.B_Id 
              WHERE accepted = 1 AND completed = 1 AND B_Type = :bType";
    
    $this->db->query($query);
    $this->db->bind(':bType', $bType);
    $this->db->execute();
    return $this->db->rowCount();
    }

    public function getEventDetailsByType($bType) {
        $query = "SELECT * 
                  FROM event_request_table 
                  INNER JOIN beneficiary_details ON event_request_table.B_Id = beneficiary_details.B_Id 
                  WHERE accepted = 1 AND completed = 1 AND B_Type = :bType";
        
        $this->db->query($query);
        $this->db->bind(':bType', $bType);
        $this->db->execute();
        return $this->db->rowCount();
}
}
?>