<?php


class Tasks extends Controller
{
    public function __construct()
    {
        $this->user = isLoggedIn();
    }
    public function add()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $data= $_POST;
        }else{
            $this->view('tasks/add');
        }
    }
}