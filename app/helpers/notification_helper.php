<?php

/**
 * 
 */
// trait jj
// {
//     public function __construct(Type $var = null)
//     {
//         # code...
//     }
// }
// public $notification;

function getmodel($var = null)
{
    $controller = new Controller();
    return $controller->model('Notification');
}

function userorder($reference, $type)
{
    $notification = getmodel();
    switch ($type) {
        case 'neworder':
            $url = "/dashboard/track/" . $reference;
            $message = "Your order has" . $reference . " been sent";
            $user_id=$_SESSION['user_id'];
            // var_dump($name);
            // $data = [
            //     'message' => $name,
            //     'user_id' => $_SESSION['user_id'],
            //     'url' => $url
            // ];
            $notification->user($user_id, $message, $url);
            break;

        case 'delivered':
            $message = 'Order has been delivered';
            $url = '';
            // $notification->user($data);
            break;

        default:
            # code...
            break;
    }
}
function vendororder($vendor_id, $reference, $type)
{
    $notification = getmodel();
    switch ($type) {
        case 'neworder':
            $url = "vendors/dashboard/reference/" . $reference;
            $name = strval($_SESSION['user_name'] . " sent a new order");
            // var_dump($name);
            $data = [
                'message' => $name,
                'vendor_id' => $vendor_id,
                'url' => $url
            ];
            $notification->vendor($data);
            break;

        case 'delivered':
            $message = 'Order has been delivered';
            $url = '';
            $notification->vendor($vendor_id, $message, $url);
            break;

        default:
            # code...
            break;
    }
}

function courierorder($vendor_id, $reference, $type)
{
    $notification = getmodel();
    switch ($type) {
        case 'neworder':
            $url = "vendors/dashboard/reference/" . $reference;
            $name = strval($_SESSION['user_name'] . " sent a new order");
            // var_dump($name);
            $data = [
                'message' => $name,
                'vendor_id' => $vendor_id,
                'url' => $url
            ];
            $notification->vendor($data);
            break;

        case 'delivered':
            $message = 'Order has been delivered';
            $url = '';
            $notification->vendor($vendor_id, $message, $url);
            break;

        default:
            # code...
            break;
    }
    function firebase($title, $body)
    {
        $server_key = "";
        $server_key = "";
    }
}
