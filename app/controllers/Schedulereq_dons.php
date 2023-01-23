<?php
class Schedulereq_dons extends Controller {
    public function __construct(){
        if(!isLoggedIn()){
            redirect('users/login_dons');
        }

        $this->requestModel = $this->model('Schedulereq_don');
    }
    public function index(){
        //get requests
        //$requests = $this->requestModel->getRequests();

        $data =[
            //'requests' =>$requests
        ];

        $this->view('schedulereq_dons/index', $data);
    }

    public function add(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //Sanitize request data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
            'name' => trim($_POST['name']),  
            'tel_no' => trim($_POST['tel_no']),
            'address' => trim($_POST['address']),
            'food_type' => trim($_POST['food_type']),
            'date' => trim($_POST['date']),
            'time' => trim($_POST['time']),
            'name_err' =>'',
            'tel_no_err' => '',
            'address_err' => '',
            'food_type_err' => '',
            'date_err' => '',
            'time_err' => ''
        ];

        //Validate Name
        if(empty($data['name'])){
            $data['name_err'] = 'Please enter name';
        }

        //Validate Telephone Number
        if(empty($data['tel_no'])){
            $data['tel_no_err'] = 'Please enter telephone number';
        }
        //Validate Address
        if(empty($data['address'])){
            $data['address_err'] = 'Please enter address';
        }
        //Validate food type
        if(empty($data['food_type'])){
            $data['food_type_err'] = 'Please enter food type';
        }

        //Validate date
        if(empty($data['date'])){
            $data['date_err'] = 'Please enter date';
        }
        //Validate time
        if(empty($data['time'])){
            $data['time_err'] = 'Please enter time';
        }

        //Make sure errors are empty
        if(empty($data['name_err']) && empty($data['tel_no_err']) && empty($data['address_err']) && empty($data['food_type_err']) && empty($data['date_err']) && empty($data['time_err'])){
            // Validated
            if($this->requestModel->addRequests($data)){
                flash('request_message', 'Request Added');
                redirect('schedulereq_dons/reviewreq');
            } else {
                die('Something went wrong');
            }
        }else{
            //Load view with errors
            $this->view('schedulereq_dons/add', $data);
        }
    }else{
        $data = [
            'name' => '',
            'tel_no' => '',
            'address' => '',
            'food_type' => '',
            'date' => '',
            'time' => '',
            'name_err' => '',
            'tel_no_err' => '',
            'address_err' => '',
            'food_type_err' => '',
            'date_err' => '',
            'time_err' => ''
        ];

        $this->view('schedulereq_dons/add', $data);

    }
}

public function reviewreq(){
    
    //get requests
    $requests = $this->requestModel->getRequests();
    /*$request = $this->requestModel->getRequests($id);
    $user = $this->userModel->getUserById($request->id);*/
    $data = [
        'requests' => $requests
        //'user' => $user
    ];

    $this->view('schedulereq_dons/reviewreq', $data);
}



public function delete($id){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
       /* // Get existing post from model
        $request = $this->requestModel->getRequestById($id);
        // Check for owner
        if($request->id != $_SESSION['user_id']){
            redirect('schedulereq_dons/reviewreq');
        }*/
        if($this->requestModel->deleteRequest($id)){
            flash('request_message', 'Request Removed');
            redirect('schedulereq_dons/reviewreq');
        } else {
            die('Something went wrong');
        }
    } else {
        redirect('schedulereq_dons/index');
    }
}

}