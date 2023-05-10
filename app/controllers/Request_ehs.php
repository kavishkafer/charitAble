<?php
class Request_ehs extends Controller {
    public function __construct(){

        /*if(!isLoggedIn()){
            redirect('users/login');
        }*/
        $this->userModel = $this->model('User');
        $this->ehRequestModel = $this->model('Request_eh');
    }
    public function index(){
        //get requests
        $beneficiaries = $this->ehRequestModel->getBeneficiaries();
        $data =[
            'beneficiaries' =>$beneficiaries
        ];
        $this->view('request_ehs/index', $data);
    }

    public function requestEvents($ben_id){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $c= $_SESSION['user_id'];
            $d =$this->ehRequestModel-> getEhId($c);
            //Sanitize request data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'document' => $_FILES['document'],
                'document_name' => time().'_'.$_FILES['document']['name'],
                'event_name' => trim($_POST['event_name']),
                'event_date' => trim($_POST['event_date']),
                'event_time' => trim($_POST['event_time']),
                'event_description' => trim($_POST['event_description']),
                'user_id' => $d->E_ID,
                'B_id' => $ben_id,
                'document_err' => '',
                'event_name_err' =>'',
                'event_date_err' => '',
                'event_time_err' => '',
                'event_description_err' => '',
            ];

            if(uploadDocument($data['document']['tmp_name'], $data['document_name'], '/img/documents/')) {
                //done
            }
            else {
                $data['document_err'] = 'Error uploading image';
            }

            //Validate event name
            if(empty($data['event_name'])){
                $data['event_name_err'] = 'Please enter event name';
            }

            //Validate event date
            if(empty($data['event_date'])){
                $data['event_date_err'] = 'Please enter event date';
            }

            //Validate event time
            if(empty($data['event_time'])){
                $data['event_time_err'] = 'Please enter event time';
            }

            //Validate event description
            if(empty($data['event_description'])){
                $data['event_description_err'] = 'Please enter event description';
            }

            //Make sure errors are empty
            if(empty($data['document_err']) && empty($data['event_name_err']) && empty($data['event_date_err']) && empty($data['event_time_err']) && empty($data['event_description_err'])){
                // Validated
                if($this->ehRequestModel->eventRequests($data)){
                    flash('request_message', 'Event request sent successfully');
                    print_r($data);
                   redirect('request_ehs/reviewreq');

                } else {
                    die('Something went wrong');
                }
            }else{
                //Load view with errors
                $this->view('request_ehs/requestEvents', $data);
            }

        }else{
            $data = [
                'document' => '',
                'event_name' => '',
                'event_date' => '',
                'event_time' => '',
                'event_description' => '',
                'B_id' => $ben_id,
                'document_err' => '',
                'event_name_err' => '',
                'event_date_err' => '',
                'event_time_err' => '',
                'event_description_err' => '',
            ];

            $this->view('request_ehs/requestEvents', $data);

        }

        echo json_encode($data);
    }

    public function edit($id){

        $c= $_SESSION['user_id'];
        $d =$this->ehRequestModel-> getEhId($c);
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [

                'event_id'=> $id,
                'event_name' => trim($_GET['event_name']),
                'event_date' => trim($_GET['event_date']),
                'event_time' => trim($_GET['event_time']),
                'event_description' => trim($_GET['event_description']),
                'user_id' => $d->E_ID,

                'event_name_err' =>'',
                'event_date_err' => '',
                'event_time_err' => '',
                'event_description_err' => ''
            ];

            //Validate Name
            if(empty($data['event_name'])){
                $data['event_name_err'] = 'Please enter event name';
            }

            //Validate Telephone Number
            if(empty($data['event_date'])){
                $data['event_date_err'] = 'Please enter event date';
            }

            //Validate food type
            if(empty($data['event_time'])){
                $data['event_time_err'] = 'Please enter event time';
            }

            //Validate food type
            if(empty($data['event_description'])){
                $data['event_description_err'] = 'Please enter event description';
            }

            //Make sure errors are empty
            if(empty($data['event_name_err']) && empty($data['event_date_err']) && empty($data['event_time_err']) && empty($data['event_description_err'])){
                // Validated
                if($this->ehRequestModel->updateEventRequests($data)){
                    flash('request_message', 'Request Updated');
                    redirect('request_ehs/reviewreq');
                } else {
                    die('Something went wrong');
                }
            }else{
                //Load view with errors
                $this->view('request_ehs/edit', $data);
            }

        }else{
            //Get existing post from model
            $requests = $this->ehRequestModel->getEventRequestById($id);
            // Check for owner
            if($requests->E_ID != $d->E_ID){
                redirect('request_ehs/reviewreq');
            }

            $data = [
                'event_id'=>$id,
                'event_name' => $requests->Event_Name,
                'event_date' => $requests->Event_Date,
                'event_time' => $requests->Event_Time,
                'event_description' =>$requests->Event_Description,
                'event_name_err' => '',
                'event_date_err' => '',
                'event_time_err' => '',
                'event_description_err' => ''
            ];

            $this->view('request_ehs/edit', $data);

        }

        echo json_encode($data);
    }

    public function reviewreq(){

        //get requests
        $requests = $this->ehRequestModel->getEventRequests();
        //$user = $this->userModel->getUserById($id);
        $data = [
            'requests' => $requests,
            //'user' => $user
        ];

        $this->view('request_ehs/reviewreq', $data);
    }

    public function show($id){
        $requests = $this->ehRequestModel->getEventRequestById($id);
        $user = $this->userModel->getEhUserById($requests->E_ID);

        $data = [
            'requests' => $requests,
            'user' => $user
        ];

        if($data['requests']!=null){
            $this->view('request_ehs/show', $data);
        } else {
            redirect('request_ehs/reviewreq');
        }
    }

    public function delete($id){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Get existing post from model
            $request = $this->ehRequestModel->getEventRequests();
            // Check for owner
            if($request->E_ID != $_SESSION['user_id']){
                redirect('request_ehs/reviewreq');
            }
            if($this->ehRequestModel->deleteRequest($id)){
                flash('request_message', 'Request Removed');
                redirect('request_ehs/reviewreq');
            } else {
                die('Something went wrong');
            }
        } else {
            redirect('request_ehs/reviewreq');
        }
    }

    public function get_events(){
        $requests = $this->ehRequestModel->getAllRequests();
        $data = [
            'requests' => $requests,
        ];
        echo json_encode($data);
    }
}