<?php
    class Customer {
        private $db;


        public function __construct(){
            $this->db = new Database;
          }   

          // Register customer
          public function register($data){
              $this->db->query('INSERT INTO customers (firstname, lastname, email, address, postcode, city, password) VALUES(:firstname, :lastname, :email, :address, :postcode, :city, :password)');
              // Bind values
              $this->db->bind(':firstname', $data['firstname']);
              $this->db->bind(':lastname', $data['lastname']);
              $this->db->bind(':email', $data['email']);
              $this->db->bind(':address', $data['address']);
              $this->db->bind(':postcode', $data['postcode']);
              $this->db->bind(':city', $data['city']);
              $this->db->bind(':password', $data['password']);

              // Execute
              if($this->db->execute()){
                  return true;
              } else {
                  return false;
              }
          }

          // Sign in customer
          public function signin($email, $password){
            $this->db->query('SELECT * FROM customers WHERE email = :email');
            $this->db->bind(':email', $email);

            $row = $this->db->single();

            $hashed_password = $row->password;
            if(password_verify($password, $hashed_password)){
                return $row;
            } else {
                return false;
            }

          }
          
          // Find user by email
            public function findCustomerByEmail($email){
                $this->db->query('SELECT * FROM customers WHERE email = :email');
                 // Bind value
                $this->db->bind(':email', $email);
              
                $row = $this->db->single();
              
                // Check row
                if($this->db->rowCount() > 0){
                    return true;
                } else {
                    return false;
            }
          }
    }
           