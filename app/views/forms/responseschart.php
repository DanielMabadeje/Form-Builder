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
                <h2>Graphical Responses Chart Page</h2>

                <?php foreach ($data->questions as $singleInput) : ?>
                    <canvas id="myChart" class="canvas mt-4 mb-5 pb-5" width="400" height="400"></canvas>
                <?php endforeach; ?>
            </div>
        </div>


    </section>
</div>

<script>
    var formarray = <?php echo json_encode($data); ?>


    for (let index = 0; index < formarray.questions.length; index++) {
        var ctx = document.getElementsByClassName('canvas')[index];
        if (currentIndex=checkifMultiOption(formarray.questions[index].question_id)) {

            var colors=generateRandomColors(formarray.chart[formarray.questions[index].question_id].length)
            var data = {
                
                labels:convertObjectToArray(formarray.questions[index].options),
                datasets: [{
                    label: formarray.form[currentIndex].label,
                    data: formarray.chart[formarray.questions[index].question_id],
                    backgroundColor: colors,
                    borderColor: colors,
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


        } else if (currentIndex=checkifDropdown(formarray.questions[index].question_id)) {
            var labels=convertObjectToArray(formarray.questions[index].options)
            var colors=generateRandomColors(formarray.chart[formarray.questions[index].question_id].length)
            var data = {
                labels: labels,
                datasets: [{
                    label: formarray.form[currentIndex].label,
                    data:formarray.chart[formarray.questions[index].question_id],
                    backgroundColor: colors,
                    borderColor: colors,
                    borderWidth: 1
                }]
            };
            const config = new Chart(ctx, {
                type: 'bar',
                data: data,
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                },
            });

        } else {

        }

    }



    function checkifMultiOption(question_id) {
        for (let index = 0; index < formarray.form.length; index++) {
            if (formarray.form[index].question_id == question_id && formarray.form[index].type == "checkbox") {
                return index;
            };

        }
    }


    function checkifDropdown(question_id) {
        for (let index = 0; index < formarray.form.length; index++) {
            if (formarray.form[index].question_id == question_id && formarray.form[index].type == "dropdown") {
                return index;
            };

        }
    }


    function convertObjectToArray(obj) {
        return Object.values(obj);
    }

    function generateRandomColors(length) {
        var colors = [];
        while (colors.length < 100) {
            do {
                var color = Math.floor((Math.random()*1000000)+1);
            } while (colors.indexOf(color) >= 0);
            colors.push("#" + ("000000" + color.toString(16)).slice(-6));
        }

        return colors;
    }
</script>



<script src="<?= URLROOT; ?>/js/jquery.js"></script>

<script src="<?= URLROOT; ?>/js/form/edit.js"></script>
<?php require APPROOT . '/views/inc/footer.php'; ?>