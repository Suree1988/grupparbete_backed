<?php require APPROOT . '/views/inc/header.php'; ?>
<nav class="navbar navbar-expand-lg navbar-light bg-white mb-3">
  <a class="navbar-brand font-weight-bold" href="<?php echo URLROOT; ?>"><i class="fas fa-boxes fa-2x d-inline-block align-top"></i> ThreeBoxes</a>
</nav>

    <div class="container bg-light mb-5">
        <div class="pt-3 border-bottom">
            <h2>I'm new here</h2>
        <form action="<?php echo URLROOT; ?>/customers/register" method="post">
             <div class="row">
                 <div class="col-md-6 my-3">
                 <label for="firstname">First name: <sup class="text-danger">*</sub></label> 
                 <input type="firstname" name="firstname" class="form-control  <?php echo (!empty($data['firstname_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['firstname']; ?>">
            <span class="invalid-feedback"><?php echo $data['firstname_err']; ?></span>
          </div>

                 <div class="col-md-6 my-3">
                 <label for="lastname">Last name: <sup class="text-danger">*</sub></label> 
                 <input type="lastname" name="lastname" class="form-control <?php echo (!empty($data['lastname_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['lastname']; ?>">
            <span class="invalid-feedback"><?php echo $data['lastname_err']; ?></span>
          </div>

                 <div class="col-md-12 my-3">
                 <label for="email">Email: <sup class="text-danger">*</sub></label> 
                 <input type="email" name="email" class="form-control form-control-lg  <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>">
                <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
                 </div>

                 <div class="col-md-12 my-3">
                 <label for="address">Address: <sup class="text-danger">*</sub></label> 
                 <input type="address" name="address" class="form-control form-control-lg  <?php echo (!empty($data['address_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['address']; ?>">
            <span class="invalid-feedback"><?php echo $data['address_err']; ?></span>
          </div>

                 <div class="col-md-6 my-3">
                 <label for="postcode"> Postcode: <sup class="text-danger">*</sub></label> 
                 <input type="postcode" name="postcode" class="form-control <?php echo (!empty($data['postcode_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['postcode']; ?>"><span class="invalid-feedback"><?php echo $data['postcode_err']; ?></span>
          </div>

                 <div class="col-md-6 my-3">
                 <label for="city">City: <sup class="text-danger">*</sub></label> 
                 <input type="city" name="city" class="form-control <?php echo (!empty($data['city_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['city']; ?>">
            <span class="invalid-feedback"><?php echo $data['city_err']; ?></span>
          </div>

                 <div class="col-md-12 my-3">
                 <label for="password">Password: <sup class="text-danger">*</sub></label> 
                 <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>">
            <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
          </div>

                 <div class="col-md-12 my-3">
                 <label for="confirm_password">Confirm Password: <sup class="text-danger">*</sub></label> 
                 <input type="password" name="confirm_password" class="form-control form-control-lg <?php echo (!empty($data['confirm_password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['confirm_password']; ?>"><span class="invalid-feedback"><?php echo $data['confirm_password_err']; ?></span>
          </div>
                
                <div class="col-md-12">
                    <input type="submit" value="Register" class="btn btn-danger btn-lg btn-block">
                </div>
                <div class="col-md-12 text-center my-3">
                <a href="<?php echo URLROOT; ?>/customers/signin" >Have an account? Sign In</a>
                </div>
          </div>
        </form>
      </div>
    </div>
  </div>

    
    <?php require APPROOT . '/views/inc/footer.php'; ?>
