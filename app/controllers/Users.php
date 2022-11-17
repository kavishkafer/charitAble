<?php 
class Users extends Controller{
    public function __construct(){
   $this->userModel = $this->model('User');
    }
    public function signup_ben(){
        // Check for POST
        
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Process form

            //sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
         
            // Init data
            $data = [
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),  
                'telephone_number' => trim($_POST['telephone_number']),
                'address' => trim($_POST['address']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'name_err' => '',
                'email_err' => '',
                'telephone_number_err' => '',
                'address_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            ];
            //Validate Email
            if(empty($data['email'])){
                $data['email_err'] = 'Please enter email';
            }
            //Validate Name
            if(empty($data['name'])){
                $data['name_err'] = 'Please enter name';
            }
            //Validate Telephone Number
            if(empty($data['telephone_number'])){
                $data['telephone_number_err'] = 'Please enter telephone number';
            }
            //Validate Address
            if(empty($data['address'])){
                $data['address_err'] = 'Please enter address';
            }
            //Validate Password
            if(empty($data['password'])){
                $data['password_err'] = 'Please enter password';
            } elseif(strlen($data['password']) < 6){
                $data['password_err'] = 'Password must be at least 6 characters';
            }
            //Validate Confirm Password
            if(empty($data['confirm_password'])){
                $data['confirm_password_err'] = 'Please confirm password';
            } else {
                if($data['password'] != $data['confirm_password']){
                    $data['confirm_password_err'] = 'Passwords do not match';
                }
            }
            // Make sure errors are empty
            if(empty($data['email_err']) && empty($data['name_err']) && empty($data['telephone number_err']) && empty($data['address_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])){
                // Validated
                //Hash
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                //Register User
                if($this->userModel->register($data)){
                    flash('register_success', 'You are registered and can log in');
                    redirect('users/login_ben');
                } else {
                    die('Something went wrong');
                }

                
            } else {
                // Load view with errors
                $this->view('users/signup_ben', $data);
            }
            

            // Load view
            $this->view('users/signup_ben', $data);
        }
        else{
            // Init data
            $data = [
                'name' => '',
                'email' => '',  
                'telephone_number' => '',
                'address' => '',
                'password' => '',
                'confirm_password' => '',
                'name_err' => '',
                'email_err' => '',
                'telephone_number_err' => '',
                'address_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            ];
            // Load view
            $this->view('users/signup_ben', $data);
        }
    }


    public function login_ben(){
        // Check for POST
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Process form
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
            // Init data
            $data =[
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'email_err' => '',
                'password_err' =>''    
              ];
      
              // Validate Email
              if(empty($data['email'])){
                $data['email_err'] = 'Please enter email';
              }
      
              // Validate Password
              if(empty($data['password'])){
                $data['password_err'] = 'Please enter password';
              }
              // Check for user/email
              if($this->userModel->findUserByEmail($data['email'])){
                // User found
              } else {
                // User not found
                $data['email_err'] = 'No user found';
              }
      
              // Make sure errors are empty
              if(empty($data['email_err']) && empty($data['password_err'])){
                // Validated
                // Check and set logged in user
                $loggedInUser = $this->userModel->login($data['email'], $data['password']);
                if($loggedInUser){
                  // Create Session
                  $this->createUserSession($loggedInUser);
                  
                
                } else {
                  $data['password_err'] = 'Password incorrect';
      
                  $this->view('users/login_ben', $data);
                }
              } else {
                // Load view with errors
                $this->view('users/login_ben', $data);
              }
      
      
            } else {
              // Init data
              $data =[    
                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => '',        
              ];
      
              // Load view
              $this->view('users/login_ben', $data);
            }
            }
            public function createUserSession($user){
                $_SESSION['user_id'] = $user->B_Id;
                $_SESSION['user_email'] = $user->B_Email;
                $_SESSION['user_name'] = $user->B_Name;
                redirect('request_ben');
              }
              public function logout(){
                unset($_SESSION['user_id']);
                unset($_SESSION['user_email']);
                unset($_SESSION['user_name']);
                session_destroy();
                redirect('users/login_ben');
              }
              
              public function isLoggedIn(){
                if(isset($_SESSION['user_id'])){
                  return true;
                } else {
                  return false;
                }
              }
          }
      
        
    
