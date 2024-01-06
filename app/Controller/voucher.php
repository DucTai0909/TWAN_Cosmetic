<?php
    class voucher extends DController{
        public function __construct()
        {
            parent::__construct();
            session_start();
        }
        public function index(){
            $this->VoucherPage();
        }
        public function VoucherPage(){
            return $this->load->view('VoucherPage');
        }
    }
?>