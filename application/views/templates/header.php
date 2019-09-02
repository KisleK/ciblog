<html>
<head>
  <meta charset="UTF-8">
  <title>CodeIgniter Blog</title>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/4.3.1/lumen/bootstrap.css">

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css">
<script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>

</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="<?php echo base_url(); ?>">CI Blog</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url(); ?>">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>about">About Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>contacts/create">Contact Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>posts">Blog</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>categories">Categories</a>
      </li>
      

    </ul>
    <ul class="navbar-nav navbar-right">
      <?php if(!$this->session->userdata('logged_in')) : ?>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>users/login">Log In</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>users/register">Register</a>
    </li>
      <?php endif; ?>

      <?php if($this->session->userdata('logged_in')) : ?>
            <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>posts/create">Create Post</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>categories/create">Create Categories</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>users/logout">Log Out</a>
      </li>
    <?php endif; ?>
    </ul>

  </div>
</nav>


    <div class="container">
      <!-- Flash messages -->
      <?php if($this->session->flashdata('user_registered')): ?>
        <?php echo '<p class="alert alert-success flash-message">'.$this->session->flashdata('user_registered').'</p>'; ?>
      <?php endif; ?>

      <?php if($this->session->flashdata('post_created')): ?>
        <?php echo '<p class="alert alert-success flash-message">'.$this->session->flashdata('post_created').'</p>'; ?>
      <?php endif; ?>

       <?php if($this->session->flashdata('email_sent')): ?>
        <?php echo '<p class="alert alert-success flash-message">'.$this->session->flashdata('email_sent').'</p>'; ?>
      <?php endif; ?>

      <?php if($this->session->flashdata('post_updated')): ?>
        <?php echo '<p class="alert alert-success flash-message">'.$this->session->flashdata('post_updated').'</p>'; ?>
      <?php endif; ?>

      <?php if($this->session->flashdata('category_created')): ?>
        <?php echo '<p class="alert alert-success flash-message">'.$this->session->flashdata('category_created').'</p>'; ?>
      <?php endif; ?>

      <?php if($this->session->flashdata('post_deleted')): ?>
        <?php echo '<p class="alert alert-danger flash-message">'.$this->session->flashdata('post_deleted').'</p>'; ?>
      <?php endif; ?>

      <?php if($this->session->flashdata('login_failed')): ?>
        <?php echo '<p class="alert alert-danger flash-message">'.$this->session->flashdata('login_failed').'</p>'; ?>
      <?php endif; ?>

      <?php if($this->session->flashdata('user_loggedin')): ?>
        <?php echo '<p class="alert alert-success flash-message">'.$this->session->flashdata('user_loggedin').'</p>'; ?>
      <?php endif; ?>

       <?php if($this->session->flashdata('user_loggedout')): ?>
        <?php echo '<p class="alert alert-success flash-message">'.$this->session->flashdata('user_loggedout').'</p>'; ?>
      <?php endif; ?>

      <?php if($this->session->flashdata('category_deleted')): ?>
        <?php echo '<p class="alert alert-danger flash-message">'.$this->session->flashdata('category_deleted').'</p>'; ?>
      <?php endif; ?>
