<?php 
class Stat_bens extends Controller{
    public function __construct(){
        // if(!isLoggedIn()){
        //     redirect('users/login_ben');
        // }
        $this->requestModel = $this->model('Request_ben');
        $this->userModel = $this->model('User');
        $this->statModel = $this->model('Stat_ben');
    }
     public function index(){
         $this->view('stat_bens/index');

     }
public function No_of_requests(){
   $No_of_requests=$this->statModel->No_of_requests(10);
    $data= [
        'title'=>'No_of_requests',
        'donation_quantity' => $No_of_requests,
        'donation_type' => $No_of_requests->donation_type,
        'donation_priority' => $No_of_requests->donation_priority,
    ];


    $this->view('stat_bens/index', $data);

    

}

}