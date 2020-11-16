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
            $data=[];
            $data['uniqueId']=generateUniqueId();
            $data['title']='New Form';
            $data['description']='Description of your form';
            $data['form_options'] = array(

                array(
                    'id' => 'submit',
                    'type' => 'submit',
                    'name' => 'submit'
                ),
            );

            $this->formModel->add($data);
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