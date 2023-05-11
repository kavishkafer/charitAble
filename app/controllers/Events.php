<?php 
    class Events extends Controller {
        public function __construct(){
            // if(!isLoggedIn()){
            //     redirect('users/login');
            // }
                $this->eventModel = $this->model('Event');
        }

        public function list_of_pending_events(){
            $event_details = $this->eventModel->getPendingEventDetails();
        $data = [
             'event_details' => $event_details
        ];
        $this->view('admin/list_of_pending_events',$data);
        }

        public function list_of_completed_events(){
            $event_details = $this->eventModel->getCompletedEventDetails();
        $data = [
             'event_details' => $event_details
        ];
        $this->view('admin/list_of_completed_events',$data);
        }
    }