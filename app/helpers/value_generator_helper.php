<?php

function generateUniqueId($value=null){
    if ($value ==null) {
        return uniqid();
    } else {
        return uniqid().$value;
    }
}