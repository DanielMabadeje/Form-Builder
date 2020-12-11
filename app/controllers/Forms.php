<?php


class Forms extends Controller
{
    public $form;


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
            # code...
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

    public function responses($form_id)
    {
        # code...
    }
}
