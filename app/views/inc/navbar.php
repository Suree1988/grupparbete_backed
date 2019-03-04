<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom border-danger shadow-sm mb-3">
  <a class="navbar-brand d-none d-md-block" href="<?php echo URLROOT; ?>"><i class="fas fa-boxes fa-2x d-inline-block align-top"></i></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo URLROOT; ?>">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo URLROOT; ?>/pages/contact">Contct Us</a>
      </li>
    </ul>
    <!-- Login och Register -->
    <ul class="navbar-nav ml-auto">
      <?php if(isset($_SESSION['customer_id'])) : ?>
      <li class="nav-item">
        <a class="nav-link font-weight-normal" href="<?php echo URLROOT; ?>/customers/signout">Sign Out</a>
      </li>
      <?php else : ?>
      <li class="nav-item">
        <a class="nav-link font-weight-normal" href="<?php echo URLROOT; ?>/customers/register">FREE Register with us!</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo URLROOT; ?>/customers/signin"><span class="mr-1">Sign In</span><i class="fas fa-sign-in-alt fa-w-16 fa-fw fa-lg"></i></a>
      </li>
  <?php endif; ?>
    </ul>
      </div>
  </nav>

