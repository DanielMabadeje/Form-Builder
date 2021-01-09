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
                                <tr>
                                    <td>5fcfece717a24</td>
                                    <td>Friend Form test</td>
                                    <td>A Crazy form created for my friends to... </td>
                                    <td>Yes</td>
                                    <td>15</td>
                                    <td>25</td>
                                    <td>15 November 2020</td>
                                    <td>5 January 2021</td>

                                    <td class="d-flex">
                                        <button class="btn btn-primary myBtn m-1" aria-hidden="5f774d20c901a"><i class="fa fa-pencil"></i></button>
                                        <button class="btn btn-danger myBtn m-1" aria-hidden="5f774d20c901a"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>5fcfece717a24</td>
                                    <td>Friend Form test</td>
                                    <td>A Crazy form created for my friends to... </td>
                                    <td>Yes</td>
                                    <td>15</td>
                                    <td>25</td>
                                    <td>15 November 2020</td>
                                    <td>5 January 2021</td>

                                    <td class="d-flex">
                                        <button class="btn btn-primary myBtn m-1" aria-hidden="5f774d20c901a"><i class="fa fa-pencil"></i></button>
                                        <button class="btn btn-danger myBtn m-1" aria-hidden="5f774d20c901a"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>


</div>



<?php require APPROOT . '/views/dashboard/inc/footer.php'; ?>