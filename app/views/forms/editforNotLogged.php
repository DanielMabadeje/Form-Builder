<?php require APPROOT . '/views/inc/header.php'; ?>


<div class="col-12 p-md-3 p-sm-0">
    <div class="container">
        <div class="col-md-7 mr-auto">
            <a href=""><span class="nav-item"><i class="fa fa-chevron-right"></i>Questions</span></a>
        </div>
        <div class="ml-auto text-right col mt-0">
            <a href="<?= URLROOT; ?>/users/register/?form_id=<?= $data->form_id ?>" class="btn btn-primary ">Publish</a>
        </div>
    </div>
</div>
<link rel="stylesheet" href="<?= URLROOT; ?>/css/form/edit.css">
<link rel="stylesheet" href="<?= URLROOT; ?>/css/modal.css">

<link rel="stylesheet" href="<?= URLROOT; ?>/css/font-awesome.min.css">
<div class="container" style="text-align:center; margin-top:3%;">


    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <div class="col-12 text-right">
                <span class="close">x</span>
            </div>

            <div class="col-md-7 text-left">
                <h2>Edit Current Input</h2>
            </div>
            <div class="form container pt-4 text-left">
                <!-- <form action="false"> -->
                <div class="row">
                    <div class="form_container col-md-6">
                        <label for="Label">Label</label><br>
                        <input type="text" class="input-group-text col-12 text-left" placeholder="Label" name="label">
                    </div>

                    <div class="form_container col-md-6">
                        <label for="Label" class="col-12 pl-0 ml-0">Placeholder</label>
                        <input type="text" class="input-group-text col-12 text-left" placeholder="What Placeholder do you want your input to have" name="placeholder">
                    </div>
                </div>

                <div class="row pt-4">
                    <div class="form_container col-md-6">
                        <label for="Label">Required</label><br>
                        <select name="required" class="input-group-text col-12 text-left">
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                    <div class="form_container col-md-6">
                        <label for="Label" class="col-12 pl-0 ml-0">Type</label>
                        <select name="inputType" class="input-group-text col-12 text-left">
                            <option value="email">Email</option>
                            <option value="shortanswer">ShortAnswer</option>
                            <option value="longanswer">Long Answer</option>
                            <option value="dropdown">Dropdown</option>
                            <option value="date">Date</option>
                            <option value="multichoice">Multi Choice</option>
                            <option value="singlechoice">Single Option</option>
                        </select>
                    </div>
                </div>


                <div class="d-none pt-4" id="outeroptionsadded">
                    <h2>Options</h2>

                    <div class="row text-left d-none" id="optionsadded">

                    </div>
                    <button class="p-3 btn addoptionicon"><i class="fa fa-plus "></i></button>
                </div>
                <div class="form_container col-md-6 pt-4 pl-0 ml-0">
                    <!-- <input type="submit" class="btn btn-secondary col-12 text-left" value="Update"> -->
                    <button class="btn btn-secondary" id="updateBtn">Update</button>
                </div>
                <!-- </form> -->
            </div>
            <!-- <p>Some text in the Modal..</p> -->
        </div>

    </div>


    <section class="col-md-12 d-md-flex">
        <div class="card border-radius-none border-none col-md-10 text-left p-md-3">
            <div class="card-title">
                <div class="row">
                    <div class="col-12  pt-5" style="border-top:4px solid #5631af;">
                        <h1 contenteditable="true" class="display-4"><?= $data->form_name; ?></h1>
                    </div>

                </div>

                <br>
                <h5 contenteditable="true" class="font-weight-normal description_h5 col-md-7 pl-0"><?= $data->description; ?></h5>
            </div>

            <div class="card-body">
                <?php

                $form_options = $data->form;
                foreach ($form_options as $key => $datas) {
                    $form_options[$key] = (array)$datas;
                    if ($form_options[$key]['type'] == 'submit') {
                        // $form_options[$key]['type'] = 'form_hidden';
                    }
                }


                // $this->form->rule('required', $data->required_fields)->message('Required: {field} cannot be empty');
                $this->form->rule('email', 'email');
                // $this->form->rule('equals', 'confirm_email', 'email');
                echo $this->form->_form_open();
                echo $this->form->form_field_creation($form_options);

                ?>

                <!-- <div class=" submit">
                    <label class="form-label rd-input-label" contenteditable="true" for="submit"></label>
                    <input type="submit" name="submit" value="Submit" placeholder="">
                </div> -->
                <?php
                echo $this->form->_form_close();
                ?>
            </div>
        </div>

        <div class="col-md-2 height ml-3 border-radius-none border-none p-3 ">
            <div class="text-right d-flex d-md-block bg-whiite">
                <!-- <button class="btn btn-secondary border-radius-none"> <i class="fa fa-plus"></i> Add</button> -->
                <div class="dropdown p-2 col-sm-2 d-block">
                    <button onclick="myFunction()" class="dropbtn btn border-radius-none"> <i class="fa fa-plus"></i></button>
                    <div id="myDropdown" class="dropdown-content text-left">
                        <div onclick="addItemToForm('email')">Email</div>
                        <div onclick="addItemToForm('shortanswer')">Short Answer</div>
                        <div onclick="addItemToForm('longanswer')">TextArea</div>
                        <div onclick="addItemToForm('dropdown')">Dropdown</div>
                        <div onclick="addItemToForm('date')">Date</div>
                        <div onclick="addItemToForm('singleoption')">Single Option</div>
                        <div onclick="addItemToForm('multichoice')">MultiChoice Answer</div>


                    </div>
                </div>
                <div class="p-2 col-sm-2">
                    <button class="dropbtn btn  border-radius-none"> <i class="fa fa-camera"></i></button>
                </div>

                <div class="p-2 col-sm-2">
                    <button class="dropbtn btn  border-radius-none"> <i class="fa fa-video-camera"></i></button>
                </div>

                <div class="p-2 col-sm-2">
                    <button class="dropbtn btn  border-radius-none"> <i class="fa fa-credit-card"></i></button>
                </div>

            </div>
        </div>
    </section>
</div>

<script>
    var formarray = <?php echo json_encode($data); ?>
</script>

<script src="<?= URLROOT; ?>/js/jquery.js"></script>
<!-- <script src="<?= URLROOT; ?>js/form/editForNotLogged.js"></script> -->
<script src="<?= URLROOT; ?>js/form/edit.js"></script>
<?php require APPROOT . '/views/inc/footer.php'; ?>