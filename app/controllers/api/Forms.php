<?php


class Forms extends ApiController
{
    private $form;


    public function __construct()
    {
        $this->form = new Sample_Form_Creator();
        $this->formModel = $this->model('Form');

        header("access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        header("Content-Type: application/json; charset=UTF-8");
    }

    public function edit($var = null)
    {
        # code...
    }

    public function getform($api, $param)
    {
        if ($param) {
            $data = $this->formModel->getForm($param);
            $this->success($data);
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
            'allow' => $this->returntrueorfalse($allow)
        ];
        // var_dump($data);
        // die;
        if ($data = $this->formModel->editAllowingResponses($data)) {
            die($this->success($data));
            die;
        } else {
            $this->fail();
        }
    }


    public function updateForm()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            # code...
        } else {
            $this->fail($_SERVER['REQUEST_METHOD'] . ' given instead of POST', 405);
        }
    }

    private function returntrueorfalse($data)
    {
        if ($data == 'false') {
            return false;
        } elseif ($data == 'true') {
            return true;
        } else {
            return false;
        }
    }
}
