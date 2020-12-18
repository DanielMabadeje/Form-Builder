<?php
function  sendwelcomemail($password)
{
    new Mailer('welcomemail');
    $welcome = new welcomemail($password);
    $welcome->send();
}

function sendmail($class, $data, $email)
{
    new Mailer($class);
    $welcome = new $class($data);
    $welcome->send($email);
}


function viewMail($class, $data)
{
    new Mailer($class);
    $welcome = new $class($data);
    $welcome->view();
}
