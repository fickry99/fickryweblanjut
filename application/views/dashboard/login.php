<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Dashio - Bootstrap Admin Template</title>

  <!-- Favicons -->
  <link href="<?php echo base_url('assets/') ?>img/favicon.png" rel="icon">
  <link href="<?php echo base_url('assets/') ?>img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url('assets/') ?>lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="<?php echo base_url('assets/') ?>lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="<?php echo base_url('assets/') ?>css/style.css" rel="stylesheet">
  <link href="<?php echo base_url('assets/') ?>css/style-responsive.css" rel="stylesheet">

  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>
  <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
  <div id="login-page">
    <div class="container">
      <?php echo form_open('auth/proses_login', array('method' => 'POST' )); ?>
        <h2 class="form-login-heading">LOGIN</h2>
        <div class="login-wrap">
          <input type="text" name="username" class="form-control" placeholder="User ID" autofocus>
          <small class="form-text text-danger"><?= form_error('username'); ?></small>
          <br>
          <input type="password" name="password" class="form-control" placeholder="Password">
          <small class="form-text text-danger"><?= form_error('password'); ?></small>
          <label class="checkbox">
            <input type="checkbox" value="remember-me"> Remember me
            <span class="pull-right">
            <a data-toggle="modal"> Forgot Password?</a>
            </span>
            </label>
          <button class="btn btn-theme btn-block" type="submit"><i class="fa fa-lock"></i> LOGIN</button>
          <?php echo form_close() ?>
        <!-- Modal -->
