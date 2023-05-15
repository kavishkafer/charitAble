<?php
class Eventreqben{
    private $db;
    public function __construct(){
        $this->db = new Database;
    }

    public function getAllRequests(){

        $this->db->query('SELECT *
                  FROM event_request_table INNER JOIN beneficiary_details 
                  ON `event_request_table`.`B_id` = `beneficiary_details`.`B_Id` AND ' . $_SESSION['user_id'] . ' = `beneficiary_details`.`User_Id`
                  WHERE accepted = false AND completed = false');
        /*$this->db->query('select * from shedule_request_table where accepted = false and completed = false ');*/

        $results = $this->db->resultSet();

        return $results;
    }

    public function getAllRequestsOnGoing(){

        $this->db->query('SELECT *
                  FROM event_request_table INNER JOIN beneficiary_details 
                  ON `event_request_table`.`B_id` = `beneficiary_details`.`B_Id` AND ' . $_SESSION['user_id'] . ' = `beneficiary_details`.`User_Id`
                  WHERE accepted = true AND completed = false');
        /*$this->db->query('select * from shedule_request_table where accepted = false and completed = false ');*/

        $results = $this->db->resultSet();

        return $results;
    }

    public function getAllRequestsCompleted(){

        $this->db->query('SELECT *
                  FROM event_request_table INNER JOIN beneficiary_details 
                  ON `event_request_table`.`B_id` = `beneficiary_details`.`B_Id` AND ' . $_SESSION['user_id'] . ' = `beneficiary_details`.`User_Id`
                  WHERE accepted = true AND completed = true');
        /*$this->db->query('select * from shedule_request_table where accepted = false and completed = false ');*/

        $results = $this->db->resultSet();

        return $results;
    }




    public function getRequestDetails($id){
        $this->db->query('SELECT * FROM event_request_table where Event_ID = :Event_ID');
        $this->db->bind(':Event_ID', $id);
        $row = $this->db->single();
        return $row;
    }

    public function acceptRequest($Id){

        $this->db->query('UPDATE event_request_table SET accepted = true WHERE Event_ID = :Event_ID');
        $this->db->bind(':Event_ID', $Id);
        if($this->db->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    public function completeRequest($Id){
        $this->db->query('UPDATE event_request_table SET completed = true WHERE Event_ID = :Event_ID');
        $this->db->bind(':Event_ID', $Id);
        if($this->db->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    public function deleteRequest($id){
        $this->db->query('DELETE FROM event_request_table where Event_ID = :Event_ID');
        // Bind values
        $this->db->bind(':Event_ID', $id);

        // Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }




    public function leaveFeedback($data){
        $this->db->query('INSERT INTO event_request_table (feedback, E_ID, B_Id) VALUES(:feedback, :E_ID, :B_Id)');
        //Bind values
        $this->db->bind(':feedback', $data['feedback']);
        $this->db->bind(':E_ID', $data['user_id']);
        $this->db->bind(':B_Id', $data['B_id']);
        //Execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
}





