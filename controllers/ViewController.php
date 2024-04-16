<?php
class ViewController{

    //display index home
    public function index(){
        $msg = json_encode("Welcome to the home page");
        echo $msg;
    }
}