<?php

function blankForm()
{
    return array(
        array(
            'id' => 'email', // if 'name' param is not given. Then by default 'id' will be considered as 'name'.
            'placeholder' => 'Email',
            'label' => 'Email',
            'name' => 'email',
            'type' => 'email'
        ),
        array(
            'id' => 'submit',
            'label' => 'submit',
            'type' => 'submit',
            'name' => 'submit'
        ),
    );
}

function contactForm()
{
}

function rsvpForm()
{
    return array(
        array(
            'id' => 'email', // if 'name' param is not given. Then by default 'id' will be considered as 'name'.
            'placeholder' => 'Email',
            'label' => 'Email',
            'name' => 'email',
            'type' => 'email'
        ),
        array(
            'id' => 'firstname', // if 'name' param is not given. Then by default 'id' will be considered as 'name'.
            'placeholder' => 'FirstName..',
            'label' => 'FirstName',
            'name' => 'firstname',
            'type' => ''
        ),
        array(
            'id' => 'lastname', // if 'name' param is not given. Then by default 'id' will be considered as 'name'.
            'placeholder' => 'LastName..',
            'label' => 'LastName',
            'name' => 'lastname',
            'type' => ''
        ),
        array(
            'id' => 'submit',
            'label' => 'submit',
            'type' => 'submit',
            'name' => 'submit'
        ),
    );
}

function tshirtForm()
{
}


function donationForm()
{
    #coming soon 
}
