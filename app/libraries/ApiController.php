<?php

/*
 * This is the Base Controller
 * Loads the Models and views
 *
 */
class ApiController
{

    public function __construct()
    {
        header("access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        header("Content-Type: application/json; charset=UTF-8");
    }

    public function sanitizePost()
    {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    }
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

    public function success($data)
    {
        $statusCode = 200;
        http_response_code($statusCode);
        die(json_encode(['success' => ['code' => $statusCode, 'message' => $data]]));
    }

    public function returnjson($data = null, $statusCode = null)
    {
        if (is_numeric($statusCode))
            http_response_code($statusCode);
        die(json_encode(['success' => ['code' => $statusCode, 'message' => $data]]));
    }

    public function unauthorizedresponse($data)
    {
        $statusCode = 401;
        http_response_code($statusCode);
        die(json_encode(['success' => ['code' => $statusCode, 'message' => $data]]));
    }

    public function fail($data = 'Internal Server Error', $statusCode = 500)
    {
        http_response_code($statusCode);
        die(json_encode(['success' => ['code' => $statusCode, 'message' => $data]]));
    }
}
