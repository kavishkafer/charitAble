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
//     echo json_encode($data);
        $this->view('stat_bens/index', $data);

    }

    public function No_of_requests()
    {
        $userId = $_SESSION['user_id'];
        $id = $this->requestModel->getBenId($userId)->B_Id;
        $No_of_requests = $this->statModel->No_of_requests($id);
        $data = [
            'title' => 'No_of_requests',
            'donation_quantity' => $No_of_requests,
//            'donation_type' => $No_of_requests->donation_type,
//            'donation_priority' => $No_of_requests->donation_priority,
        ];
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function requestStatus(){
        $id=$this->requestModel->getBenId($_SESSION['user_id'])->B_Id;
        $pending=$this->requestModel->pendingRequestsBen($id);
        $accepted=$this->requestModel->acceptedRequestsBen($id);
        $completed=$this->requestModel->completedRequestsBen($id);
        $data = [
            'pending' => 'pending Requests',
            'accepted' => 'accepted Requests',
            'completed' => 'completed Requests',
            'pendingCount' => $pending,
            'acceptedCount' => $accepted,
            'completedCount' => $completed,
        ];
        header('Content-Type: application/json');
        echo json_encode($data);


    }
    public function donationViaMonths(){
        $id=$this->requestModel->getBenId($_SESSION['user_id'])->B_Id;
        $jan=$this->statModel->donationViaMonths($id,1);
        $feb=$this->statModel->donationViaMonths($id,2);
        $mar=$this->statModel->donationViaMonths($id,3);
        $apr=$this->statModel->donationViaMonths($id,4);
        $may=$this->statModel->donationViaMonths($id,5);
        $jun=$this->statModel->donationViaMonths($id,6);
        $jul=$this->statModel->donationViaMonths($id,7);
        $aug=$this->statModel->donationViaMonths($id,8);
        $sep=$this->statModel->donationViaMonths($id,9);
        $oct=$this->statModel->donationViaMonths($id,10);
        $nov=$this->statModel->donationViaMonths($id,11);
        $dec=$this->statModel->donationViaMonths($id,12);
        $data = [
            'jan' => 'jan',
            'feb' => 'feb',
            'mar' => 'mar',
            'apr' => 'apr',
            'may' => 'may',
            'jun' => 'jun',
            'jul' => 'jul',
            'aug' => 'aug',
            'sep' => 'sep',
            'oct' => 'oct',
            'nov' => 'nov',
            'dec' => 'dec',
            'janCount' => $jan,
            'febCount' => $feb,
            'marCount' => $mar,
            'aprCount' => $apr,
            'mayCount' => $may,
            'junCount' => $jun,
            'julCount' => $jul,
            'augCount' => $aug,
            'sepCount' => $sep,
            'octCount' => $oct,
            'novCount' => $nov,
            'decCount' => $dec,
        ];
        header('Content-Type: application/json');
        echo json_encode($data);

    }
    public function scheduledDonationsViaMonths(){
        $id=$this->requestModel->getBenId($_SESSION['user_id'])->B_Id;
        $jan=$this->statModel->scheduledDonationsViaMonths($id,1);
        $feb=$this->statModel->scheduledDonationsViaMonths($id,2);
        $mar=$this->statModel->scheduledDonationsViaMonths($id,3);
        $apr=$this->statModel->scheduledDonationsViaMonths($id,4);
        $may=$this->statModel->scheduledDonationsViaMonths($id,5);
        $jun=$this->statModel->scheduledDonationsViaMonths($id,6);
        $jul=$this->statModel->scheduledDonationsViaMonths($id,7);
        $aug=$this->statModel->scheduledDonationsViaMonths($id,8);
        $sep=$this->statModel->scheduledDonationsViaMonths($id,9);
        $oct=$this->statModel->scheduledDonationsViaMonths($id,10);
        $nov=$this->statModel->scheduledDonationsViaMonths($id,11);
        $dec=$this->statModel->scheduledDonationsViaMonths($id,12);
        $data=[
            'jan' => 'jan',
            'feb' => 'feb',
            'mar' => 'mar',
            'apr' => 'apr',
            'may' => 'may',
            'jun' => 'jun',
            'jul' => 'jul',
            'aug' => 'aug',
            'sep' => 'sep',
            'oct' => 'oct',
            'nov' => 'nov',
            'dec' => 'dec',
            'janCount' => $jan,
            'febCount' => $feb,
            'marCount' => $mar,
            'aprCount' => $apr,
            'mayCount' => $may,
            'junCount' => $jun,
            'julCount' => $jul,
            'augCount' => $aug,
            'sepCount' => $sep,
            'octCount' => $oct,
            'novCount' => $nov,
            'decCount' => $dec,
        ];
        header('Content-Type: application/json');
        echo json_encode($data);

    }
    public function priorityCount(){
        $id=$this->requestModel->getBenId($_SESSION['user_id'])->B_Id;
        $high=$this->statModel->highPriorityCount($id);
        $normal=$this->statModel->normalPriorityCount($id);

        $data = [
            'high' => 'high',
            'normal' => 'normal',
            'low' => 'low',
            'highCount' => $high,
            'normalCount' => $normal,

        ];
        header('Content-Type: application/json');
        echo json_encode($data);

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