<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card card-body  mt-5">
            <?php flash('register_success'); ?>
            <h2>Login</h2>
            <p>Please fill the form</p>
            <?php if(isset($_GET['form_id'])):?>
                <form action="<?= URLROOT ?>/users/login<?= $_GET['form_id'] ?>" method="post">
            <?php else: ?>
                <form action="<?= URLROOT ?>/users/login" method="post">
            <?php endif; ?>
                <div class="form-group">
                    <label for="email">Email <sup>*</sup></label>
                    <input type="email" name="email" class="form-control form-control-lg <?= (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?= $data['email']; ?>">
                    <span class="invalid-feedback"><?= $data['email_err']; ?></span>
                </div>
                <div class="form-group">
                    <label for="password">Password: <sup>*</sup></label>
                    <input type="password" name="password" class="form-control form-control-lg <?= (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?= $data['password']; ?>">
                    <span class="invalid-feedback"><?= $data['password_err']; ?></span>
                </div>
                <div class="row pt-3">
                    <div class="col">
                        <input type="submit" value="Login" class="btn btn-primary btn-block p-2 ">
                    </div>
                    <div class="col">
                        <a href="<?= URLROOT; ?>users/register " class="btn btn-light btn-block">Register</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div> <?php require APPROOT . '/views/inc/footer.php'; ?>