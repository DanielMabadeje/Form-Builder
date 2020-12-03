<?php


class Forms extends Controller
{
    private $form;


    public function __construct()
    {
        $this->form = new Sample_Form_Creator();
        $this->formModel = $this->model('Form');
    }

    public function edit($var = null)
    {
        # code...
    }

    public function getform($api, $param)
    {
        if ($param) {
            $data = $this->formModel->getForm($param);
            // $data=json_encode($data);
            // print_r($data);
            // die;
        }
    }

    public function addQuestion($var = null)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            # code...
        }
    }

    public function editAllowResponse($api, $id, $allow)
    {
        $data = [
            'form_id' => $id,
            'allow' => $allow
        ];
        // var_dump($data);
        // die;
        if ($this->formModel->editAllowingResponses($data)) {
            echo 'yes';
        } else {
            echo 'no';
        }
    }
}
