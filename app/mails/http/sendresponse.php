<?php

class sendresponse extends Mail
{
    private $name;
    private $password;
    private $email;
    private $url;
    private $courier;
    public function __construct($data = null)
    {
        $this->name = $data['name'];
        $this->email = $data['email'];
        $this->password = $data['password'];
        $this->url = $data['url'];
        $this->courier = $data['courier'];

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
            'email' => $this->email,
            'courier_name' => $this->courier,
            'password' => $this->password,
            'url' => $this->url,
            'year' => date('Y')
        ];
        $this->viewhtml($data, 'adddriver.mail');
    }
    public function send()
    {
        $data = [
            'name' => $this->name,
            'email' => $this->email,
            'courier_name' => $this->courier,
            'password' => $this->password,
            'url' => $this->url,
            'date' => date('Y')
        ];
        $this->sendhtml($data, 'adddriver.mail');
    }
}
