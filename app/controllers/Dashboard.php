<?php

class Dashboard extends Controller
{
    public function __construct(){
        $this->userModel=$this->model('User');
        $this->formModel=$this->model('Form');
    }

    public function index()
    {

        $dashboardData=$this->formModel->getFormsByUser($_SESSION['user_id']);

        die(json_encode($dashboardData));
        

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

    public function todo($id=null)
    {
        if (is_null($id)) {
            $this->view('dashboard/todo');
        } else {
            $this->view('dashboard/viewtodo');
        }
    }
}
