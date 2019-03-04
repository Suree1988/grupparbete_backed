<?php
    class Orders extends Controller {
        public function __construct(){
            if(!isSignedin()){
                redirect('customers/signin');
            }
        }

        public function index(){
            $data = [];

            $this->view('orders/index', $data);
        }
    }