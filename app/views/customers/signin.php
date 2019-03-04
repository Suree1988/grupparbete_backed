<?php require APPROOT . '/views/inc/header.php'; ?>
<nav class="navbar navbar-expand-lg navbar-light bg-white mb-3">
  <a class="navbar-brand font-weight-bold" href="<?php echo URLROOT; ?>"><i class="fas fa-boxes fa-2x d-inline-block align-top"></i> ThreeBoxes</a>
</nav>
<div class="row">
    <div class="col-md-6 mx-auto">
        <h2><?php flash('register_success'); ?></h2>
    </div>
</div>
<div class="row">
    <div class="col-md-6 mx-auto">
      <div class="card card-body bg-light mt-5">

        <h2>Sign In</h2>
        <form action="<?php echo URLROOT; ?>/customers/signin" method="post">
          <div class="form-group">
            <label for="email">Email: <sup>*</sup></label>
            <input type="email" name="email" class="form-control form-control-lg <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>">
            <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
          </div>
          <div class="form-group">
            <label for="password">Password: <sup>*</sup></label>
            <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>">
            <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
          </div>
          <div class="row">
            <div class="col-md-12">
              <input type="submit" value="Sign In" class="btn btn-danger btn-lg btn-block">
            </div>
            <div class="col-md-12 text-center mt-3">
              <a href="<?php echo URLROOT; ?>/customers/register">No account? Register</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
