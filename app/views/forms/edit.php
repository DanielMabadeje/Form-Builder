<?php require APPROOT . '/views/inc/header.php'; ?>
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



    /* The switch - the box around the slider */
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

/* Hide default HTML checkbox */
.switch input {display:none;}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>

<?php
// var_dump($data);

// die;
?>
<div class="container" style="text-align:center; margin-top:10%;">


    <section class="col-md-12 d-md-flex">
        <div class="card border-radius-none border-none col-md-10 text-left p-3">
            <div class="card-title">
                <h1 contenteditable="true"><?= $data->form_name; ?> 
                    
                </h1> 
                <div class="row">
                <div class="col-8"></div>
                <div class="col-4">
                <label class="switch ml-auto">
                        <input type="checkbox">
                        <div class="slider round"></div>
                    </label></div>
                </div>

                <br>
                <h5 contenteditable="true"><?= $data->description; ?></h5>
            </div>

            <div class="card-body">
                <!-- <div class="form-wrap">
                    <input class="form-input form-control-has-validation" placeholder="Full Name" value="mabz" id="checkout-first-name-2" type="text" name="name" data-constraints="@Required"><span class="form-validation"></span><span class="form-validation"></span>
                    <label class="form-label rd-input-label" for="checkout-first-name-2">Full Name</label>
                </div> -->
                <?php


                // $form_options = $data->form_array;
                $form_options = $data->form;
                // $form_options = json_decode($form_options);

                foreach ($form_options as $key => $datas) {
                    $form_options[$key] = (array)$datas;
                }


                $this->form->rule('required', $data->required_fields)->message('Required: {field} cannot be empty');
                $this->form->rule('email', 'email');
                // $this->form->rule('equals', 'confirm_email', 'email');
                echo $this->form->_form_open();
                echo $this->form->form_field_creation($form_options);
                echo $this->form->_form_close();
                ?>
            </div>
        </div>

        <div class="col-md-2 height ml-3 border-radius-none border-none p-3">
            <div class="text-right">
                <!-- <button class="btn btn-secondary border-radius-none"> <i class="fa fa-plus"></i> Add</button> -->
                <div class="dropdown">
                    <button onclick="myFunction()" class="dropbtn btn btn-secondary border-radius-none"> <i class="fa fa-plus"></i> Add</button>
                    <div id="myDropdown" class="dropdown-content text-left">
                        <div onclick="addItemToForm('email')">Email</div>
                        <div onclick="addItemToForm('shortanswer')">Short Answer</div>
                        <div onclick="addItemToForm('longanswer')">TextArea</div>
                        <div onclick="addItemToForm('dropdown')">Dropdown</div>
                        <div onclick="addItemToForm('date')">Date</div>
                        <div onclick="addItemToForm('singleoption')">Single Option</div>
                        <div>MultiChoice Answer</div>
                        <div>File</div>
                        <!-- input -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    var formarray = <?php echo json_encode($data); ?>
</script>
<script src="<?= URLROOT; ?>/js/form/edit.js"></script>
<?php require APPROOT . '/views/inc/footer.php'; ?>