<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/forms/inc/editheader.php'; ?>
<link rel="stylesheet" href="<?= URLROOT; ?>/css/form/edit.css">
<link rel="stylesheet" href="<?= URLROOT; ?>/css/modal.css">

<link rel="stylesheet" href="<?= URLROOT; ?>/css/font-awesome.min.css">
<div class="container" style="text-align:center; margin-top:10%;">




    <section class="col-md-12 d-md-flex">
        <div class="card border-radius-none border-none col-md-10 text-left p-3">
            <div class="card-title">
                <div class="row">
                    <div class="col-12">
                        <h1 contenteditable="true"><?= $data->form_name; ?></h1>
                    </div>

                </div>

                <br>
                <h5 contenteditable="true" class="description_h5"><?= $data->description; ?></h5>
            </div>

            <div class="card-body">
                <h2>Responses Page</h2>
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
                        <div>MultiChoice Answer</div>
                        <div>File</div>
                        <!-- input -->
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
<script src="<?= URLROOT; ?>/js/form/edit.js"></script>
<?php require APPROOT . '/views/inc/footer.php'; ?>