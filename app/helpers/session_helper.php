<?php
session_start();
// flash message helper
// Example - flash('register_success', 'you are registered');
//Display in view -<?= flash(register_success'); 
function flash($name = '', $message = '', $class = 'alert alert-success')
{
    if (!empty($name)) {
        if (!empty($message) && empty($_SESSION[$name])) {
            // $_SESSION[$name] = $name;
            if (!empty($_SESSION[$name])) {
                unset($_SESSION[$name]);
            }



            if (!empty($_SESSION[$name . '_class'])) {
                unset($_SESSION[$name . '_class']);
            }

            $_SESSION[$name] = $message;
            $_SESSION[$name . '_class'] = $class;
        } elseif (empty($message) && !empty($_SESSION[$name])) {
            $class = !empty($_SESSION[$name . '_class']) ? $_SESSION[$name . '_class'] : '';
            echo '<div class="' . $class . '" id="msg-flash">' . $_SESSION[$name] . '</div>';
            unset($_SESSION[$name]);
            unset($_SESSION[$name . '_class']);
        }
    }
}
function isLoggedIn()
{
    if (isset($_SESSION['user_id'])) {
        return true;
    } else {
        return false;
    }
}

 function isadmin()
{
    if (isset($_SESSION['user_id'])) {
        if ($_SESSION['usertype']=='admin') {
            return true;
        }else {
            return false;
        }
        
    } else {
        return false;
    }
}