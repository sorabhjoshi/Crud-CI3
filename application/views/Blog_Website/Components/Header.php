<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bootstrap Single Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

  
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="#">MyWebsite</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?php echo base_url('Blog_website/Home')?>">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('Blog_website/AboutPage')?>">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('Blog_website/NewsArticles')?>">News</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('Blog_website/ContactUS')?>">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  