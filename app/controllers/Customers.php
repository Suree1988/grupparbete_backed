<?php

class Customers extends Controller{
    public function __construct(){
        $this->userModel = $this->model('Customer');
      }
        // Check for POST
        public function register(){
            // Check for POST
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Process form

                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                 // Init data
                 $data =[
                    'firstname' => trim($_POST['firstname']),
                    'lastname' => trim($_POST['lastname']),
                    'email' => trim($_POST['email']),
                    'address' => trim($_POST['address']),
                    'postcode' => trim($_POST['postcode']),
                    'city' => trim($_POST['city']),
                    'password' => trim($_POST['password']),
                    'confirm_password' => trim($_POST['confirm_password']),
                    'firstname_err' => '',
                    'lastname_err' => '',
                    'email_err' => '',
                    'address_err' => '',
                    'postcode_err' => '',
                    'city_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => ''
                ];

                // Valiadate Firstname
                if(empty($data['firstname'])){
                    $data['firstname_err'] = 'Firstname is required';
                }

                // Valiadate Lastname
                if(empty($data['lastname'])){
                    $data['lastname_err'] = 'Lastname is required';
                }
                
                // Validate Email
                if(empty($data['email'])){
                    $data['email_err'] = 'Email is required';
                } else {
                    if($this->userModel->findCustomerByEmail($data['email'])){
                        $data['email_err'] = 'This email is already taken';
                    }
                }

                // Valiadate Address
                if(empty($data['address'])){
                    $data['address_err'] = 'Address is required';
                }

                // Valiadate Postcode
                if(empty($data['postcode'])){
                    $data['postcode_err'] = 'Postcode is required';
                }

                // Valiadate City
                if(empty($data['city'])){
                    $data['city_err'] = 'City is required';
                }

                // Valiadate Password
                if(empty($data['password'])){
                    $data['password_err'] = 'Password is required';
                } elseif(strlen($data['password']) < 6){
                    $data['password_err'] = 'Please enter at least 6 characters';
                }

                // Valiadate Confirm Password
                if(empty($data['confirm_password'])){
                    $data['confirm_password_err'] = 'Please confirm password';
                } else {
                    if($data['password'] != $data['confirm_password']){
                        $data['confirm_password_err'] = 'Password do not match';
                    }
                }

                // Make sure errors are empty
                if(empty($data['firstname_err']) && empty($data['lastname_err']) && empty($data['email_err']) && empty($data['address_err']) && empty($data['postcode_err']) && empty($data['city_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])){
                    // Validated
                    
                    // Hash Password
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                    // Register Customer
                    if($this->userModel->register($data)){
                        flash('register_success', 'Thank you! Now you can sign in');
                        redirect('customers/signin');
                    } else {
                        die('Something went wrong');
                    }
                } else {
                    // Load view with errors
                    $this->view('customers/register', $data);
                }
        
            } else {
                // Init data
                $data =[
                    'firstname' => '',
                    'lastname' => '',
                    'email' => '',
                    'address' => '',
                    'postcode' => '',
                    'city' => '',
                    'password' => '',
                    'confirm_password' => '',
                    'firstname_err' => '',
                    'lastname_err' => '',
                    'email_err' => '',
                    'address_err' => '',
                    'postcode_err' => '',
                    'city_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => ''
                ];

                // Load View
                $this->view('customers/register', $data);
            }
        }

        public function signin(){
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

            // Check for customer/email
            if($this->userModel->findCustomerByEmail($data['email'])){
                // User found
            } else {
                // User not found
                $data['email_err'] = 'Email not found';
            }
  
          // Make sure errors are empty
          if(empty($data['email_err']) && empty($data['password_err'])){
            // Validated
            // Check and set logged in customer
            $signedinCustomer = $this->userModel->signin($data['email'], $data['password']);

            if($signedinCustomer){
                // Create Session
                $this->createCustomerSession($signedinCustomer);

            } else {
                $data['password_err'] = 'Password incorrect';

                $this->view('customers/signin', $data);
            }

            } else {
            // Load view with errors
            $this->view('customers/signin', $data);
        }

            } else {
                // Init data
                $data =[
                    'email' => '',
                    'password' => '',
                    'email_err' => '',
                    'password_err' => '',
                ];

                // Load View
                $this->view('customers/signin', $data);
            }
        }

        public function createCustomerSession($customer){
            $_SESSION['customer_id'] = $customer->id;
            $_SESSION['customer_email'] = $customer->email;
            $_SESSION['customer_firstname'] = $customer->firstname;
            redirect('orders');
        }

        public function signout(){
            unset($_SESSION['customer_id']);
            unset($_SESSION['customer_email']);
            unset($_SESSION['customer_firstname']);
            session_destroy();
            redirect('customers/signin');
        }

    }