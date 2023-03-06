<?php
class Request_ben
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function getRequests()
    {
        $this->db->query('SELECT * FROM donation_table
                          INNER JOIN beneficiary_details

                          ON `donation_table`.`B_Id` = `beneficiary_details`.`B_Id` AND ' . $_SESSION['user_id'] . ' = `beneficiary_details`.`User_Id`

                          Order by `donation_table`.`Donation_Time` DESC');
        $results = $this->db->resultSet();
        return $results;
    }
    public function addRequests($data)
    {
        $this->db->query('INSERT INTO donation_table (Donation_Description, Donation_Quantity, Donation_Type, Donation_Priority,B_Id,Donation_Details) VALUES(:Donation_Description, :Donation_Quantity, :Donation_Type, :Donation_Priority,:B_Id,:Donation_Details)');
        // Bind values
        $this->db->bind(':Donation_Description', $data['Donation_Description']);
        $this->db->bind(':Donation_Quantity', $data['Donation_Quantity']);
        $this->db->bind(':Donation_Type', $data['Donation_Type']);
        $this->db->bind(':Donation_Priority', $data['Donation_Priority']);
        $this->db->bind(':B_Id', $data['user_id']);
        $this->db->bind(':Donation_Details', $data['Donation_Details']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function getRequestByID($id)
    {
        $this->db->query('SELECT * FROM donation_table WHERE Donation_ID = :Donation_ID');
        $this->db->bind(':Donation_ID', $id);
        $row = $this->db->single();
        return $row;
    }
    public function getBenId($id){
        $this->db->query('SELECT * FROM beneficiary_details WHERE User_Id = :User_Id');
        $this->db->bind(':User_Id', $id);
        $row = $this->db->single();
        return $row;
    }

    public function UpdateRequest($data)
    {
        $this->db->query('UPDATE donation_table SET Donation_Description = :Donation_Description, Donation_Quantity = :Donation_Quantity, Donation_Type = :Donation_Type, Donation_Priority = :Donation_Priority, Donation_Details= :Donation_Details  WHERE Donation_ID = :Donation_ID');
        // Bind values
        if (isset($data['Donation_Description'])) {

            $this->db->bind(':Donation_Description', $data['Donation_Description']);
            $this->db->bind(':Donation_Quantity', $data['Donation_Quantity']);
            $this->db->bind(':Donation_Type', $data['Donation_Type']);
            $this->db->bind(':Donation_Priority', $data['Donation_Priority']);
            $this->db->bind(':Donation_Details', $data['Donation_Details']);
            $this->db->bind(':Donation_ID', $data['Donation_ID']);

        }

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }

    }
    
    public function deleteRequest($id)
    {
        $this->db->query('DELETE FROM donation_table WHERE Donation_ID = :Donation_ID');
        // Bind values
        $this->db->bind(':Donation_ID', $id);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


    public function totalRequestsByBen($id){
        $this->db->query('Select *  FROM donation_table WHERE B_Id = :B_Id');
        $this->db->bind(':B_Id', $id);
        $count=$this->db->resultSet();
        return $this->db->rowCount();


    }
    public function pendingRequestsBen($id){
        $this->db->query('Select * from donation_table Where B_Id = :B_Id AND Accepted = false AND Completed = false');
        $this->db->bind(':B_Id', $id);
        $count=$this->db->resultset();
        return $this->db->rowCount();
    }
    public function completedRequestsBen($id){
        $this->db->query('Select * from donation_table Where B_Id = :B_Id AND Accepted = true AND Completed = true');
        $this->db->bind(':B_Id', $id);
        $count=$this->db->resultset();
        return $this->db->rowCount();
    }
    public function acceptedRequestsBen($id){
        $this->db->query('Select * from donation_table Where B_Id = :B_Id AND Accepted = true AND Completed = false');
        $this->db->bind(':B_Id', $id);
        $count=$this->db->resultset();
        return $this->db->rowCount();
    }
    public function completedRequestsBenDetails($id){
        $this->db->query('Select * from donation_table Where B_Id = :B_Id AND Accepted = true AND Completed = true');
        $this->db->bind(':B_Id', $id);
        $array=$this->db->resultset();
        return $array;
    }
    public function AcceptedRequestsBenDetails($id){
        $this->db->query('Select * from donation_table Where B_Id = :B_Id AND Accepted = true AND Completed = false');
        $this->db->bind(':B_Id', $id);
        $array=$this->db->resultset();
        return $array;
    }


}
