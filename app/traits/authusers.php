<?php
trait authuser
{
    public function user()
    {
        $secret_key = "YOUR_SECRET_KEY";
        $jwt = null;
        // $authHeader = $_SERVER['HTTP_AUTHORIZATION'];

        // $headers = apache_request_headers();
        $header = apache_request_headers();
        $headers = getallheaders();
        // foreach ($headers as $header) {
        //     $authHeader = $header['Authorization'];
        //     echo $header;
        // }
        // die('ghj');
        // var_dump($headers, $header);
        // die();
        // $authHeader = 'jjj';
        $authHeader = $headers['Authorization'];
        $arr = explode(" ", $authHeader);
        if (isset($arr[1])) {
            $jwt = $arr[1];
        } elseif (isset($arr[0])) {
            $jwt = $arr[0];
        }

        if ($jwt) {

            try {
                $decoded = \Firebase\JWT\JWT::decode($jwt, $secret_key, array('HS256'));

                // Access is granted. Add code of the operation here 
                // var_dump($decoded);
                // die();

                return array(
                    'status' => true,
                    "message" => "Access granted:",
                    "data" => $this->returnwithprofilepic($decoded->data)
                    // "error" => $e->getMessage()
                );
            } catch (\Exception $e) {

                http_response_code(401);
                return array(
                    'status' => false,
                    "message" => "Access denied.",
                    "error" => $e->getMessage()
                );
            }
        } else {

            // set response code
            http_response_code(401);

            // tell the user access denied
            return array('status' => false, "message" => "JWT is undefined");
        }
    }

    public function returnwithprofilepic($data)
    {
        if (is_array($data)) {
            $data['profile_picture'] = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/' . $data['profile_picture'];
            return $data;
        }
        $data->profile_picture = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/' . $data->profile_picture;
        return $data;
    }
}
