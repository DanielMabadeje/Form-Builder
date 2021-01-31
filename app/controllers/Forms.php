<?php


class Forms extends Controller
{
    public $form;
    private $formerrors;
    private $formData;
    private $formId;
    private $answerId;
    private $mailData;

    private $notLoggedQuestions;


    private $formandquestions;


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
            // redirect('/');
            $uniqueId = generateUniqueId();

            $this->notLoggedQuestions = createNotLoggedInform();
            // $data = $this->notLoggedQuestions;


            $data = [];
            $data['uniqueId'] = $uniqueId;
            $data['user_id'] = "1";
            $data['title'] = "New Form";
            $data['description'] = "Your Description";
            $data['responses'] = "0";
            $data['paginated'] = "false";
            $data['paginated_after'] = null;
            $data['allowing_responses'] = "1";
            $data['created_at'] = date('y-m-d');
            $data['updated_at'] = date('y-m-d');
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

            // var_dump($data);
            // die();

            // $_SESSION[$uniqueId] = $data;
            $sessionData = [
                'uniqueId' => $uniqueId,
                'name' => $data['title']
            ];
            $_SESSION[$uniqueId] = $sessionData;
            $this->formModel->add($data);

            redirect('forms/edit/' . $uniqueId . '/?session_id=' . $uniqueId);
        }
    }

    // public function FunctionName(Type $var = null)
    // {
    //     # code...
    // }
    public function edit($var)
    {
        if (isset($_GET['session_id'])) {

            // $data = $_SESSION[$_GET['session_id']];
            $data = $this->formModel->getForm($var);
            $this->formandquestions = $data;
            $this->checkIfQuestionisDropdown();
            $this->checkIfQuestionisOption();
            $this->view('forms/editforNotLogged', $this->formandquestions);
        } else {
            if ($var) {
                if ($data = $this->formModel->getForm($var)) {
                    $this->formandquestions = $data;
                    $this->checkIfQuestionisDropdown();
                    $this->checkIfQuestionisOption();
                    $this->view('forms/edit', $this->formandquestions);
                } else {
                    die('404');
                }
            } else {
            }
        }
    }
    public function views($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $answer_id = date('Y-m-d') . $this->generateRandomChars();
            $this->sanitizePost();

            // var_dump($_POST);
            // die;
            $this->answerId = $answer_id;
            $this->formId = $id;
            $this->getQuestionIdByName();


            if ($data = $this->submitAnswer()) {
                $this->sendResponseViaEmail();
                $_SESSION[$id] = $id;
                redirect('/forms/views/' . $id);
            }
        } else {

            $data = $this->formModel->getForm($id);
            if (isset($_SESSION[$id])) {
                $this->view('forms/templates/alreadysubmitted', $data);
            } else {
                if ($data = $this->formModel->getForm($id)) {

                    $this->formandquestions = $data;
                    $this->checkIfQuestionisDropdown();
                    $this->checkIfQuestionisOption();


                    // die(json_encode($this->formandquestions));
                    // $this->view('forms/templates', $data);

                    switch ($this->formandquestions->form_type) {
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
    private function checkIfQuestionisDropdown()
    {

        foreach ($this->formandquestions->form as $key => $single_data) {
            if ($single_data->type == 'dropdown') {
                $single_data->options = $this->formModel->getQuestionDropdownOption($single_data->form_id, $single_data->question_id);
                $single_data->value = '0';
            }
        }
    }

    private function checkIfQuestionisOption()
    {

        foreach ($this->formandquestions->form as $key => $single_data) {
            if ($single_data->type == 'singleoption' || $single_data->type == 'radio') {
                $single_data->type = 'radio';
                // $single_data->options = $this->formModel->getQuestionOption($single_data->form_id, $single_data->question_id);
                $options = $this->formModel->getQuestionOption($single_data->form_id, $single_data->question_id);
                $single_data->options = [];
                foreach ($options as $key => $value) {
                    $single_data->options[$key] = [
                        'id' => $value->id,
                        'label' => $value->label,
                        'value' => $value->value
                    ];
                }
            } elseif ($single_data->type == 'multichoice' || $single_data->type == 'checkbox') {
                $single_data->type = 'checkbox';
                // $single_data->options = $this->formModel->getQuestionOption($single_data->form_id, $single_data->question_id);
                $options = $this->formModel->getQuestionOption($single_data->form_id, $single_data->question_id);
                foreach ($options as $key => $value) {
                    $single_data->options[$key] = [
                        'id' => $value->id,
                        'label' => $value->label,
                        'value' => $value->value
                    ];
                }
            } else {
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


    private function sendResponseViaEmail()
    {

        foreach ($this->formData as $key => $value) {

            $label = $this->formModel->getLabelFromQuestionId($value['form_id'], $value['name']);

            $mail_data[$label] = $value['answer'];
        }

        $this->mailData = $mail_data;


        if (isset($_POST['email'])) {
            sendmail('sendcopyofresponse', $this->mailData, $_SESSION['email']);
        }
    }

    private function submitAnswer()
    {

        $data = $this->formData;

        var_dump($data);
        die;

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


            if ($view == 'chart') {

                // $responses = $this->formModel->getResponsesCount($form_id);
                $questions = $this->formModel->getQuestionbyType($form_id);

                $responses_array = [];


                // foreach ($responses as $key => $value) {

                //     $responses_array[$key] = $this->formModel->getResponses($responses[$key]->answer_id);
                // }
                // $data->responses = $responses_array;
                die(json_encode($questions));
                $this->view('forms/responseschart', $data);
            } elseif ($view = 'table') {

                $responses = $this->formModel->getResponsesCount($form_id);

                $responses_array = [];


                foreach ($responses as $key => $value) {

                    $responses_array[$key] = $this->formModel->getResponses($responses[$key]->answer_id);
                }
                $data->responses = $responses_array;
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

    public function checkmembershipPlan($user)
    {
        # code...
    }
}
