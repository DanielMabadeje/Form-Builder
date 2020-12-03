<?php

/*
 * This is the Base Controller
 * Loads the Models and views
 *
 */
class ApiController
{
    //Load Model
    public function model($model)
    {
        //Requires Model FIle
        require_once '../app/models/' . $model . '.php';

        //Instantiate Model
        return new $model();
    }

    // load views
    public function view($view, $data = [])
    {
        # check for view file
        if (file_exists('../app/views/' . $view . '.php')) {
            require_once '../app/views/' . $view . '.php';
        } else {
            die('view does not exist');
        }
    }

    public function success($var)
    {
        http_response_code(200);
    }

    public function returnjson($data = null, $statusCode = null)
    {
        if (is_numeric($statusCode))
            http_response_code($statusCode);
        return  json_encode(['success' => ['code' => $statusCode, 'message' => $data]]);
    }
}
