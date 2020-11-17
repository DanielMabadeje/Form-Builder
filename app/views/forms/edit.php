<?php require APPROOT . '/views/inc/header.php'; ?>
<div style="text-align:center; margin-top:14%;">


<div class="card col-md-9">
    <div class="card-title" contenteditable="true">
        <h1><?= $data->form_name; ?></h1>
        <h5><?= $data->description; ?></h5>
    </div>

    <div class="card-body">
    
    <?php


$form_options=$data->form_array;
// var_dump(json_decode($form_options));
echo "<pre>";
 print_r($form_options); 
echo "</pre>";

die;

    // $this->form->rule('required', $data->required_fields)->message('Required: {field} cannot be empty');
    // $this->form->rule('email', 'email');
    // $this->form->rule('equals', 'confirm_email', 'email');
        echo $this->form->_form_open();
        echo $this->form->form_field_creation($form_options);
        echo $this->form->_form_close();
    ?>
    </div>
</div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>