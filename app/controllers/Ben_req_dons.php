<?php 
class Ben_req_don extends Controller{

public function __construct(){
$this->ben_req_donModel = $this->model('Ben_req_don');
$this->userModel = $this->model('User');
$this->requestModel = $this->model('Request');

}


   public function index(){
    $this->view('ben_req_dons/index');
}





}
