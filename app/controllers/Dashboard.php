<?php

class Dashboard extends Controller
{
    public function __construct(){
        $this->userModel=$this->model('User');
    }

    public function index()
    {
        $this->view('dashboard/index');
    }


    public function payments()
    {
        # code...
    }


    public function forms($id=null)
    {
        $this->view('dashboard/forms');
    }

    public function formcreate(){
        $this->view('dashboard/createform');
    }

    public function membership()
    {
        echo $_SESSION['membership_plan'];
    }

    public function tasks($id=null)
    {
        # code...
    }
}
