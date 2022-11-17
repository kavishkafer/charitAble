<?php
class Request_bens extends Controller{
    public function __construct(){
        if(!isLoggedIn()){
            redirect('users/login_ben');
        }
        $this->requestModel = $this->model('Request_ben');
    }
    public function index(){
        $requests = $this->requestModel->getRequests();
        $data=[
            'requests' => $requests
        ];

        
        $this->view('request_bens/index', $data);
    }
    public function add(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'Donation_Description' => trim($_POST['Donation_Description']),
                'Donation_Quantity' => trim($_POST['Donation_Quantity']),
                'Donation_Type' => trim($_POST['Donation_Type']),
                'Donation_Priority' => trim($_POST['Donation_Priority']),
                'user_id' => $_SESSION['user_id'],
                'Donation_Description_err' => '',
                'Donation_Quantity_err' => '',
                'Donation_Type_err' => '',
                'Donation_Priority_err' => ''
            ];
            // Validate data
            if(empty($data['Donation_Description'])){
                $data['Donation_Description_err'] = 'Please enter description';
            }
            if(empty($data['Donation_Quantity'])){
                $data['Donation_Quantity_err'] = 'Please enter Quantity';
            }
            if(empty($data['Donation_Type'])){
                $data['Donation_Type_err'] = 'Please enter Donation type';
            }
            if(empty($data['Donation_Priority'])){
                $data['Donation_Priority_err'] = 'Please enter Donation priority';
            }
            // Make sure no errors
            if(empty($data['Donation_Description_err']) && empty($data['Donation_Quantity_err']) && empty($data['Donation_Type_err']) && empty($data['Donation_Priority_err'])){
                // Validated
                if($this->requestModel->addRequests($data)){
                    flash('request_message', 'Request Added');
                    redirect('request_bens');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $this->view('request_bens/add', $data);
            }
        } else {
            $data = [
                'Donation_Description' => '',
                'Donation_Quantity' => '',
                'Donation_Type' => '',
                'Donation_Priority' => '',
                'Donation_Description_err' => '',
                'Donation_Quantity_err' => '',
                'Donation_Type_err' => '',
                'Donation_Priority_err' => ''
            ];
            $this->view('request_bens/add', $data);
        }
      
    }

} 
