<?php require APPROOT . '/views/dashboard/inc/header.php'; ?>

<?php require APPROOT . '/views/dashboard/inc/sidenav.php'; ?>

<div class="cl ml-auto" id="main">
    <?php require APPROOT . '/views/dashboard/inc/topnav.php'; ?>
    <section class="bg-lighter col-12 p-3">
        <div>
            <span class="fa fa-chevron-right"></span>Forms
        </div>
    </section>
    <section class="container pt-3">
        <!-- <h2 class="display-4">Dashboard</h2> -->

        <div class="container">
            <h2 class="display-4">Your Forms</h2>



            <div class="card mt-4">
                <div class="card-body">
                    <!-- <div class="card-title mb-0"></div> -->
                    <div class="table-responsive" style="overflow-x:auto">
                        <!-- <div class="col-12" style="height: 1px;"></div> -->
                        <table class="table text-left">
                            <thead>
                                <tr class="">
                                    <th>Reference</th>
                                    <th> Form Name </th>
                                    <th>Description</th>
                                    <th> Allowing Responses</th>
                                    <th> No OfQuestions</th>
                                    <th> Responses </th>
                                    <th> Created At </th>
                                    <th> Updated At </th>
                                    <th> Action</th>
                                </tr>
                            </thead>
                            <tbody id="order" class="">
                            <?php foreach($data['form'] as $form): ?>


<tr>
    <td><?= $form->form_id ?></td>
    <td><?= $form->form_name ?></td>
    <td><?= $form->description ?></td>
    <td>
        <?php if($form->allowing_responses == "1" || $form->allowing_responses=="yes"): ?>
            Yes
        <?php else: ?>
            No
        <?php endif; ?>
    </td>
    <td><?= $form->questionscount ?></td>
    <td>25</td>
    <td><?= $form->created_at ?></td>
    <td><?= $form->updated_at ?></td>

    <td class="d-flex">
        <a class="btn btn-primary myBtn m-1" href="<?= URLROOT; ?>/forms/edit/<?= $form->form_id ?>" aria-hidden="<?= $form->form_id ?>"><i class="fa fa-pencil"></i></a>
        <a class="btn btn-danger myBtn m-1" href="<?= URLROOT; ?><?= $form->form_id ?>" aria-hidden="<?= $form->form_id ?>"><i class="fa fa-trash"></i></a>
    </td>
</tr>

<?php endforeach; ?>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>


</div>



<?php require APPROOT . '/views/dashboard/inc/footer.php'; ?>