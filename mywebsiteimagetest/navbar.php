<?php
include 'include.php';?>
<html>
    <head>
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <script src="./css/js/bootstrap.min.js"></script>
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-danger">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <form class="d-flex" method="Post"action="search.php">
      
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search"required>
        <button class="btn btn-outline-light" type="submit" name="submit-search">Search</button>
      </form>
    </div>
    
  </div>
</nav>

