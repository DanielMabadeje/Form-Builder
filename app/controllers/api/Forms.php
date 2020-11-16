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
}