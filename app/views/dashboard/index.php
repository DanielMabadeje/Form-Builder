<?php require APPROOT . '/views/dashboard/inc/header.php'; ?>

<?php require APPROOT . '/views/dashboard/inc/sidenav.php'; ?>

<div class="cl ml-auto" id="main">
    <?php require APPROOT . '/views/dashboard/inc/topnav.php'; ?>
    <section class="bg-lighter col-12 p-3 container">
        <div class="container">
            <span class="fa fa-chevron-right"></span> Dashboard
        </div>
    </section>
    <section class="container pt-3 pr-md-5">
        <!-- <h2 class="display-4">Dashboard</h2> -->

        <div class="container">

            <div class="mb-4">
                <h2 class="">Create Your Form</h2>
                <p>Start your data collection with just a click...</p>
            </div>
            <div class="d-md-flex overflow mb-5 ml-1 pb-5" style="overflow-x:auto">
                <div class="card col-md-3 m-md-2 mt-4" style="border-radius:6px; box-shadow: 0px 8px 8px 0px rgb(0 0 0 / 8%); border:none; height:150px">
                    <div class="card-title mb-0"></div>
                    <div class="card-body text-left">
                        <!-- <h2 class="display-5">10 Forms</h2> -->
                        <!-- 1024px-OOjs_UI_icon_add.svg -->
                        <img src="<?= URLROOT ?>/img/1024px-OOjs_UI_icon_add.svg.png" alt="" width="auto" height="120px" style="opacity: 0.6;">


                    </div>
                    <h5>Blank Form</h5>
                </div>

                <div class="card col-md-3 m-md-2 mt-4" style="border-radius:6px; box-shadow: 0px 8px 8px 0px rgb(0 0 0 / 8%); border:none; height:150px;  background:url('<?= URLROOT ?>/img/sigmund-ZLst8z_M6_8-unsplash.jpg');  background-size:cover;">
                    <div class="card-title mb-0"></div>
                    <div class="card-body">
                        <!-- <h2 class="display-5">10 Forms</h2> -->
                        <!-- <img src="<?= URLROOT ?>/img/sigmund-ZLst8z_M6_8-unsplash.jpg" alt="" width="auto" height="120px" style="opacity: 0.6;"> -->

                    </div>
                    <h5>RSVP Form</h5>
                </div>
                <div class="card col-md-3 m-md-2 mt-4" style="border-radius:6px; box-shadow: 0px 8px 8px 0px rgb(0 0 0 / 8%); border:none; height:150px">
                    <div class="card-title mb-0"></div>
                    <div class="card-body">
                        <img src="<?= URLROOT ?>/img/16650192161582800237-512.png" alt="" width="auto" height="120px" style="opacity: 0.6;">

                    </div>
                    <h5>Job Application Form</h5>
                </div>
                <div class="card col-md-3 m-md-2 mt-4" style="border-radius:6px; box-shadow: 0px 8px 8px 0px rgb(0 0 0 / 8%); border:none; height:150px">
                    <div class="card-title mb-0"></div>
                    <div class="card-body">
                        <img src="<?= URLROOT ?>/img/reservations.jpg" alt="" width="auto" height="120px" style="opacity: 0.6;">

                    </div>
                    <h5>Booking Form</h5>
                </div>

            </div>



            <div class="d-md-flex">
                <div class="card border-none bg-main text-white col-md-6 m-md-2 ml/-md-0 mt-2" style="border-radius:6px;    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);">
                    <div class="card-body">
                        <h2 class="display-5">10 Forms</h2>
                        <span>Recently Created</span>

                    </div>
                </div>
                <div class="card border-none col-md-6 m-md-2  mt-4" style="border-radius:6px;     box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);">
                    <div class="card-body">
                        <h2 class="display-5">10 Forms</h2>
                        <span>Unpublished</span>

                    </div>
                </div>
            </div>





            <div class="mt-5 pt-5">
                <h2 class="display-4">Your Forms</h2>
                <div class="card mt-5 border-none">
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
        </div>
    </section>


</div>



<?php require APPROOT . '/views/dashboard/inc/footer.php'; ?>