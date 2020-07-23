<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Quik Proof</title>
	<link rel="stylesheet" type="text/css" href="assets/css/sandstone.css">	
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="control-panel?type=awaiting">User Manage</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="themes">Proofs <span class="caret"></span></a>
              <div class="dropdown-menu" aria-labelledby="themes">
                <a class="dropdown-item" href="#">Option 1</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Option 2</a>
                <a class="dropdown-item" href="#">Option 3</a>
                <a class="dropdown-item" href="#">Option 4</a>
              </div>
      </li>
      <li class="nav-item">
      	<a class="nav-link" href="myaccount">account</a>
      </li>
      <li class="nav-item">
      	<a class="nav-link" href="#">manage</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" action="control-panel/search">
      <input class="form-control mr-sm-2" type="text" placeholder="Search">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
  <?php if($this->session->flashdata('msg') != null) echo '<div class="w-100 text-center yellow-info-block">' . $this->session->flashdata('msg') . '</div>'; ?>
