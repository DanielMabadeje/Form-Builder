<?php


class Forms extends Controller
{
    public $form;


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
            $data['form_options'] = 
            array(
                array(
                    'id' => 'first_name', // if 'name' param is not given. Then by default 'id' will be considered as 'name'.
                    'placeholder' => 'First Name',
                    'label' => 'First Name',
                    'name'=>'first_name',
                    'type'=>null
                ),
                array(
                    'id' => 'submit',
                    'type' => 'submit',
                    'name' => 'submit'
                ),
            );
            // [
            //     [
            //         'id'=>'first_name',
            //         'placholder'=>'First Name',
            //         'label'=>'First Name',
            //     ],
            //     [
            //         'id'=>'submit',
            //         'type'=>'submit',
            //         'name'=>'submit'
            //     ]
            // ];

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
            $data=$this->formModel->getForm($var);
            // var_dump($data);
            // die;
            $this->view('forms/edit', $data);
        } else {
            # code...
        }
    }
    public function views($var = null)
    {
        # code...
    }

}