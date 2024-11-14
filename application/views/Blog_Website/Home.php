<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bootstrap Single Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include 'Components/Header.php'; ?>

<main>
  <div class="container text-center my-5 img-container">
    <h1 class="mb-3">Welcome to Our Website!</h1>
    <p class="lead">Explore our latest blogs and stay updated with the latest news.</p>
    <div>
      <a href="Blogs" class="btn btn-primary m-2">Our Blogs</a>
      <a href="NewsArticles" class="btn btn-secondary m-2">News</a>
    </div>
  </div>

  <div class="container my-5">
    <h2 class="text-center mb-4" id="blogs">Our Blogs</h2>
    <div class="row row-cols-1 row-cols-md-3 g-4">
      <?php foreach ($users as $user): ?>
        <div class="col">
          <div class="card h-100 card-custom">
            <img src="<?= base_url('uploads/blog_images/' . $user['Image']); ?>" class="card-img-top" alt="<?= $user['Title']; ?>">
            <div class="card-body">
              <!-- Wrap only title and content in the anchor tag -->
              <a href="<?= base_url('Blog_website/Blog/View/' . $user['id']); ?>" class="text-decoration-none text-dark">
                <h5 class="card-title"><?= $user['Title']; ?></h5>
                <p class="card-text">
                  <?php
                    $firstLine = explode('.', strip_tags($user['Description']));
                    $firstLine = trim($firstLine[0]);
                    echo $firstLine;
                  ?>
                </p>
              </a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>

  <div class="container my-5">
    <h2 class="text-center mb-4" id="news">Latest News</h2>
    <div class="row row-cols-1 row-cols-md-3 g-4">
      <?php foreach ($news as $new): ?>
        <div class="col">
          <div class="card h-100 card-custom">
            <img src="<?= base_url('uploads/news_images/' . $new['image']); ?>" class="card-img-top" alt="<?= $new['title']; ?>">
            <div class="card-body">
              <!-- Wrap only title and content in the anchor tag -->
              <a href="<?= base_url('Blog_website/News/View/' . $new['id']); ?>" class="text-decoration-none text-dark">
                <h5 class="card-title"><?= $new['title']; ?></h5>
                <p class="card-text">
                  <?php
                    $firstLine = explode('.', strip_tags($new['description']));
                    $firstLine = trim($firstLine[0]);
                    echo $firstLine;
                  ?>
                </p>
              </a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</main>

<?php include 'Components/Footer.php'; ?>

<style>
  /* Main image container styling */
  .img-container {
    position: relative;
    background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), 
      url("https://images.unsplash.com/photo-1503694978374-8a2fa686963a?q=80&w=2069&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D");
    background-size: cover;
    background-position: center;
    padding: 70px 20px;
    margin: 0 !important;
    max-width: 100%;
    color: #f9f9f9;
    text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.6);
    border-radius: 8px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
  }

  /* Styling for the welcome heading */
  .img-container h1 {
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 20px;
    color: #fff;
    text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.8);
  }

  /* Buttons in the welcome section */
  .img-container .btn {
    padding: 10px 20px;
    border-radius: 50px;
    font-size: 1rem;
    background-color: rgba(255, 255, 255, 0.2);
    color: #fff;
    border: 1px solid #f9f9f9;
    transition: transform 0.3s ease, box-shadow 0.3s ease, background-color 0.3s ease;
  }

  .img-container .btn:hover {
    background-color: rgba(255, 255, 255, 0.3);
    transform: scale(1.05);
    box-shadow: 0 4px 10px rgba(255, 255, 255, 0.5);
  }

  /* Enhanced Card styling */
  .card-custom {
    border: none;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    background-color: #fff;
    transition: transform 0.3s ease, box-shadow 0.3s ease, background-color 0.3s ease;
    overflow: hidden;
  }

  .card-custom:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
  }

  /* Blog and News images */
  .card-img-top {
    object-fit: cover;
    height: 200px;
    border-top-left-radius: 8px;
    border-top-right-radius: 8px;
    transition: transform 0.3s ease;
  }

  .card-img-top:hover {
    transform: scale(1.1);
  }

  /* Card body text */
  .card-body h5 {
    font-size: 1.25rem;
    font-weight: 600;
    color: #333;
  }

  .card-body p {
    font-size: 0.9rem;
    color: #555;
    line-height: 1.5;
  }

  /* Section headings */
  h2 {
    font-weight: 700;
    color: #333;
  }

  /* Remove default underline for links */
  a {
    text-decoration: none;
  }

  
  .card-body h5:hover{
    color: #52adbf;
    transition: all 0.3s ease;
  }

  .card-body p:hover{
    color: #52adbf;
    transition: all 0.3s ease;
  }

  /* Responsive adjustments */
  @media (max-width: 768px) {
    .img-container h1 {
      font-size: 2rem;
    }
    .img-container .btn {
      font-size: 0.9rem;
    }
    .card-body h5 {
      font-size: 1.1rem;
    }
  }

  @media (max-width: 576px) {
    .img-container {
      padding: 50px 10px;
    }
    .img-container h1 {
      font-size: 1.75rem;
    }
  }
</style>

</body>
</html>
