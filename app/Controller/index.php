<?php
    class index extends DController{
        public $data =array();
        public function __construct()
        {
            parent::__construct();
        }
        public function index(){
            $this->homepage();
        }
        public function homepage(){
            //$this->load->model('home');
            $home1model =$this->load->model('homeModel');
            //$data =$home1model->category();
            
            $this->load->view('home');
        }
        public function notFound(){
            $this->load->view('404');
        }
    }
?>