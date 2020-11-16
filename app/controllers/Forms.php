<?php


class Forms extends Controller
{
    private $form;


    public function __construct()
    {
        $this->form = new Sample_Form_Creator();
        $this->formModel=$this->model('Form');
        $this->user=isLoggedIn();
    }

    public function add($var = null)
    {
        if (isLoggedIn() && $this->user) {
            $uniqueId=generateUniqueId();
            $title='New Form';
            $description='Description of your form';
            $form_options = array(
                
                array(
                    'id' => 'submit',
                    'type' => 'submit',
                    'name' => 'submit'
                ),
            );
        } else {
            redirect('/');
        }
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