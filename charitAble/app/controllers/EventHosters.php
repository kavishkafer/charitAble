<?php 
    class EventHosters extends Controller {
        public function __construct(){
            if(!isLoggedIn()){
                redirect('users/login');
            }
            $this->eventHosterModel = $this->model('EventHoster');
        }

        public function registration_requests(){
            $this->view('eventHosters/registration_requests');
        }

        public function list_of_eventHosters(){
            // Get admin details
        $eventHoster_details = $this->eventHosterModel->getEventHosterDetails();

        $data = [
             'eventHoster_details' => $eventHoster_details
        ];

        $this->view('eventHosters/list_of_eventHosters',$data);
        }
    }