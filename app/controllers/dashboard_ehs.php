<?php
class dashboard_ehs extends Controller{
    public function __construct(){
        /*if(!isLoggedIn()){
           redirect('users/login_dons');
       }
       $this->view('dashboard_dons/index', $data);*/
        $this->requestModel = $this->model('Request_eh');
        $this->userModel = $this->model('User');
    }

    public function index(){


       $requests = $this->requestModel->getRecentEventReq();
       /* $requestsben = $this->requestModel->getRecentBeneficiaryReq();*/
       $requestscom = $this->requestModel->completedRequestsEhDetails($_SESSION['user_id']);
      /*  $requestscomben = $this->requestModel->getCompletedBeneficiaryReq(); */
        $row=$this->requestModel->getEhId($_SESSION['user_id']);
        $count=$this->requestModel->totalRequestsByEh($row->E_ID);
        $accept=$this->requestModel->acceptedRequestsEh($row->E_ID);
        $complete=$this->requestModel->completedRequestsEh($row->E_ID);
        $pending=$this->requestModel->pendingRequestsEh($row->E_ID);
        $data=[
            'requests' => $requests,
            'requestscom' => $requestscom,
            /*'requestsben' => $requestsben,
            'requestscom' => $requestscom,
            'requestscomben' => $requestscomben,*/
            'count' => $count,
            'accept' => $accept,
            'complete' => $complete,
            'pending' => $pending

        ];

        $this->view('dashboard_ehs/index', $data);
    }

}