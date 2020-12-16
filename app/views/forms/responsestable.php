<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/forms/inc/editheader.php'; ?>
<div class="col-12 p-3" style="border-top:1px #fbfafafa solid; background:#fdfcfc;">
    <div class="text-dark container">
        <div class="d-md-flex col-12">
            <!-- <div class="col-md-7 mr-auto">
                <span class="nav-item"><i class="fa fa-chevron-right"></i>Questions</span>
            </div> -->
            <div class="col-md-5 ml-auto ">
                <div>
                    <nav>
                        <ul class="navbar-nv d-flex">
                            <div class="nav-item"><a href="<?=URLROOT?>/forms/edit/<?=$data->form_id; ?>/" class="nav-link">Questions</a></div>
                            <div class="nav-item"><a href="<?=URLROOT?>/forms/responses/<?=$data->form_id; ?>/" class="nav-link">Responses</a></div>
                            <div class="nav-item">
                                <a href="<?=URLROOT?>/forms/responses/<?=$data->form_id; ?>/chart" class="nav-link">Chart</a></div>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>


    </div>
</div>
<div class="col-12 p-3">
    <div class="container">
        <div class="col-md-7 mr-auto">
            <span class="nav-item"><i class="fa fa-chevron-right"></i>Responses</span>
        </div>
    </div>
</div>
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
                <div class="card-title mb-0">Drivers</div>
                        <div class="table-responsive">
                            <table class="table text-left">
                                <thead>
                                    <tr>
                                        <th> Name </th>
                                        <th> Assigned </th>
                                        <th> Status </th>
                                        <th> Active </th>
                                    </tr>
                                </thead>
                                <tbody id="order">
                                    <!-- <?php foreach ($data['drivers'] as $post) : ?> -->
                                        <tr>
                                            <!-- <td><?= $post->name ?></td> -->
                                            <!-- <td><?= $post->assigned ?></td> -->
                                            <!-- <td><?= $post->status ?></td> -->
                                            <!-- <td><?= $post->active ?></td> -->
                                        </tr>
                        </div>

                    <!-- <?php endforeach; ?> -->
                    </tbody>
                    </table>
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