<?php

/*
 * This is the Base Controller
 * Loads the Models and views
 *
 */

class Mail
{
    private $sender;

    public function __construct()
    {
    }
    public function sendhtml($email, $subject, array $var, string $html)
    {
        $template = new Template;

        // $template->assign('', '');
        // foreach($var as $key=>$v){
        //     echo $v;
        // }
        foreach ($var as $key => $value) {
            $template->assign($key, $value);
        }
        $headers = "From: CSIU Team\r\n";
        $headers .= "MIME-Version:1.0\r\n";
        $headers .= "Content-Type:text/html; charset=ISO-8859-1\r\n";
        $email_to = $email;
        $subject = $subject;
        $message = $template->render($html);
        // var_dump($message);
        // die;
        // die($message);
        try {
            mail($email_to, $subject, $message, $headers);
            // echo 'email sent';
        } catch (\Throwable $e) {
            die($e);
        }
    }
    public function viewhtml(array $var, string $html)
    {
        $template = new Template;

        // $template->assign('', '');
        // foreach($var as $key=>$v){
        //     echo $v;
        // }
        foreach ($var as $key => $value) {
            $template->assign($key, $value);
        }
        // $template->assign([year])

        eval($template->render($html));
        // var_dump($message);
        // die;
        // die($message);
    }
}
