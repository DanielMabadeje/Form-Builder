<?php require APPROOT . '/views/inc/header.php'; ?>
<link rel="stylesheet" href="<?= URLROOT; ?>/css/form/edit.css">
<div class="container" style="text-align:center; margin-top:10%;">


    <section class="col-md-12 d-md-flex">
        <div class="card border-radius-none border-none col-md-10 text-left p-3">
            <div class="card-title">
                <div class="row">
                    <div class="col-7">
                        <h1 contenteditable="true"><?= $data->form_name; ?></h1>
                    </div>
                    <div class="col">
                        <span class="save">Last Edit Was at<?= $data->updated_at; ?></span>
                    </div>
                    <div class="col">
                        <div class="d-flex">

                            <div class="pr-3">
                                <h5 class="text-dark">Allowing Responses</h5>
                            </div>
                            <div>
                                <?php if ($data->allowing_responses == 'no') : ?>
                                    <label class="switch ml-auto pt-2">
                                        <input type="checkbox">
                                        <div class="slider round"></div>
                                    </label>
                                <?php else : ?>
                                    <label class="switch ml-auto pt-2">
                                        <input type="checkbox" checked>
                                        <div class="slider round"></div>
                                    </label>
                                <?php endif; ?>
                            </div>
                        </div>

                    </div>
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