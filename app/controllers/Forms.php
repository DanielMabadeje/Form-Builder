<?php


class Forms extends Controller
{
    private $form;


    public function __construct()
    {
        $this->form = new Sample_Form_Creator();
        $this->formModel=$this->model('Form');
    }

    public function add($var = null)
    {
        $uniqueId=generateUniqueId();
    }
    public function edit($var)
    {
        # code...
    }
    public function views($var = null)
    {
        # code...
    }

}