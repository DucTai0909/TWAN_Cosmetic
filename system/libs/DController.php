<?php
    class DController{
        protected $load = array();
        public function __construct()
        {
            //session_start();
            $this->load = new Load();
        }
    }
?>