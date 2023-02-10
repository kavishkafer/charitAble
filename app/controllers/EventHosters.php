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
        
        $data = [
            'eventHoster' => $eventHoster,
       ];
        $this->view('admin/eh_view_profile',$data);
    }
    }