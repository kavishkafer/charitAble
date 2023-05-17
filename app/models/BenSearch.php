<?php
class BenSearch{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function getBen($input){
        //search any word
        $input = '%'.preg_replace('/[^a-zA-Z0-9\s]/', '', $input).'%';
        $this->db->query('SELECT * FROM beneficiary_details WHERE B_Name LIKE :input OR B_Address LIKE :input OR B_Type LIKE :input' );
        $this->db->bind(':input', $input);
        $this->db->execute();
        $result = $this->db->resultSet();
        return $result;
    }
public function getAllBen()
{
    $this->db->query('SELECT * FROM beneficiary_details');
    $this->db->execute();
    $result = $this->db->resultSet();
    return $result;
}
}