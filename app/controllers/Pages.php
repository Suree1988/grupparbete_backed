<?php
  class Pages extends Controller{
    public function __construct(){
     
    }

    // Load Homepage
    public function index(){
      //Set Data
      $data = [
        'title' => 'Threeboxes Bookshop Online'
      ];

      // Load homepage/index view
      $this->view('pages/index', $data);
    }

    public function contact(){
      //Set Data
      $data = [
        
      ];

      // Load about view
      $this->view('pages/contact', $data);
    }
  }