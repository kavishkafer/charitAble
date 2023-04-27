<?php 
class Stat_bens extends Controller
{
    public function __construct()
    {
        // if(!isLoggedIn()){
        //     redirect('users/login_ben');
        // }
        $this->requestModel = $this->model('Request_ben');
        $this->userModel = $this->model('User');
        $this->statModel = $this->model('Stat_ben');
    }

    public function index()
    {
        $No_of_requests = $this->statModel->No_of_requests(12);
        $data = [
            'title' => 'No_of_requests',
            'donation_quantity' => $No_of_requests,

        ];
     echo json_encode($data);
        $this->view('stat_bens/index', $data);

    }

    public function No_of_requests()
    {
        $No_of_requests = $this->statModel->No_of_requests(10);
        $data = [
            'title' => 'No_of_requests',
            'donation_quantity' => $No_of_requests,
            'donation_type' => $No_of_requests->donation_type,
            'donation_priority' => $No_of_requests->donation_priority,
        ];
        echo json_encode($data);


        $this->view('stat_bens/index', $data);


    }

    public function donationQuantity()
    {
        $donationQuantity = $this->statModel->donationQuantity(12);
        $quantity[] = array();

        $data = [
            'title' => 'donationQuantity',
            'donation_quantity' => $donationQuantity,

        ];
        while ($data['donation_quantity'] > 0) {
            $data['donation_quantity'] = $quantity["donation_quantity"];
        }

        $this->view('stat_bens/index', $quantity);

    }
}