<?php

class Dashboard extends Controller
{
    public function __construct(){
        $this->userModel=$this->model('User');
    }

    public function index()
    {
        # code...
    }


    public function forms($id=null)
    {
        # code...
    }


    public function membership()
    {
        echo $_SESSION['membership_plan'];
    }
}
