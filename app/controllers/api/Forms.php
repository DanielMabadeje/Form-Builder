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

    public function editQuestion()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->sanitizePost();
            $data = $_POST;
            if ($this->formModel->editQuestion($data)) {
                $this->success('Question Edited Successfully');
            } else {
                $this->fail('Something Went Wrong');
            }
        } else {
            $this->fail('Its not a POST Request', 405);
        }
    }

    public function delete($api, $form_id, $question_id)
    {
        if ($this->validateIfFormExists($form_id)) {
            if ($this->validateIfQuestionExists($form_id, $question_id)) {
                try {
                    $this->formModel->deleteQuestion($form_id, $question_id);
                    $this->success('Question Deleted Successfully');
                } catch (\Throwable $e) {
                    $this->fail($e);
                }
            } else {
                $this->fail('Question does not exist');
            }
        } else {
            $this->fail('Form does not exist');
        }
    }


    public function deleteOption($api, $form_id, $question_id, $id)
    {
        if ($this->validateIfFormExists($form_id)) {
            if ($this->validateIfQuestionExists($form_id, $question_id)) {
                if ($this->formModel->deleteQuestionOption($id, $form_id, $question_id)) {
                    $this->success('Deleted Successfully');
                } else {
                    $this->fail('Unable to delete');
                }
            } else {
                $this->fail('Question does not exist');
            }
        } else {
            $this->fail('Form does not exist');
        }
    }

    private function validateIfFormExists($form_id)
    {
        if ($this->formModel->getForm($form_id)) {
            return true;
        } else {
            return false;
        }
    }

    private function validateIfQuestionExists($form_id, $question_id)
    {
        if ($this->formModel->getQuestion($form_id, $question_id)) {
            return true;
        } else {
            return false;
        }
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
            // var_dump($_POST);
            $this->sanitizePost();

            // if (condition) {
            //     # code...
            // } else {
            //     # code...
            // }
            try {
                $result = $this->formModel->addQuestion($_POST);
                die($this->success($result));
            } catch (\Throwable $e) {
                die($this->fail($e));
            }
            // die;
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
            $this->sanitizePost();
            if ($data = $this->formModel->updateForm($_POST)) {
                $this->success($data);
            } else {
                $this->fail();
            };
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

    public function addOption()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->sanitizePost();
            // var_dump($_POST);
            $data = [];
            $data['form_id'] = $_POST['form_id'];
            $data['question_id'] = $_POST['question_id'];
            $data['type'] = $_POST['type'];
            $data['option'] = $_POST['option'];

            if ($result = $this->formModel->addQuestionOption($data)) {
                $this->success($result);
            } else {
                $this->fail();
            }
        } else {
            $this->fail($_SERVER['REQUEST_METHOD'] . ' given instead of POST', 405);
        }
    }
    public function editOption($api, $form_id, $question_id, $id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->sanitizePost();
            // var_dump($_POST);
            $data = [];
            $data['form_id'] = $form_id;
            $data['question_id'] = $question_id;
            $data['id'] = $id;
            $data['value'] = $_POST['value'];


            // var_dump($data);
            // die;
            if ($result = $this->formModel->updateQuestionOption($data)) {
                $this->success($result);
            } else {
                $this->fail();
            }
        } else {
            $this->fail($_SERVER['REQUEST_METHOD'] . ' given instead of POST', 405);
        }
    }
}
