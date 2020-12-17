<?php


class Forms extends Controller
{
    public $form;
    private $formerrors;
    private $formData;
    private $formId;
    private $answerId;


    public function __construct()
    {
        $this->form = new Sample_Form_Creator();
        $this->formModel = $this->model('Form');
        $this->user = isLoggedIn();
    }

    public function add($type = null)
    {
        if (isLoggedIn() && $this->user) {
            $data = [];
            $data['uniqueId'] = generateUniqueId();
            $data['user_id'] = $this->user;
            $data['title'] = 'New Form';
            $data['description'] = 'Description of your form';


            switch ($type) {
                case '':
                    $data['form_type'] = 'blank';
                    $data['form_options'] = blankForm();
                    break;
                case 'donation':
                    $data['form_type'] = $type;
                    $data['form_options'] = donationForm();
                    break;
                case 'contact':
                    $data['form_type'] = $type;
                    $data['form_options'] = contactForm();
                    break;
                case 'rsvp':
                    $data['form_type'] = $type;
                    $data['form_options'] = rsvpForm();
                    break;

                default:
                    $data['form_type'] = 'blank';
                    $data['form_options'] = blankForm();
                    break;
            }

            if ($this->formModel->add($data)) {
                redirect('/forms/edit/' . $data['uniqueId']);
            }
        } else {
            redirect('/');
        }
    }
    public function edit($var)
    {
        if ($var) {
            if ($data = $this->formModel->getForm($var)) {
                $this->view('forms/edit', $data);
            } else {
                die('404');
            }
            // var_dump($data);
            // die;

        } else {
            # code...
        }
    }
    public function views($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $answer_id = date('Y-m-d') . $this->generateRandomChars();
            $this->sanitizePost();
            $this->answerId = $answer_id;
            $this->formId = $id;
            $this->getQuestionIdByName();

            if ($data = $this->submitAnswer()) {
                $_SESSION[$id] = $id;
                redirect('/forms/views/' . $id);
            }
        } else {

            $data = $this->formModel->getForm($id);
            if (isset($_SESSION[$id])) {
                $this->view('forms/templates/alreadysubmitted', $data);
            } else {
                if ($data = $this->formModel->getForm($id)) {
                    // $this->view('forms/templates', $data);
                    switch ($data->form_type) {
                        case 'rsvp':
                            $this->view('forms/templates/rsvp', $data);
                            break;

                        default:
                            # code...
                            break;
                    }
                } else {
                    # code...
                }
            }
        }
    }

    public function resetResponse($id)
    {
        if (isset($_SESSION[$id])) {
            unset($_SESSION[$id]);
            redirect('/forms/views/' . $id);
        } else {
            redirect('/forms/views/' . $id);
        }
    }

    private function submitAnswer()
    {

        $data = $this->formData;

        foreach ($data as $key => $value) {
            try {
                $this->formModel->addAnswer($data[$key]);
            } catch (\Throwable $e) {
                echo $e;
            }
        }

        return true;
    }

    private function validateRequiredFields()
    {
        $data = $_POST;
        foreach ($data as $key => $value) {
        }
    }

    public function embed($id)
    {
        if ($data = $this->formModel->getForm($id)) {
            // $this->view('forms/templates', $data);
            switch ($data->form_type) {
                case 'rsvp':
                    $this->view('forms/embed', $data);
                    break;

                default:
                    # code...
                    break;
            }
        } else {
            # code...
        }
    }

    private function getQuestionIdByName($var = null)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            unset($_POST['submit']);
            $data = $_POST;
            $newData = [];
            $no = 0;
            foreach ($data as $key => $value) {


                $result = $this->formModel->getQuestionIdByName($this->formId, $key);
                $question_id = $result;
                // var_dump($question_id);
                // die;

                // $question_id=number_format($question_id);
                // $question_id=intval($question_id);
                // var_dump($question_id);
                // die;

                $newData[$no]['name'] = $key;
                $newData[$no]['form_id'] = $this->formId;
                $newData[$no]['question_id'] = $question_id;
                $newData[$no]['answer'] = $value;
                $newData[$no]['answer_id'] = $this->answerId;

                $no++;
            }

            $this->formData = $newData;

            // var_dump($this->formData);
            // die;
        } else {
            # code...
        }
    }

    public function responses($form_id, $view = null)
    {
        if ($this->validateIfFormExists($form_id)) {
            $data = $this->formModel->getForm($form_id);
            // var_dump($data);
            // die;
            if ($view == 'chart') {
                # code...
            } elseif ($view = 'table') {
                // var_dump($data);
                // die;

                // $data->responses = 'gdg';
                $responses = $this->formModel->getResponsesCount($form_id);

                $responses_array = [];

                // $index = 0;
                foreach ($responses as $key => $value) {
                    // echo $key;
                    // var_dump($responses[$key]);
                    $responses_array[$key] = $this->formModel->getResponses($responses[$key]->answer_id);

                    // $index++;
                }
                // $data->responses = $this->formModel->getAnswers($form_id);

                $data->responses = $responses_array;
                // var_dump($data->responses);
                // $data->responses = json_encode($data->responses);
                // die($data->responses);
                $this->view('forms/responsestable', $data);
            } else {
                $this->view('forms/responsestable', $data);
            }
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

    private function generateRandomChars()
    {
        $charset = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        return substr(str_shuffle($charset), 0, 8);
    }
}
