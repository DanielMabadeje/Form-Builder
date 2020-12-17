<?php

class welcomemail extends Mail
{
    private $name;
    private $password;
    private $email;
    public function __construct($password, $func = null)
    {
        $this->name = $_SESSION['user_name'];
        $this->email = $_SESSION['email'];
        $this->password = $password;

        // if ($func == 'view') {
        //     $this->view();
        // } elseif ($func == 'send') {
        //     $this->send();
        // }
    }
    public function view()
    {
        $data = [
            'name' => $this->name,
            'password' => $this->password,
            'email' => $this->email
        ];
        $this->viewhtml($data, 'welcome.mail');
    }
    public function send()
    {
        $data = [
            'name' => $this->name,
            'password' => $this->password,
            'email' => $this->email
        ];
        $this->sendhtml($data, 'welcome.mail');
    }
}
