<?php
  class Users extends Controller {
    public function __construct(){
            $this-> userModel = $this->model('User');
    }

    public function signup_eh(){
      // Check for POST
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Process form
  
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        // Init data
        $data =[
          'name' => trim($_POST['name']),
          'email' => trim($_POST['email']),
          'address' => trim($_POST['address']),
          'telephone_number' => trim($_POST['telephone_number']),
          'password' => trim($_POST['password']),
          'confirm_password' => trim($_POST['confirm_password']),
          'name_err' => '',
          'email_err' => '',
          'address_err' => '',
          'telephone_number_err' => '',
          'password_err' => '',
          'confirm_password_err' => ''
        ];

        // Validate Email
        if(empty($data['email'])){
          $data['email_err'] = 'Pleae enter email';
        } else{
            //check email
            if($this->userModel->findUserByEmail($data['email'])){
                $data['email_err'] = 'Email is already taken';
            }
        }

        // Validate Name
        if(empty($data['name'])){
          $data['name_err'] = 'Pleae enter name';
        }

        // Validate address
        if(empty($data['address'])){
            $data['address_err'] = 'Pleae enter address';
          }

          if(empty($data['telephone_number'])){
            $data['telephone_number_err'] = 'Pleae enter telephone number';
          } elseif(strlen($data['telephone_number_err']) < 11){
            $data['telephone_number_err'] = 'Enter a valid telephone number';
          }


        // Validate Password
        if(empty($data['password'])){
          $data['password_err'] = 'Pleae enter password';
        } elseif(strlen($data['password']) < 6){
          $data['password_err'] = 'Password must be at least 6 characters';
        }

        // Validate Confirm Password
        if(empty($data['confirm_password'])){
          $data['confirm_password_err'] = 'Please confirm password';
        } else {
          if($data['password'] != $data['confirm_password']){
            $data['confirm_password_err'] = 'Passwords do not match';
          }
        }

        // Make sure errors are empty
        if(empty($data['email_err']) && empty($data['name_err']) && empty($data['address_err']) && empty($data['telephone_number_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])){
          // Validated
          
            //Hash password
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

            //register user
            if($this->userModel->signup_eh($data)){
                    redirect('users/login');
            }else {
                die('something went wrong');
            }

        } else {
          // Load view with errors
          $this->view('users/signup_eh', $data);
        }

      } else {
        // Init data
        $data =[
          'name' => '',
          'email' => '',
          'address' => '',
          'telephone_number' => '',
          'password' => '',
          'confirm_password' => '',
          'name_err' => '',
          'email_err' => '',
          'address_err' => '',
          'telephone_number_err' => '',
          'password_err' => '',
          'confirm_password_err' => ''
        ];

        // Load view
        $this->view('users/signup_eh', $data);
      }
    }

    public function login(){
      // Check for POST
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Process form
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        // Init data
        $data =[
          'email' => trim($_POST['email']),
          'password' => trim($_POST['password']),
          'email_err' => '',
          'password_err' => '',      
        ];

        // Validate Email
        if(empty($data['email'])){
          $data['email_err'] = 'Pleae enter email';
        }

        // Validate Password
        if(empty($data['password'])){
          $data['password_err'] = 'Please enter password';
        }

        // Make sure errors are empty
        if(empty($data['email_err']) && empty($data['password_err'])){
          // Validated
          die('SUCCESS');
        } else {
          // Load view with errors
          $this->view('users/login', $data);
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
        $this->view('users/login', $data);
      }
    }
  }