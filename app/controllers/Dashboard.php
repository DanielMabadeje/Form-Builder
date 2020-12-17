<?php

class Dashboard extends Controller
{
    public function __construct(){
        $this->userModel=$this->model('User');
    }


    public function forms($id=null)
    {
        # code...
    }
}
