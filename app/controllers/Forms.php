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
            $data = $this->formModel->getForm($var);
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
