<?php


class Tasks extends Controller
{
    public function __construct()
    {
        $this->user = isLoggedIn();
    }
}