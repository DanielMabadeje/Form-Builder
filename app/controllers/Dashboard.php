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

        $data['form']=$dashboardData;
        // die(json_encode($dashboardData));
        

        $this->view('dashboard/index', $data);
    }


    public function payments()
    {
        # code...
    }


    public function forms($id=null)
    {

        $dashboardData=$this->formModel->getFormsByUser($_SESSION['user_id']);

        $data['form']=$dashboardData;
        $this->view('dashboard/forms', $data);
    }

    public function formcreate(){
        $this->view('dashboard/createform');
    }

    public function membership()
    {
        $data=[
            'membership_plan'=>$_SESSION['membership_plan'],
        ];

        $this->view('dashboard/membershipplan', $data);
    }

    public function tasks($id=null)
    {

        $data=[];
        $this->view('dashboard/comingsoon', $data);
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
