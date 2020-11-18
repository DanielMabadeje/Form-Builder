<?php


class Forms extends Controller
{
    private $form;


    public function __construct()
    {
        $this->form = new Sample_Form_Creator();
    }

    public function edit($var = null)
    {
        # code...
    }

    public function getform($api, $param)
    {
        if ($param) {
            $data=$this->formModel->getForm($param);
        }
    }
}