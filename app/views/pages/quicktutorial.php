<?php require APPROOT . '/views/inc/header.php'; ?>
<section class="bg-light mb-5 pb-5 pt-0 mt-0">
    <section class="container mt-md-5 pt-5">

        <div class="row col-md-3 mb-5">
            <div class="col-10">
                <h4>Create a form <span class="fa fa-plus"></span></h4>
            </div>
            <div class="col-2">
                <a href="<?= URLROOT; ?>/forms/add" class="btn btn-primary">Create Form</a>
            </div>
        </div>
        <section class="mt-md-2 pt-5 mb-5  mx-auto bg-white col-md-7" style="box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);">
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
                                        <h3>Music</h3>
                                        <p>Creation Of Uncomprehended Feelings</p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="<?= URLROOT ?>/img/booking.png" alt="" width="100%" height="300px">
                                    <div class="carousel-caption text-dark position-initial mx-auto">
                                        <h3>Music</h3>
                                        <p>A Sweet Melody</p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="<?= URLROOT ?>/img/booking.png" alt="" width="100%" height="300px">
                                    <div class="carousel-caption text-dark position-initial mx-auto">
                                        <h3>Music</h3>
                                        <p>The Best</p>
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

</section>

<?php require APPROOT . '/views/inc/pagesfooter.php'; ?>

<?php require APPROOT . '/views/inc/footer.php'; ?>