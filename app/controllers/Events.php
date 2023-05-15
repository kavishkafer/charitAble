<?php 
    class events extends Controller {
        public function __construct(){
            // if(!isLoggedIn()){
            //     redirect('users/login');
            // }

                $this->EventModel = $this->model('Event');
        }

        // Pending events
        public function list_of_pending_events(){
            $event_details = $this->EventModel->getPendingEventDetails();
        $data = [
             'event_details' => $event_details
        ];
        $this->view('admin/list_of_pending_events',$data);
        }

        public function pending_events_filter_by_Btype() {
            $b_type = $_GET['b_type'];
            if (empty($b_type)) {
                $filtered_events = $this->EventModel->getPendingEventDetails();
            } else {
                $filtered_events = $this->EventModel->getPendingEventDetailsByBType($b_type);
            }
            $data = [
                'event_details' => $filtered_events
            ];
            $this->view('admin/list_of_pending_events', $data);
        }

        // Accepted events

        public function list_of_accepted_events(){
            $event_details = $this->EventModel->getAcceptedEventDetails();
        $data = [
             'event_details' => $event_details
        ];
        $this->view('admin/list_of_accepted_events',$data);
        }

        public function accepted_events_filter_by_Btype() {
            $b_type = $_GET['b_type'];
            if (empty($b_type)) {
                $filtered_events = $this->EventModel->getAcceptedEventDetails();
            } else {
                $filtered_events = $this->EventModel->getAcceptedEventDetailsByBType($b_type);
            }
            $data = [
                'event_details' => $filtered_events
            ];
            $this->view('admin/list_of_accepted_events', $data);
        }

        // Completed events
        public function list_of_completed_events(){
            $Event_details = $this->EventModel->getCompletedEventDetails();
        $data = [
             'event_details' => $Event_details
        ];
            $Event_details = $this->EventModel->getCompletedEventDetails();
            $this->view('admin/list_of_completed_events',$data);
        }

        public function completed_events_filter_by_Btype() {
            $b_type = $_GET['b_type'];
            if (empty($b_type)) {
                $filtered_events = $this->EventModel->getCompletedEventDetails();
            } else {
                $filtered_events = $this->EventModel->getCompletedEventDetailsByBType($b_type);
            }
            $data = [
                'event_details' => $filtered_events
            ];
            $this->view('admin/list_of_completed_events', $data);

        }
    }