<?php

function blankForm(){
    return array(
        array(
            'id' => 'email', // if 'name' param is not given. Then by default 'id' will be considered as 'name'.
            'placeholder' => 'Email',
            'label' => 'Email',
            'name'=>'email',
            'type'=>'email'
        ),
        array(
            'id' => 'submit',
            'label' => 'submit',
            'type' => 'submit',
            'name' => 'submit'
        ),
    );
}

function contactForm(){}

function rsvpForm(){}

function tshirtForm(){}


function donationForm(){
    #coming soon
}