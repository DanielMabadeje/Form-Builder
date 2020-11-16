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
            $data['user_id']=$this->user;
            $data['title']='New Form';
            $data['description']='Description of your form';
            $data['form_options'] = array(

                array(
                    'id' => 'submit',
                    'type' => 'submit',
                    'name' => 'submit'
                ),
            );

            if ($this->formModel->add($data)) {
                redirect('/forms/edit/'.$data['uniqueId']);
            }
        } else {
            redirect('/');
        }
    }
    public function edit($var)
    {
        if ($var) {
            $view=$this->formModel->getForm($var);
            $this->view('forms/edit', $view);
        } else {
            # code...
        }
    }
    public function views($var = null)
    {
        # code...
    }

}