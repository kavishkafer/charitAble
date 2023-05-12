<?php
class CompletedDonations extends Controller
{
    public function __construct()
    {
        // if(!isLoggedIn()){
        //     redirect('users/login');
        // }
        $this->reportsModel = $this->model('Admin_report');
    }
    
    // public function index()
    // {
    //     $this->view('admin/completed_donations');
    // }
    
    public function index(){
        // $jan=$this->reportsModel->completedDonationCount(1);
        // $feb=$this->reportsModel->completedDonationCount(2);
        // $mar=$this->reportsModel->completedDonationCount(3);
        // $apr=$this->reportsModel->completedDonationCount(4);
        // $may=$this->reportsModel->completedDonationCount(5);
        // $jun=$this->reportsModel->completedDonationCount(6);
        // $jul=$this->reportsModel->completedDonationCount(7);
        // $aug=$this->reportsModel->completedDonationCount(8);
        // $sep=$this->reportsModel->completedDonationCount(9);
        // $oct=$this->reportsModel->completedDonationCount(10);
        // $nov=$this->reportsModel->completedDonationCount(11);
        // $dec=$this->reportsModel->completedDonationCount(12);
        // $data = [
        //     'jan' => 'jan',
        //     'feb' => 'feb',
        //     'mar' => 'mar',
        //     'apr' => 'apr',
        //     'may' => 'may',
        //     'jun' => 'jun',
        //     'jul' => 'jul',
        //     'aug' => 'aug',
        //     'sep' => 'sep',
        //     'oct' => 'oct',
        //     'nov' => 'nov',
        //     'dec' => 'dec',
        //     'janCount' => $jan,
        //     'febCount' => $feb,
        //     'marCount' => $mar,
        //     'aprCount' => $apr,
        //     'mayCount' => $may,
        //     'junCount' => $jun,
        //     'julCount' => $jul,
        //     'augCount' => $aug,
        //     'sepCount' => $sep,
        //     'octCount' => $oct,
        //     'novCount' => $nov,
        //     'decCount' => $dec,
        // ];
        // header('Content-Type: application/json');
        // echo json_encode($data);
        $results = $this->reportsModel->completedDonationCount();
        $data = [
            'dateArray' =>$results
        ];
        $this->view('admin/completed_donations',$data);
    }
}

?>