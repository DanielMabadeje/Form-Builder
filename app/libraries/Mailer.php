<?php
class Mailer
{
    public function __construct($mail)
    {
        require_once '../app/mails/http/' . $mail . '.php';
    }
}
