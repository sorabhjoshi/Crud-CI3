<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Blog</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-qFJl9jyXm0yRB3Gr9Y+1cHiymQEZTsuRyqIBZKSzpHQePz5zN5BKnGXcfOHk7hsE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-LOt4VQSlD3xzq2mI5e1d7jO3LNN2DcEUXTM1q+TTnvgnPNwlQ4O8TZH7uj5Ip1Dj" crossorigin="anonymous"></script>

  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Teko:wght@300..700&display=swap" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="<?php echo base_url('Blog_website/Home')?>">
            <img src="<?= base_url('application/views/Blog_Website/Components/Includes/Joshi.png'); ?>" alt="Logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('Blog_website/Home')?>">Home</a>
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
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('Blog_website/Blogs')?>">Blogs</a>
                </li>
                <?php if (!empty($pages)): ?>
                    <?php foreach ($pages as $page): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('Blog_website/Page/'.$page['slug'])?>">
                                <?php echo htmlspecialchars($page['title']); ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                <?php else: ?>
                    <li class="nav-item">
                        <span class="nav-link">No pages available</span>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>




<style>
  a img {
    height: 50px;
    width: auto;
  }
  * {
    font-family: "Teko", sans-serif;
    font-optical-sizing: auto;
    font-weight: 500;
    font-style: normal;
    font-size: 18px;
  }
  .footer .list-styled {
    list-style: none;
    padding: 0;
    margin: 0;
    text-align: center; 
  }
  .footer .list-styled li {
    margin-bottom: 0.5rem; 
  }
  .footer .list-styled a {
    text-decoration: none;
    color: white;
  }
  .footer .list-styled a:hover {
    text-decoration: underline;
  }
</style>



