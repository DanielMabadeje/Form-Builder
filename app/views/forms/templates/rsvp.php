<?php require APPROOT . '/views/forms/inc/formheader.php'; ?>

<style>
    body {
        background: #fbfafafa;
    }

    .border-radius-none {
        border-radius: 0;
    }

    .border-none {
        border: none;
    }

    input[type=submit] {
        background-color: #343a40;
        color: white;
        width: 50%;
        border: none;
        padding: 2%;
        margin-top: 3%;
        align-self: center;
        margin-right: auto;
        margin-left: auto;
    }


    .field_container:focus,
    .field_container:active {
        border: 1px gray solid;
    }

    .field_container {
        margin-top: 5%;
    }


    .form-wrap {
        position: relative;
    }

    @media screen and(min-width: 768px) {
        .form-input {
            font-size: 15px;
            min-height: 60px;
            padding: 17px 0;
        }
    }

    .form-input {
        display: block;
        width: 100%;
        min-height: 50px;
        padding: 10px 0;
        font-size: 14px;
        font-weight: 400;
        line-height: 24px;
        letter-spacing: .1em;
        font-family: poppins, -apple-system, BlinkMacSystemFont, segoe ui, Roboto, helvetica neue, Arial, sans-serif;
        color: #151515;
        background-color: transparent;
        background-image: none;
        border-radius: 0;
        -webkit-appearance: none;
        transition: .3s ease-in-out;
        border: 1px solid #e1e1e1;
        border-width: 0 0 1px;
    }

    input,
    button,
    select,
    textarea {
        outline: none;
    }

    button,
    input {
        overflow: visible;
    }







    .dropbtn {
        /* background-color: #4CAF50;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none; */
        cursor: pointer;
    }

    /* Dropdown button on hover & focus */
    .dropbtn:hover,
    .dropbtn:focus {
        /* background-color: #3e8e41; */
        color: white;
    }

    /* The container <div> - needed to position the dropdown content */
    .dropdown {
        position: relative;
        display: inline-block;
    }

    /* Dropdown Content (Hidden by Default) */
    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    }

    /* Links inside the dropdown */
    .dropdown-content div {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    /* Change color of dropdown links on hover */
    .dropdown-content div:hover {
        background-color: #f1f1f1
    }

    /* Show the dropdown menu (use JS to add this class to the .dropdown-content container when the user clicks on the dropdown button) */
    .show {
        display: block;
    }

    input[type="radio"] {
        /* width: 1px; */
        background-color: initial;
        cursor: default;
        appearance: radio;
        box-sizing: border-box;
        /* margin: 3px 3px 0px 5px; */
        /* padding: 0; */
        min-height: 18px;
        border: initial;
    }
</style>


<div class="container" style="text-align:center; margin-top:10%;">


    <section class="col-md-12 d-md-flex">
        <div class="card border-radius-none border-none col-md-10 text-left p-3">
            <div class="card-title pt-4" style="border-top:4px solid #5631af;">
                <h1 class="display-4"><?= $data->form_name; ?></h1>
                <br>
                <h5 class="col-md-7 pl-0"><?= $data->description; ?></h5>
            </div>

            <?php if ($data->allowing_responses == 0) : ?>
                <div>The Admin Is Not Currently Allowing Responses</div>
                        <?php elseif ($data->allowing_responses == 1) : ?>
                            <div class="card-body">

<!-- <div class="form-wrap">
    <input class="form-input form-control-has-validation" placeholder="Full Name" value="mabz" id="checkout-first-name-2" type="text" name="name" data-constraints="@Required"><span class="form-validation"></span><span class="form-validation"></span>
    <label class="form-label rd-input-label" for="checkout-first-name-2">Full Name</label>
</div> -->
<?php


// $form_options = $data->form_array;
$form_options = $data->form;
// echo '<pre>';
// var_dump($form_options);
// echo '</pre>';
// die;
// $form_options = json_decode($form_options);

foreach ($form_options as $key => $datas) {
    $form_options[$key] = (array)$datas;
    if ($form_options[$key]['type'] == 'submit') {
        // $form_options[$key]['type'] = 'form_hidden';
    }                    // $form_options[$key] = $datas;
}


// $this->form->rule('required', $data->required_fields)->message('Required: {field} cannot be empty');
$this->form->rule('email', 'email');
// $this->form->form_hidden('submit', 'submit');
// $this->form->rule('equals', 'confirm_email', 'email');
echo $this->form->_form_open();
echo $this->form->form_field_creation($form_options);

?>

<div class="field_container submit">
    <label class="form-label rd-input-label" contenteditable="true" for="submit"></label>
    <input type="submit" name="submit" value="Submit" placeholder="">
</div>
<?php
echo $this->form->_form_close();
?>
</div>
                        <?php else : ?>
                            <div>The Admin Is Not Currently Allowing Responses</div>
                        <?php endif; ?>

          
        </div>
    </section>
</div>

<script defer>
    var labels=document.getElementsByClassName('form-label')
    for (let index = 0; index < labels.length; index++) {
        labels[index].contentEditable=false;
        // labels[index].isContentEditable=false;
    }
</script>

<?php require APPROOT . '/views/inc/footer.php'; ?>