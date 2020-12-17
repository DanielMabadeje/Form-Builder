<?php

class sendresponse extends Mail
{
    // private $name;
    // private $password;
    // private $email;
    // private $url;
    // private $courier;

    private $key = [];
    public function __construct($data = [
        "id" => "214",
        "answer_id" => "2020-12-16sCnEhDrL",
        "form_id" => "5fcfece717a24",
        "question_id" => "142",
        "answer" => "mabadejedaniel1@gmail.com",
        "created_at" => "2020-12-15 17:13:30",
        "updated_at" => "2020-12-15 17:13:30",
    ])
    {
        $index = 0;
        foreach ($data as $key => $value) {
            $this->key[$index] = $key;
            $this->$key = $value;
            $index++;
        }
    }
    public function view()
    {
        foreach ($this->key as $key) {
            $data[$key] = $this->$key;
        }
        $data['year'] = date('Y');

        // var_dump($data);
        // die;
        $this->viewhtml($data, 'sendresponse.mail');
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
