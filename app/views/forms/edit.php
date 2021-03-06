<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/forms/inc/editheader.php'; ?>
<link rel="stylesheet" href="<?= URLROOT; ?>/css/form/csscodesandbox.css">



<div class="col-12 p-3" style="border-top:1px #fbfafafa solid; background:#fdfcfc;">
    <div class="text-dark container">
        <div class="d-md-flex col-12">
            <div class="col-md-7 mr-auto">
                <!-- <span class="nav-item"><i class="fa fa-chevron-right"></i>Questions</span> -->
                <button class="bg-main pl-4 pr-4 btn text-white" id="shareBtn"><i class="fa fa-share"></i> Share</button>
            </div>
            <div class="col-md-5 ml-auto pl-0">
                <div>
                    <nav>
                        <ul class="navbar-nv d-flex col-12 pl-0">
                            <div class="nav-item col-sm-4 pl-0 pr-0"><a href="<?= URLROOT ?>/forms/edit/<?= $data->form_id; ?>/" class="nav-link">Questions</a></div>
                            <div class="nav-item col-sm-4 pl-0 pr-0"><a href="<?= URLROOT ?>/forms/responses/<?= $data->form_id; ?>/" class="nav-link">Responses</a></div>
                            <div class="nav-item col-sm-4 pl-0 pr-0">
                                <a href="<?= URLROOT ?>/forms/responses/<?= $data->form_id; ?>/chart" class="nav-link">Chart</a>
                            </div>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>


    </div>
</div>
<div class="col-12 p-md-3 p-sm-0">
    <div class="container">
        <div class="col-md-7 mr-auto">
            <span class="nav-item"><i class="fa fa-chevron-right"></i>Questions</span>
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
                    <button class="btn btn-secondary  bg-main" id="updateBtn">Update</button>
                </div>
                <!-- </form> -->
            </div>
            <!-- <p>Some text in the Modal..</p> -->
        </div>

    </div>


    <div id="settingsModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <div class="col-12 text-right">
                <span class="close">x</span>
            </div>

            <div class="col-md-7 text-left">
                <h2>Customize Your Form</h2>
            </div>

            <section class="backgroundColorSettings text-left col-md-12 pt-5 mt-2">
                <h6>Choose The Background Color You Love</h6>
                <div class="col-md-12">
                    <div class="card bg-light">
                        <div class="card-body">
                            <div class="row">
                                <div class="p-5 m-3 col-1 bg-dark color-div-settings"></div>
                                <div class="p-5 m-3 col-1 bg-white color-div-settings"></div>
                                <div class="p-5 m-3 col-1 bg-black color-div-settings"></div>
                                <div class="p-5 m-3 col-1 bg-blue color-div-settings"></div>
                                <div class="p-5 m-3 col-1 bg-green color-div-settings"></div>
                                
                            </div>
                        </div>
                    </div>

                    <div class="card mt-4">
                        <div class="card-body pt-3 pb-3">
                            <div class="input color-input">
                                <input type="color" name="" id="" value="">
                            </div>
                        </div>
                    </div>

                </div>
            </section>


        </div>

    </div>

    <div class="modal" id="shareModal">
        <!-- Modal content -->
        <div class="modal-content">
            <div class="col-12 text-right">
                <span class="close">x</span>
            </div>

            <div class="col-md-12 text-left">
                <h2>Share Your Amazing Form To The World</h2>

                <div class="col-md-12 mt-4 pt-4 card pb-4">
                    <!-- <input type="text" class="col input-group-text col-12 text-left p-1 mt-4" disabled value="<?= URLROOT; ?>/forms/views/<?= $data->form_id ?>"> -->
                    <h6>Your Form Url</h6>
                    <div class="col-12 p-2 mt-4 card ">
                        <h6><?= URLROOT; ?>/forms/views/<?= $data->form_id ?></h6>
                    </div>

                </div>


                <div class="col-md-12 mt-4 pt-4 card pb-4">
                    <h6>Share On Social Platforms</h6>
                    <div class="row">
                        <!-- div.col-md-4 -->
                        <a class="col text-center p-2 border-social-share bg-facebook text-white m-2">
                            <div class="col-md-12 bg-facebook">

                                <h6><i class="fa fa-facebook"></i> Facebook</h6>
                            </div>
                        </a>

                        <a class="col text-center p-2 border-social-share bg-whatsapp text-white m-2">
                            <div class="col-md-12 bg-whatsapp">

                                <h6><i class="fa fa-whatsapp social-share-icon"></i> Whatsapp</h6>
                            </div>
                        </a>

                        <a class="col text-center p-2 border-social-share bg-facebook text-white m-2">
                            <div class="col-md-12 bg-facebook">

                                <h6><i class="fa fa-twitter social-share-icon"></i> Twitter</h6>
                            </div>
                        </a>
                    </div>
                    <div class="row">
                        <!-- div.col-md-4 -->
                        <a class="col text-center p-2 border-social-share bg-facebook text-white m-2">
                            <div class="col-md-12 bg-facebook">

                                <h6><i class="fa fa-telegram"></i> Telegram</h6>
                            </div>
                        </a>

                        <a class="col text-center p-2 border-social-share bg-facebook text-white m-2">
                            <div class="col-md-12 bg-facebook">

                                <h6><i class="fa fa-linkedin"></i> LinkedIn</h6>
                            </div>
                        </a>

                        <a class="col text-center p-2 border-social-share bg-facebook text-white m-2">
                            <div class="col-md-12 bg-facebook">

                                <h6><i class="fa fa-mail"></i> Email</h6>
                            </div>
                        </a>
                    </div>
                </div>


                <div class="col-md-12 mt-4 pt-4  pb-4">
                    <div class="row">
                        <div class="col-6">
                            <div class="card p-4">
                                <h6><i class="fa fa-code"></i> Embed As Frame</h6>
                            </div>
                        </div>


                        <div class="col-6">
                            <div class="card p-4">
                                <h6><i class="fa fa-code"></i> Generate QR Code</h6>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-md-12 mt-4 pb-4 pt-4">
                    <h6>Your Form Privacy Settings</h6>

                    <div class="col-md-12 p-0 mt-4">
                        <div class="card p-2">
                            <div class="row">
                                <div class="col-1"></div>
                                <div class="col-11">
                                    <h6><strong>Public</strong></h6>
                                    <h6>People can see forms under Public form when they search</h6>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 p-0 mt-4">
                        <div class="card p-2">
                            <div class="row">
                                <div class="col-1"></div>
                                <div class="col-11">
                                    <h6><strong>Unlisted</strong></h6>
                                    <h6>It is not listed in discover it can only be viewed by people with the link</h6>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="col-md-12 p-0 mt-4">
                        <div class="card p-2">
                            <div class="row">
                                <div class="col-1"></div>
                                <div class="col-11">
                                    <h6><strong>Limited</strong></h6>
                                    <h6>Only People you give access that can see the form</h6>
                                </div>
                            </div>
                        </div>
                    </div>




                    <div class="col-md-12 p-0 mt-4">
                        <div class="card p-2">
                            <div class="row">
                                <div class="col-1"></div>
                                <div class="col-11">
                                    <h6><strong>Private</strong></h6>
                                    <h6>Only you have access to your form</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </div>


    <section class="col-md-12 d-md-flex">
        <div class="card border-radius-none col-md-10 text-left p-md-3" style="border-top:4px solid #5631af; border-left:0; border-right:0; border-bottom:0">
            <div class="card-title">
                <div class="row">
                    <div class="col-12 pt-5">
                        <h1 contenteditable="true" class="display-4"><?= $data->form_name; ?></h1>
                    </div>

                </div>

                <br>
                <h5 contenteditable="true" class="font-weight-normal description_h5 col-md-7 pl-0"><?= $data->description; ?></h5>
            </div>

            <div class="card-body pt-0">
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


            <h4 class="display-5 text-gray">Powered By | FormBuilder</h4>
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
                        <?php
                        if ($_SESSION['membership_plan'] == 'premium') : ?>
                            <div>Range</div>
                            <div>Time</div>
                            <div>File</div>
                        <?php endif; ?>

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


                <!-- settings -->
                <div class="p-2 col-sm-2">
                    <button class="dropbtn btn  border-radius-none" id="settingsBtn"> <i class="fa fa-cog"></i></button>
                </div>

                <div class="p-2 col-sm-2">
                <!-- <span style="font-size:30px;cursor:pointer" onclick="openNav()"></span> -->
                    <button class="dropbtn btn  border-radius-none" id="settingsBtn" onclick="openNav()"> <i class="fa fa-code"></i></button>
                </div>

                <?php if ($_SESSION['membership_plan'] == 'premium') : ?>
                    <div class="p-2 col-sm-2">
                        <button class="dropbtn btn  border-radius-none"> <i class="fa fa-paper"></i></button>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>


    <div id="cssSandbox" class="sidenavsandbox custom-shadow">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
        <div class="theme">

        </div>

        <div class="bg-light sandbox">
            <div class="sandbox-body text-dark text-left" contenteditable>

            </div>
        </div>

        <div class="buttons pt-4 pl-5 ml-4 text-left">
            <button class="btn text-main-color">Run</button>
            <button class="btn bg-main text-white">Update</button>
        </div>
    </div>
</div>

<script>
    var formarray = <?php echo json_encode($data); ?>
</script>



<script src="<?= URLROOT; ?>/js/jquery.js"></script>
<script src="<?= URLROOT; ?>/js/form/edit.js"></script>
<script src="<?= URLROOT; ?>/js/form/csscodesandbox.js"></script>
<?php require APPROOT . '/views/inc/footer.php'; ?>