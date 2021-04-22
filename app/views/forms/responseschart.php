<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/forms/inc/editheader.php'; ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.css" integrity="sha512-C7hOmCgGzihKXzyPU/z4nv97W0d9bv4ALuuEbSf6hm93myico9qa0hv4dODThvCsqQUmKmLcJmlpRmCaApr83g==" crossorigin="anonymous" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js" integrity="sha512-hZf9Qhp3rlDJBvAKvmiG+goaaKRZA6LKUO35oK6EsM0/kjPK32Yw7URqrq3Q+Nvbbt8Usss+IekL7CRn83dYmw==" crossorigin="anonymous"></script>
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
                            <div class="nav-item"><a href="<?= URLROOT ?>/forms/edit/<?= $data->form_id; ?>/" class="nav-link">Questions</a></div>
                            <div class="nav-item"><a href="<?= URLROOT ?>/forms/responses/<?= $data->form_id; ?>/" class="nav-link">Responses</a></div>
                            <div class="nav-item">
                                <a href="<?= URLROOT ?>/forms/responses/<?= $data->form_id; ?>/chart" class="nav-link">Chart</a>
                            </div>
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
            <span class="nav-item"><i class="fa fa-chevron-right"></i>Chart</span>
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
                <h2>Graphical ResponsesChart Page</h2>

                <!-- <pre>
                <?php var_dump($data); ?>
                </pre> -->



                <!-- <canvas id="myChart" width="400" height="400"></canvas> -->


                <?php foreach($data as $singleInput): ?>
                    <canvas id="myChart" class="canvas" width="400" height="400"></canvas>
                <?php endforeach; ?>
            </div>
        </div>


    </section>
</div>

<script>
    var formarray = <?php echo json_encode($data); ?>


    for (let index = 0; index < formarray.length; index++) {

        var ctx = document.getElementById('myChart');
        var ctx=document.getElementsByClassName('canvas')[index];
    // var myChart = new Chart(ctx, {
    //     type: 'bar',
    //     data: {
    //         labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
    //         datasets: [{
    //             label: '# of Votes',
    //             data: [12, 19, 3, 5, 2, 3],
    //             backgroundColor: [
    //                 'rgba(255, 99, 132, 0.2)',
    //                 'rgba(54, 162, 235, 0.2)',
    //                 'rgba(255, 206, 86, 0.2)',
    //                 'rgba(75, 192, 192, 0.2)',
    //                 'rgba(153, 102, 255, 0.2)',
    //                 'rgba(255, 159, 64, 0.2)'
    //             ],
    //             borderColor: [
    //                 'rgba(255, 99, 132, 1)',
    //                 'rgba(54, 162, 235, 1)',
    //                 'rgba(255, 206, 86, 1)',
    //                 'rgba(75, 192, 192, 1)',
    //                 'rgba(153, 102, 255, 1)',
    //                 'rgba(255, 159, 64, 1)'
    //             ],
    //             borderWidth: 1
    //         }]
    //     },
    //     options: {
    //         scales: {
    //             yAxes: [{
    //                 ticks: {
    //                     beginAtZero: true
    //                 }
    //             }]
    //         }
    //     }
    // });



    var data = {
        // labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        labels: formarray[index].options,
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    };
    var options = {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }


    var myDoughnutChart = new Chart(ctx, {
        type: 'doughnut',
        data: data,
        options: options
    });
        const element = array[index];
        
    }

    
</script>



<script src="<?= URLROOT; ?>/js/jquery.js"></script>

<script src="<?= URLROOT; ?>/js/form/edit.js"></script>
<?php require APPROOT . '/views/inc/footer.php'; ?>