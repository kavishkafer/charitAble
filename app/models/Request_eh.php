<?php
class Request_eh
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function getRequests()
    {
        $this->db->query('SELECT * FROM event_request_table
                          INNER JOIN event_hoster_details

                          ON `event_request_table`.`E_ID` = `event_hoster_details`.`E_ID` AND ' . $_SESSION['user_id'] . ' = `event_hoster_details`.`User_Id`

                          Order by `event_request_table`.`Event_Time` DESC');
        $results = $this->db->resultSet();
        return $results;
    }
    public function addRequests($data)
    {
        $this->db->query('INSERT INTO event_request_table (Event_Date, Event_Time, Event_Description, Event_Letter,E_ID) VALUES(:Event_Date, :Event_Time, :Event_Description, :Event_Letter,:E_ID)');
        // Bind values
        $this->db->bind(':Event_Date', $data['Event_Date']);
        $this->db->bind(':Event_Time', $data['Event_Time']);
        $this->db->bind(':Event_Description', $data['Event_Description']);
        $this->db->bind(':Event_Letter', $data['Event_Letter']);
        $this->db->bind(':E_ID', $data['user_id']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function getRequestByID($id)
    {
        $this->db->query('SELECT * FROM event_request_table WHERE Event_ID = :Event_ID');
        $this->db->bind(':Event_ID', $id);
        $row = $this->db->single();
        return $row;
    }
    public function getEhId($id){
        $this->db->query('SELECT * FROM event_hoster_details WHERE User_Id = :User_Id');
        $this->db->bind(':User_Id', $id);
        $row = $this->db->single();
        return $row;
    }

    public function UpdateRequest($data)
    {
        $this->db->query('UPDATE event_request_table SET Donation_Description = :Donation_Description, Donation_Quantity = :Donation_Quantity, Donation_Type = :Donation_Type, Donation_Priority = :Donation_Priority WHERE Event_ID = :Event_ID');
        // Bind values
        if (isset($data['Donation_Description'])) {

            $this->db->bind(':Donation_Description', $data['Donation_Description']);
            $this->db->bind(':Donation_Quantity', $data['Donation_Quantity']);
            $this->db->bind(':Donation_Type', $data['Donation_Type']);
            $this->db->bind(':Donation_Priority', $data['Donation_Priority']);
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
        $this->db->query('DELETE FROM event_request_table WHERE Event_ID = :Event_ID');
        // Bind values
        $this->db->bind(':Event_ID', $id);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}

