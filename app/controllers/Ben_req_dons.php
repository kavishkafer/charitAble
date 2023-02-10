<?php 
<<<<<<< HEAD
class Ben_req_dons extends Controller{
=======
class Ben_req_don extends Controller{
>>>>>>> d6e0bf34a1b9803fa4991581945ce5b4da94f2ad

public function __construct(){
$this->ben_req_donModel = $this->model('Ben_req_don');
$this->userModel = $this->model('User');
<<<<<<< HEAD
=======
$this->requestModel = $this->model('Request');
>>>>>>> d6e0bf34a1b9803fa4991581945ce5b4da94f2ad

}


   public function index(){
    $this->view('ben_req_dons/index');
}

<<<<<<< HEAD
public function getRequest(){
    $getRequest=$this->ben_req_donModel->getRequest(10);
    $data= [
        'title'=>'getRequest',
        'donation_quantity' => $getRequest,
        'donation_type' => $getRequest->donation_type,
        'donation_priority' => $getRequest->donation_priority,
    ];
=======
>>>>>>> d6e0bf34a1b9803fa4991581945ce5b4da94f2ad




}
