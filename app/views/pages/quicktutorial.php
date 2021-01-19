<?php require APPROOT . '/views/inc/header.php'; ?>
<main id="main">
<div class="bg-light mb-5 pb-5 pt-0 mt-0 m-0 position-relative overflow-hidden">
    <section class="container pt-5">

        <div class="col-md-7 mb-5">
            
            <span class="font-weight-normal">Create a form <span class="fa fa-plus"></span></span>
            <span><a href="<?= URLROOT; ?>/forms/add" class="btn text-white bg-main">Create Form</a></span>
            
        </div>
        <section class="mt-md-2  mb-5  mx-auto bg-light col-md-7" style="
        /* box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2); */
        ">
            <div class=" mb-md-5  ">
                <div class="mb-md-5">
                    <section class="banner-area mt-md-5 overflow-hidden position-relative text-dark" id="lay" data-parallax="scroll" data-image-src="">
                        <div id="" class="carousel carousel slide mt-md-5" data-ride="carousel">
                            <ul class="carousel-indicators">
                                <li data-target="#demo" data-slide-to="0" class="active"></li>
                                <li data-target="#demo" data-slide-to="1"></li>
                                <li data-target="#demo" data-slide-to="2"></li>
                                <li data-target="#demo" data-slide-to="3"></li>
                                <li data-target="#demo" data-slide-to="4"></li>
                                <!-- <li data-target="#demo" data-slide-to="2"></li> -->
                            </ul>
                            <div class="carousel-inner" style="overflow:visibl">
                                <div class="carousel-item active" id="">
                                    <img src="<?= URLROOT ?>/img/booking.png" alt="" width="100%" height="300px">
                                    <div class="carousel-caption text-dark position-initial mx-auto">
                                        <h3>Customized Backgrounds</h3>
                                        <p> You can add custom backgrounds to your forms</p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="<?= URLROOT ?>/img/booking.png" alt="" width="100%" height="300px">
                                    <div class="carousel-caption text-dark position-initial mx-auto">
                                        <h3>QR Codes</h3>
                                        <p>Tired of writing links ?... <br> we got you just scan the code to get started...</p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="<?= URLROOT ?>/img/booking.png" alt="" width="100%" height="300px">
                                    <div class="carousel-caption text-dark position-initial mx-auto">
                                        <h3>Even more Responses</h3>
                                        <p>Even on freemium plan you get to have more responses and views</p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="<?= URLROOT ?>/img/booking.png" alt="" width="100%" height="300px">
                                    <div class="carousel-caption text-dark position-initial mx-auto">
                                        <h3>Accepting Payments</h3>
                                        <p>Yes, you can collect payments through our platform and allow integrations of Stripe, Paypal and Paystack</p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="<?= URLROOT ?>/img/booking.png" alt="" width="100%" height="300px">
                                    <div class="carousel-caption text-dark position-initial mx-auto">
                                        <h3>Los Angeles</h3>
                                        <p>Its For All Ages</p>
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#demo" data-slide="prev">
                                    <span class="carousel-control-prev-icon bg-darker rounded-circle"></span>
                                </a>
                                <a class="carousel-control-next" href="#demo" data-slide="next">
                                    <span class="carousel-control-next-icon bg-darker rounded-circle"></span>
                                </a>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </section>
    </section>

</div>
</main>

<?php require APPROOT . '/views/inc/pagesfooter.php'; ?>

<?php require APPROOT . '/views/inc/footer.php'; ?>