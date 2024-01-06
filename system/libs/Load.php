<?php
class Load{
    public function __construct(){
    }
    public function view($filename, $data=NULL, $data2=NULL, $data3=NULL, $data4=NULL){    
        require_once './app/Views/'.$filename.'.php';
       
    }
    public function model($filename){
        require_once './app/Models/'.$filename.'.php';
        return new $filename();
    }
}
?>