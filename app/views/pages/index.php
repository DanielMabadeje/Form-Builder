<?php require APPROOT . '/views/inc/header.php'; ?>
<link rel="stylesheet" href="<?= URLROOT ?>/css/laptop.css">
<div style="text-align:center;">
  <!-- <h1><?php echo $data['title'] ?></h1> -->
  <div class="position-relative overflow-hidden p-md-5 m-0  text-center bg-whit landing-bg pt-0 mt-md-0" style="
  /* background: linear-gradient(to bottom right, rgb(253, 251, 251), rgba(253, 249, 249, 0)),  */
  /* url('<?= URLROOT; ?>/img/jess-bailey-q10VITrVYUM-unsplash.jpg'); */
  /* url('<?= URLROOT; ?>/img/woman-pointing-document-near-lady-table-with-calculator-smartphone-pen_23-2148042655.jpg'); */
   background-size:cover; height:100%;">
    <div class="col-md-7 pt-1 mt-2 mb-5 text-dark mx-auto">
      <h5 class=" text-main-colo m">Data Collection is key</h5>
      <p class="lead font-weight-normal">And to collect it with ease is golden.. </p>
      <!-- <h1 class="custom-display-4 text-main-color text-main-color col">PRESENTING THE <br> NEW PHASE OF DATA COLLECTION</h1> -->
      <h1 class="custom-display-4  text-main-color col">PRESENTING THE <br> NEW PHASE OF DATA COLLECTION</h1>

      <?php if (isset($_SESSION['user_id'])) : ?>
        <a class="btn btn-outline-secondary mt-4 md-opjjpmhoiojifppkkcdabiobhakljdgm_doc" href="<?= URLROOT ?>/forms/add">Get Started</a>
      <?php else : ?>
        <a class="btn btn-outline-secondary mt-4 md-opjjpmhoiojifppkkcdabiobhakljdgm_doc" href="<?= URLROOT ?>/pages/quickdemo">Get Started</a>
      <?php endif; ?>
    </div>
    <div class="product-device shadow-sm-o d-md-block mt-5">

      <img src="<?= URLROOT ?>/img/8f123c1e-32ab-41d9-b042-0a2373a695e9.png" alt="" class="col-md-10 container p-md-4" style="margin-top:7%; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 16px 20px 0 rgba(0, 0, 0, 0.19); border-radius:10px;">
      <!-- <img src="<?= URLROOT ?>/img/sreenshotofedit.png" alt="" class="mt-4 col-md-10 container p-md-4" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 16px 20px 0 rgba(0, 0, 0, 0.19); border-radius:10px;"> -->
    </div>
    <!-- <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div> -->
    <!-- <div class="card container p-md-4" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
      <img src="<?= URLROOT ?>/img/sreenshotofedit.png" alt="">
    </div> -->
    <!-- <img src="<?= URLROOT ?>/img/sreenshotofedit.png" alt="" class=" col-md-10 container p-md-4" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);"> -->
  </div>


  <div class="col-md-8 mx-auto pt-5 mt-5">
    <h4>Collect Data of Any Size</h4>
    <h2 class="custom-display-4 text-main-color font-weight-normal">We can handle a lot of data <br> before you know it</h2>
    <br>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam dolor amet adipisci corporis labore vel doloremque illum hic maxime, aliquid nam enim aspernatur, reprehenderit repellendus omnis impedit, at perferendis optio accusamus mollitia.</p>
  </div>

  <!-- <img src="<?= URLROOT ?>/img/FsJ4AwKi_o.jpg" alt="" class="c" height="600px" width="100%"> -->
  <div class="col-12 pt-5 p-md-5 mt-4 mb-4" style="background: url(<?= URLROOT ?>/img/FsJ4AwKi_o.jpg); background-attachment:fixed;">
    <div class="p-5">
      <div class="col-md-7 ml-auto text-right p-md-4">
        <h2 class="custom-display-4 text-main-color text-white">
          Data available to all Devices and <br> across all Platforms
        </h2>
      </div>
    </div>
  </div>



  <!-- <div class="laptop">
    <div class="wrap">
      <div class="comp">
        <div class="monitor">
          <div class="mid">
            <div class="site">
              <div class="topbar">
                <div class="cerrar">
                  <div class="circl"></div>
                  <div class="circl"></div>
                  <div class="circl"></div>
                </div>
              </div>
              <div class="inhead">
                <div class="mid">
                  <div class="item"></div>
                </div>
                <div class="mid txr">
                  <div class="item"></div>
                  <div class="item"></div>
                  <div class="item"></div>
                  <div class="item"></div>
                </div>
              </div>
              <div class="inslid">

              </div>
              <div class="incont">
                <div class="item"></div>
                <div class="item"></div>
                <div class="item"></div>
                <div class="item"></div>
                <div class="wid">
                  <div class="itwid">
                    <div>
                      <div class="contfoot"></div>
                    </div>
                  </div>
                  <div class="itwid">
                    <div>
                      <div class="contfoot"></div>
                    </div>
                  </div>
                  <div class="itwid">
                    <div>
                      <div class="contfoot"></div>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                </div>
                <div class="infoot">

                </div>
              </div>
            </div>
          </div>
          <div class="mid codigo">
            <div class="line">
              <div class="item var"></div>
              <div class="item cont"></div>
              <div class="clearfix"></div>
            </div>
            <div class="line">
              <div class="item min var"></div>
              <div class="item min fun"></div>
              <div class="clearfix"></div>
            </div>
            <div class="line">
              <div class="item min var"></div>
              <div class="clearfix"></div>
            </div>
            <div class="line">
              <div class="item var"></div>
              <div class="item atr"></div>
              <div class="item cont"></div>
              <div class="clearfix"></div>
            </div>
            <div class="line tab1">
              <div class="item min atr"></div>
              <div class="item lrg fun"></div>
              <div class="item min fun"></div>
              <div class="item lrg cont"></div>
              <div class="clearfix"></div>
            </div>
            <div class="line tab1">
              <div class="item lrg atr"></div>
              <div class="item min fun"></div>
              <div class="item min cont"></div>
              <div class="clearfix"></div>
            </div>
            <div class="line tab1">
              <div class="item atr"></div>
              <div class="item min fun"></div>
              <div class="item atr"></div>
              <div class="clearfix"></div>
            </div>
            <div class="line tab1">
              <div class="item min atr"></div>
              <div class="item min cont"></div>
              <div class="item lrg atr"></div>
              <div class="item  fun"></div>
              <div class="clearfix"></div>
            </div>
            <div class="line tab1">
              <div class="item min atr"></div>
              <div class="item lrg fun"></div>
              <div class="item lrg cont"></div>
              <div class="item min fun"></div>
              <div class="clearfix"></div>
            </div>
            <div class="line tab1">
              <div class="item min var"></div>
              <div class="clearfix"></div>
            </div>
            <div class="line tab1">
              <div class="item min var"></div>
              <div class="clearfix"></div>
            </div>
            <div class="line tab2">
              <div class="item min var"></div>
              <div class="clearfix"></div>
            </div>
            <div class="line tab2">
              <div class="item min atr"></div>
              <div class="item min fun"></div>
              <div class="clearfix"></div>
            </div>
            <div class="line tab3">
              <div class="item min atr"></div>
              <div class="item min fun"></div>
              <div class="item lrg fun"></div>
              <div class="item lrg cont"></div>
              <div class="clearfix"></div>
            </div>
            <div class="line tab3">
              <div class="item min atr"></div>
              <div class="item min fun"></div>
              <div class="item lrg atr"></div>
              <div class="item lrg cont"></div>
              <div class="clearfix"></div>
            </div>
            <div class="line tab4">
              <div class="item min fun"></div>
              <div class="item lrg atr"></div>
              <div class="clearfix"></div>
            </div>
            <div class="line tab1">
              <div class="item atr"></div>
              <div class="item var"></div>
              <div class="item cont"></div>
              <div class="clearfix"></div>
            </div>
            <div class="line tab3">
              <div class="item min var"></div>
              <div class="clearfix"></div>
            </div>
            <div class="line tab4">
              <div class="item min atr"></div>
              <div class="item min fun"></div>
              <div class="item lrg atr"></div>
              <div class="item lrg cont"></div>
              <div class="clearfix"></div>
            </div>
            <div class="line">
              <div class="item min var"></div>
              <div class="clearfix"></div>
            </div>

          </div>
        </div>
        <div class="base">

        </div>
      </div>
    </div>
  </div> -->


  <div class="col-12">
    <div class="container">

      <div class="text-center col-md-10 mx-auto pt-5 mt-5">
        <h5 class="text-main-color">Form Building has never been easier</h5>
        <h2 class="custom-display-4 text-main-color">
          Create, Edit Flexibly, Share <br> & Analyse
        </h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt esse rem, laborum veritatis mollitia sapiente alias possimus voluptatem nulla facilis repudiandae repellat explicabo accusantium fugiat a aperiam consequuntur minus placeat.</p>
      </div>
      <div class="row text-md-left text-sm-center pt-5 mt-5">
        <div class="col-md-6">
          <h3 class="text-main-color">Create</h3>

          <h2 class="custom-display-4 text-main-color">
            Creation Made Easy With The
            Perfect Form Builder
          </h2>
          <div class="mt-3 pt-5">
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Distinctio illum facere, nisi doloremque obcaecati, alias, corporis labore repellat aperiam quam dolorem veritatis commodi sit deserunt odio provident adipisci magni eum eaque? Cumque iste ad quasi?</p>
          </div>

        </div>
        <div class="col-md-6">
          <!-- <img src="<?= URLROOT ?>/img/rhondak-native-florida-folk-artist-_Yc7OtfFn-0-unsplash-removebg-preview.png" alt="" class="col"> -->
        </div>


        <div class="col-md-6"></div>


        <div class="col-md-6 pt-5">
          <h3 class="text-main-color">Edit Flexibly</h3>
          <h2 class="custom-display-4 text-main-color">Customization & Personalization Even Makes it Better</h2>
          <!-- <h1 class="displa">Customization & Personalization Even Makes it Better</h1> -->
          <div class="pt-5">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil vero nisi omnis quod nemo. Veniam illum voluptatem tenetur? Tempore repellendus rem odit, eaque at quibusdam natus ea consequatur quaerat reprehenderit.</p>
          </div>

        </div>


        <div class="col-md-6 pt-5">
          <h3 class="text-main-color">Share</h3>
          <h2 class="custom-display-4 text-main-color">No Platform is an exception</h2>
          <div class="pt-5">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima numquam fuga incidunt molestiae non voluptatem earum aliquid, amet dolorem delectus placeat fugit recusandae porro minus commodi ipsa vel culpa voluptatibus? Illo pariatur dolore totam sint sunt animi ex. Odit.</p>
          </div>
        </div>

        <div class="col-md-6"></div>
        <div class="col-md-6"></div>

        <div class="col-md-6 pt-5">
          <h3 class="text-main-color">Analyse</h3>
          <h2 class="custom-display-4 text-main-color">See Results In Real-Time</h2>
          <div class="pt-5">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione reprehenderit quos, voluptates cum maxime asperiores reiciendis soluta, inventore illo officia accusamus architecto suscipit alias unde fugit ad autem non provident eligendi, minima enim veritatis hic? Sint voluptatibus nihil deleniti corporis quo dicta ea eum consequatur.</p>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- dashboard screeshot -->
  <div class="bg-mai col-12 pt-5  mt-5" style="background: linear-gradient(to right, #5631aff0, #5631aff0), url(<?= URLROOT ?>/img/1.jpg); background-size:cover">
    <div class="text-white text-center col-md-7 mx-auto">
      <span>Fast & Beautiful</span>
      <h2 class="custom-display-4 text-main-color">Boost Creativity and Productivity</h2>
      <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ducimus corporis optio animi blanditiis fugiat porro delectus sunt nobis illum illo doloremque minus explicabo exercitationem facilis quos excepturi vitae, qui voluptate.</p>
    </div>


    <img src="<?= URLROOT ?>/img/b44904d7-0575-4fbd-8bae-a56029ff533d.png" alt="" class="col-md-10 mt-5" style="border-radius:4% 4% 0 0;">
  </div>
  <!-- end dashboard screeshot -->



  <!-- Templates -->

  <div class="col-12 bg-light pt-5 pb-5">
    <div class="container mt-5">
      <h2 class="display-md-3">Templates</h2>
      <div class="row pt-5 pb-5 mt-5 mb-5">
        <a href="#" class="col">
          <div class="card border-none">
            <div class="card-heade" style=" height:200px; background:linear-gradient(to right, #00000061, #0000001a), url('<?= URLROOT ?>/img/sigmund-ZLst8z_M6_8-unsplash.jpg');  background-size:cover;">
              <!-- <h2 class="fa fa-cart"></h2> -->
              <!-- <img src="<?= URLROOT ?>/img/490034-200.png" alt="" width="200px" height="200px" style="opacity: 0.6;"> -->
            </div>
            <div class="card-body ">
              RSVP Form
            </div>
          </div>
        </a>
        <a href="#" class="col">
          <div class="card border-none">
            <div class="card-heade" style=" height:200px; background:linear-gradient(to right, #00000061, #0000001a), url('<?= URLROOT ?>/img/sergey-zolkin-_UeY8aTI6d0-unsplash.jpg');  background-size:cover;">
            </div>
            <div class="card-body">
              Booking Form
            </div>
          </div>
        </a>
        <a href="#" class="col">
          <div class="card border-none">
            <div class="card-heade" style=" height:200px; background:linear-gradient(to right, #00000061, #0000001a), url('<?= URLROOT ?>/img/andrew-neel-cckf4TsHAuw-unsplash.jpg');  background-size:cover;">
            </div>
            <div class="card-body">
              Job Application Form
            </div>
          </div>
        </a>
        <a href="#" class="col">
          <div class="card border-none">
            <div class="card-heade" style=" height:200px; background:linear-gradient(to right, #00000061, #0000001a), url('<?= URLROOT ?>/img/katt-yukawa-K0E6E0a0R3A-unsplash.jpg');  background-size:cover;">

            </div>
            <div class="card-body">
              Donation Form
            </div>
          </div>
        </a>
        <!-- <a href="#" class="col">
          <div class="card border-none bg-transparent">
            <div class="card-heade">
              <h2 class="fa fa-cart"></h2>
            </div>
            <div class="card-body">
              Payment Form
            </div>
          </div>
        </a> -->
      </div>

      <a href="<?= URLROOT ?>/pages/templates" class="btn btn-primary">View All Templates</a>
    </div>
  </div>

  <!-- end templates -->



  <!-- features -->

  <div class="col-12 p-4">
    <div class="container">
      <div class="row">
        <div class="col-md-5"></div>
        <div class="col-md-7 text-left">
          <h2 class="custom-display-4 text-main-color">Powerful Features</h2>

          <div class="text-left mt-5" id="accordion">
            <div class="card mb-1">
              <div class="card-header bg-white" id="headingOne">
                <h5 class="mb-0">
                  <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Privacy Settings
                  </button>
                </h5>
              </div>

              <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="card-body">
                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                </div>
              </div>
            </div>
            <div class="card mb-1">
              <div class="card-header bg-white" id="headingTwo">
                <h5 class="mb-0">
                  <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Conditions
                  </button>
                </h5>
              </div>
              <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                <div class="card-body">
                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                </div>
              </div>
            </div>
            <div class="card mb-1">
              <div class="card-header bg-white" id="headingThree">
                <h5 class="mb-0">
                  <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    List view
                  </button>
                </h5>
              </div>
              <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                <div class="card-body">
                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                </div>
              </div>
            </div>
            <div class="card mb-1">
              <div class="card-header bg-white" id="headingFour">
                <h5 class="mb-0">
                  <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                    Toggling Of Responses
                  </button>
                </h5>
              </div>
              <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                <div class="card-body">
                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                </div>
              </div>
            </div>

            <div class="card mb-1">
              <div class="card-header bg-white" id="headingFive">
                <h5 class="mb-0">
                  <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                    Payment Integration
                  </button>
                </h5>
              </div>
              <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
                <div class="card-body">
                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                </div>
              </div>
            </div>

            <div class="card mb-1">
              <div class="card-header bg-white" id="headingSix">
                <h5 class="mb-0">
                  <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                    All Input Types
                  </button>
                </h5>
              </div>
              <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordion">
                <div class="card-body">
                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- end features -->



  <!-- integrations -->
  <div class="col-12 p-5 bg-light mt-4 text-md-left text-sm-center">
    <div class="pt-md-5 col-md-8">
      <h3 class="displ">Integrations</h3>
      <h3 class="custom-display-4 text-main-color">Form Builder is more than just a <br> great online tool</h3>
      <p class="mt-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum natus dolores inventore nam deleniti quaerat quo aperiam id commodi suscipit, omnis sit! Rerum facere omnis necessitatibus porro nemo corrupti, quo dolore voluptas distinctio perferendis! Laborum libero sit animi labore laudantium iusto quam harum ullam est.</p>
    </div>
  </div>
  <!-- end integrations -->




  <!-- android coming soon -->
  <div class="bg-white col-12 p-5 text-left">
    <div class="row">
      <div class="col-md-7">
        <!-- <img src="<?= URLROOT ?>/img/272-2726659_phone-screen-png-transparent-background-transparent-android-phone.png" alt="" class="col-12"> -->
        <img src="<?= URLROOT ?>/img/realistic-hand-holding-smartphone-empty-touchscreen-isolated-transparent-background-realistic-hand-holding-smartphone-141794987-removebg-previewed.png" alt="" class="" width="300px" height="auto">

      </div>
      <div class="col-md-5">
        <h3 class="custom-display-4 text-main-color">Android app coming soon</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat assumenda libero vel temporibus deserunt perspiciatis? Mollitia voluptas pariatur maxime iusto cum beatae similique cumque ipsam, dolor repellat ipsa ratione repudiandae exercitationem sit rem esse? Necessitatibus porro eligendi soluta nihil dicta.</p>
      </div>

    </div>
  </div>

  <!-- android coming soon -->



  <!-- get started -->
  <div class="col-md-12  p-0 pt-5 pb-5 mt-4 bg-main">
    <div class="col-md-7 mx-au text-left p-5 text-white">
      <h1>You can experience Form Builder even <br> before Registration</h1>
      <?php if (isset($_SESSION['user_id'])) : ?>
        <a href="<?= URLROOT ?>/forms/add" class="btn bg-white pl-3 pr-3 mt-3">Quick Start</a>
      <?php else : ?>
        <a href="<?= URLROOT ?>/pages/quickdemo" class="btn bg-white pl-3 pr-3 mt-3">Quick Start</a>
      <?php endif; ?>
    </div>
  </div>

  <!-- end get started -->
  <!-- <p>Having issues? Please refer to the <a href="https://githubcom/DanielMabadeje.git">Docs</a> on how to use it</p> -->
</div>

<?php require APPROOT . '/views/inc/pagesfooter.php'; ?>

<?php require APPROOT . '/views/inc/footer.php'; ?>