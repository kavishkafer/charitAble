<?php 
    class EventHosters extends Controller {
        public function __construct(){
            // if(!isLoggedIn()){
            //     redirect('users/login');
            // }
            $this->eventHosterModel = $this->model('EventHoster');
        }

        public function registration_requests(){
            $reg_eveHosts = $this->eventHosterModel->getRegEvenHostDetails();
            $data = [
                'reg_eveHosts' => $reg_eveHosts
            ];
            $this->view('admin/eh_registration_requests', $data);
        }

        public function view_request($id){
            // Get profile details
            $eventHoster = $this->eventHosterModel->getEventHosterById($id);
            $data = [
                'eventHoster' => $eventHoster
            ];
        $this->view('admin/eh_view_request',$data);
        }

        public function approve_request($id){
            $this->eventHosterModel->approveRequest($id);
            $eventHoster_details = $this->eventHosterModel->getEventHosterDetails();
            $data = [
                'eventHoster_details' => $eventHoster_details
            ];
            $this->view('admin/list_of_eventHosters',$data);
        }

        public function deny_request($id){
            $this->eventHosterModel->denyRequest($id);
            $reg_eveHosts = $this->eventHosterModel->getRegEvenHostDetails();
            $data = [
                'reg_eveHosts' => $reg_eveHosts
            ];
            $this->view('admin/eh_registration_requests',$data);
        }

        public function list_of_eventHosters(){
            // Get admin details
            $eventHoster_details = $this->eventHosterModel->getEventHosterDetails();
            $data = [
                'eventHoster_details' => $eventHoster_details
            ];
            $this->view('admin/list_of_eventHosters',$data);
        }

        public function view_profile($id){
            // Get profile details
        $eventHoster = $this->eventHosterModel->getEventHosterById($id);
        $pending_event_count = $this->eventHosterModel->getPendingEventCount($id);
        $completed_event_count = $this->eventHosterModel->getCompletedEventCount($id);
        
        $data = [
            'eventHoster' => $eventHoster,
            'pending_event_count' => $pending_event_count,
            'pending' => 'Pending Events',
            'completed' => 'Completed Events',
            'completed_event_count' => $completed_event_count
       ];
        $this->view('admin/eh_view_profile',$data);
    }
    // public function eventStatus($id){
    //     $pending=$this->eventHosterModel->getPendingEventCount($id);
    //     $completed=$this->eventHosterModel->getCompletedEventCount($id);
    //     $data = [
    //         'eventHoster'=>$eventHoster,
    //         'pending' => 'pending Requests',
    //         'completed' => 'completed Requests',
    //         'pendingCount' => $pending,
    //         'completedCount' => $completed,
    //     ];
    //     header('Content-Type: application/json');
    //     echo json_encode($data);
    }

   
    