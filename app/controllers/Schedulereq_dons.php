<?php
class Schedulereq_dons extends Controller {
    public function __construct(){

        /*if(!isLoggedIn()){
            redirect('users/login');
        }*/
        $this->userModel = $this->model('User');
        $this->requestModel = $this->model('Schedulereq_don');
    }
    public function index(){
        //get requests
        $names = $this->requestModel->getNames();

        $data =[
            'names' =>$names
        ];

        $this->view('schedulereq_dons/index', $data);
    }

    public function add($ben_id){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $c= $_SESSION['user_id'];
            $d =$this->requestModel-> getdonId($c);
            //Sanitize request data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
            'D_Name' => trim($_POST['D_Name']),  
            'D_Tel_No' => trim($_POST['D_Tel_No']),
            'D_Address' => trim($_POST['D_Address']),
            'Food_Type' => trim($_POST['Food_Type']),
            'Donation_Quantity' => trim($_POST['Donation_Quantity']),
            'D_Date' => trim($_POST['D_Date']),
            'Time' => trim($_POST['Time']),
            'user_id' => $d->D_Id,            
            'B_id' => $ben_id,
            'D_Name_err' =>'',
            'D_Tel_No_err' => '',
            'D_Address_err' => '',
            'Food_Type_err' => '',
            'Donation_Quantity_err' => '',
            'D_Date_err' => '',
            'Time_err' => ''
        ];

        //Validate Name
        if(empty($data['D_Name'])){
            $data['D_Name_err'] = 'Please enter name';
        }

        //Validate Telephone Number
        if(empty($data['D_Tel_No'])){
            $data['D_Tel_No_err'] = 'Please enter telephone number';
        }
        //Validate Address
        if(empty($data['D_Address'])){
            $data['D_Address_err'] = 'Please enter address';
        }
        //Validate food type
        if(empty($data['Food_Type'])){
            $data['Food_Type_err'] = 'Please enter food type';
        }

        //Validate food type
        if(empty($data['Donation_Quantity'])){
            $data['Donation_Quantity_err'] = 'Please enter donation quantity';
        }

        //Validate date
        if(empty($data['D_Date'])){
            $data['D_Date_err'] = 'Please enter date';
        }
        //Validate time
        if(empty($data['Time'])){
            $data['Time_err'] = 'Please enter time';
        }

        //Make sure errors are empty
        if(empty($data['D_Name_err']) && empty($data['D_Tel_No_err']) && empty($data['D_Address_err']) && empty($data['Food_Type_err']) && empty($data['Donation_Quantity_err']) && empty($data['D_Date_err']) && empty($data['Time_err'])){
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
            'D_Name' => '',
            'D_Tel_No' => '',
            'D_Address' => '',
            'Food_Type' => '',
            'Donation_Quantity' => '',
            'D_Date' => '',
            'Time' => '',
            'B_id' => $ben_id,
            'D_Name_err' => '',
            'D_Tel_No_err' => '',
            'D_Address_err' => '',
            'Food_Type_err' => '',
            'Donation_Quantity_err' => '',
            'D_Date_err' => '',
            'Time_err' => ''
        ];

        $this->view('schedulereq_dons/add', $data);

    }

    echo json_encode($data);
}

public function edit($id){
    
    $c= $_SESSION['user_id'];
    $d =$this->requestModel-> getdonId($c);
    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    $data = [
        'B_Req_ID'=> $id,
        'D_Name' => trim($_GET['D_Name']),  
        'D_Tel_No' => trim($_GET['D_Tel_No']),
        'D_Address' => trim($_GET['D_Address']),
        'Food_Type' => trim($_GET['Food_Type']),
        'Donation_Quantity' => trim($_GET['Donation_Quantity']),
        'D_Date' => trim($_GET['D_Date']),
        'Time' => trim($_GET['Time']),
        'user_id' => $d->D_Id,

        'D_Name_err' =>'',
        'D_Tel_No_err' => '',
        'D_Address_err' => '',
        'Food_Type_err' => '',
        'Donation_Quantity_err' => '',
        'D_Date_err' => '',
        'Time_err' => ''
    ];

    //Validate Name
    if(empty($data['D_Name'])){
        $data['D_Name_err'] = 'Please enter name';
    }

    //Validate Telephone Number
    if(empty($data['D_Tel_No'])){
        $data['D_Tel_No_err'] = 'Please enter telephone number';
    }
    //Validate Address
    if(empty($data['D_Address'])){
        $data['D_Address_err'] = 'Please enter address';
    }
    //Validate food type
    if(empty($data['Food_Type'])){
        $data['Food_Type_err'] = 'Please enter food type';
    }

    //Validate food type
    if(empty($data['Donation_Quantity'])){
        $data['Donation_Quantity_err'] = 'Please enter donation quantity';
    }

    //Validate date
    if(empty($data['D_Date'])){
        $data['D_Date_err'] = 'Please enter date';
    }
    //Validate time
    if(empty($data['Time'])){
        $data['Time_err'] = 'Please enter time';
    }

    //Make sure errors are empty
    if(empty($data['D_Name_err']) && empty($data['D_Tel_No_err']) && empty($data['D_Address_err']) && empty($data['Food_Type_err']) && empty($data['Donation_Quantity_err']) && empty($data['D_Date_err']) && empty($data['Time_err'])){
        // Validated
        if($this->requestModel->updateRequests($data)){
            flash('request_message', 'Request Updated');
            redirect('schedulereq_dons/reviewreq');
        } else {
            die('Something went wrong');
        }
    }else{
        //Load view with errors
        $this->view('schedulereq_dons/edit', $data);
    }

}else{
    //Get existing post from model
    $requests = $this->requestModel->getDRequestById($id);
    // Check for owner
    if($requests->D_Id != $d->D_Id){
        redirect('schedulereq_dons/reviewreq');
    }

    $data = [
        'B_Req_ID'=>$id,
        'D_Name' => $requests->D_Name,
        'D_Tel_No' => $requests->D_Tel_No,
        'D_Address' => $requests->D_Address,
        'Food_Type' => $requests->Food_Type,
        'Donation_Quantity' =>$requests->Donation_Quantity ,
        'D_Date' => $requests->D_Date,
        'Time' => $requests->Time,
    ];

    $this->view('schedulereq_dons/edit', $data);

}

echo json_encode($data);
}

public function reviewreq(){
    
    //get requests
    $requests = $this->requestModel->getRequests();
    //$user = $this->userModel->getUserById($id);
    $data = [
        'requests' => $requests,
        //'user' => $user
    ];

    $this->view('schedulereq_dons/reviewreq', $data);
}

    public function recentreq(){

        //get requests
        $requests = $this->requestModel->getRecentRequests();
        //$user = $this->userModel->getUserById($id);
        $data = [
            'requests' => $requests,
            //'user' => $user
        ];

        $this->view('dashboard_dons/index', $data);
    }

public function show($id){
    $requests = $this->requestModel->getDRequestById($id);
    $user = $this->userModel->getDUserById($requests->D_Id);

$data = [
    'requests' => $requests,
    'user' => $user
];

if($data['requests']!=null){
    $this->view('schedulereq_dons/show', $data);
    } else {
        redirect('schedulereq_dons/reviewreq');
    }
}

public function delete($id){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Get existing post from model
        $request = $this->requestModel->getRequests();
        // Check for owner
        if($request->D_Id != $_SESSION['user_id']){
            redirect('schedulereq_dons/reviewreq');
        }
        if($this->requestModel->deleteRequest($id)){
            flash('request_message', 'Request Removed');
            redirect('schedulereq_dons/reviewreq');
        } else {
            die('Something went wrong');
        }
    } else {
        redirect('schedulereq_dons/reviewreq');
    }
}

public function get_meals($id){
    $requests = $this->requestModel->getAllRequests($id);
    //$user = $this->userModel->getBenDetailsById($requests->B_Id);

    $data = [
        'requests' => $requests,
        //'user' => $user
    ];
    echo json_encode($data);
    }
}

