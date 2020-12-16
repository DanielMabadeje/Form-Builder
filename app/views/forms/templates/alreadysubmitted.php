<?php require APPROOT . '/views/forms/inc/formheader.php'; ?>

<style>
    body {
        background: #fbfafafa;
    }

    .border-radius-none {
        border-radius: 0;
    }

    .border-none {
        border: none;
    }

    /* input[type=submit] {
        background-color: #343a40;
        color: white;
        width: 50%;
        border: none;
        padding: 2%;
        margin-top: 3%;
        align-self: center;
        margin-right: auto;
        margin-left: auto;
    } */


    .field_container:focus,
    .field_container:active {
        border: 1px gray solid;
    }

    .field_container {
        margin-top: 5%;
    }


    .form-wrap {
        position: relative;
    }

    @media screen and(min-width: 768px) {
        .form-input {
            font-size: 15px;
            min-height: 60px;
            padding: 17px 0;
        }
    }

    .form-input {
        display: block;
        width: 100%;
        min-height: 50px;
        padding: 10px 0;
        font-size: 14px;
        font-weight: 400;
        line-height: 24px;
        letter-spacing: .1em;
        font-family: poppins, -apple-system, BlinkMacSystemFont, segoe ui, Roboto, helvetica neue, Arial, sans-serif;
        color: #151515;
        background-color: transparent;
        background-image: none;
        border-radius: 0;
        -webkit-appearance: none;
        transition: .3s ease-in-out;
        border: 1px solid #e1e1e1;
        border-width: 0 0 1px;
    }

    input,
    button,
    select,
    textarea {
        outline: none;
    }

    button,
    input {
        overflow: visible;
    }







    .dropbtn {
        /* background-color: #4CAF50;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none; */
        cursor: pointer;
    }

    /* Dropdown button on hover & focus */
    .dropbtn:hover,
    .dropbtn:focus {
        /* background-color: #3e8e41; */
        color: white;
    }

    /* The container <div> - needed to position the dropdown content */
    .dropdown {
        position: relative;
        display: inline-block;
    }

    /* Dropdown Content (Hidden by Default) */
    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    }

    /* Links inside the dropdown */
    .dropdown-content div {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    /* Change color of dropdown links on hover */
    .dropdown-content div:hover {
        background-color: #f1f1f1
    }

    /* Show the dropdown menu (use JS to add this class to the .dropdown-content container when the user clicks on the dropdown button) */
    .show {
        display: block;
    }

    input[type="radio"] {
        /* width: 1px; */
        background-color: initial;
        cursor: default;
        appearance: radio;
        box-sizing: border-box;
        /* margin: 3px 3px 0px 5px; */
        /* padding: 0; */
        min-height: 18px;
        border: initial;
    }
</style>


<div class="container" style="text-align:center; margin-top:10%;">


    <section class="col-md-12 d-md-flex">
        <div class="card border-radius-none border-none col-md-10 text-left p-3">
            <div class="card-title">
                <h1><?= $data->form_name; ?></h1>
                <br>
                <h5><?= $data->description; ?></h5>
            </div>
                   <div class="card-body">
<h3>Thank you for your response</h3>


        </div>
    </section>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>