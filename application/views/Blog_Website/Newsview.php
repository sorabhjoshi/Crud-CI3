<?php
include 'Components/Header.php'; 

// Assuming $news is already fetched from the database
?>

<main>
  <div class="container my-5">
    <!-- Blog Title -->
    <h1 class="text-center mb-4"><?= htmlspecialchars($news['title']); ?></h1>

    <!-- Blog Image -->
    <div class="text-center">
      <?php if (!empty($news['image'])): ?>
        <img src="<?= base_url('uploads/news_images/' . $news['image']); ?>" class="img-fluid mb-4" alt="<?= htmlspecialchars($news['title']); ?>">
      <?php else: ?>
        <img src="default-image.jpg" class="img-fluid mb-4" alt="No Image Available">
      <?php endif; ?>
    </div>
    <div class="blog-details mr-auto">
      <p><strong>Author:</strong> <?= htmlspecialchars_decode($news['Author_name']); ?></p>
      <p><strong>Published on:</strong> <?= date('F j, Y', strtotime($news['Created_date'])); ?></p>
    </div>

    <!-- Blog Description -->
    <div class="blog-content mb-4">
      <p><?= nl2br(htmlspecialchars_decode($news['description'])); ?></p>
    </div>

    <!-- Blog Details -->
    
    <!-- Optional: Add a 'Back to Blog List' button -->
    <div class="text-center">
      <a href="<?php echo base_url('Blog_website/NewsArticles')?>" class="btn btn-primary mt-4">Back to News</a>
    </div>
  </div>
</main>
<style>
  /* Global Styles */
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }

  body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f5f5f5;
    color: #333;
    line-height: 1.7;
  }

  /* Container to center content */
  main {
    width: 90%;
    max-width: 900px;
    margin: 50px auto;
    padding: 20px;
    background: #fff;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    border-radius: 12px;
  }

  /* Blog Title */
  h1 {
    font-size: 2.8rem;
    font-weight: 600;
    color: #111;
    text-align: center;
    margin-bottom: 20px;
    line-height: 1.4;
    text-transform: capitalize;
  }

  /* Blog Image Styling */
  .blog-image {
    width: 100%;
    height: auto;
    border-radius: 12px;
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
    object-fit: cover;
  }

  /* Blog Content */
  .blog-content {
    font-size: 1.1rem;
    color: #555;
    line-height: 1.8;
    margin-top: 30px;
    text-align: justify;
  }

  /* Blog Details (Author, Date) */
  .blog-details {
    font-size: 1rem;
    color: #777;
    margin-top: 40px;
    text-align: left;
  }

  .blog-details strong {
    color: #333;
  }

  /* Back to Blog List Button */
  .btn-back {
    display: inline-block;
    padding: 10px 20px;
    background-color: #007bff;
    color: white;
    font-size: 1.1rem;
    font-weight: 600;
    text-align: center;
    border-radius: 30px;
    text-decoration: none;
    transition: background-color 0.3s ease, transform 0.3s ease;
    margin-top: 30px;
  }

  .btn-back:hover {
    background-color: #0056b3;
    transform: translateY(-2px);
  }

  /* Responsive Styling */
  @media (max-width: 768px) {
    h1 {
      font-size: 2.2rem;
    }

    .blog-content {
      font-size: 1rem;
    }

    .btn-back {
      font-size: 1rem;
      padding: 8px 16px;
    }
  }

  @media (max-width: 576px) {
    h1 {
      font-size: 1.8rem;
    }

    .blog-content {
      font-size: 0.95rem;
    }

    .btn-back {
      padding: 8px 14px;
    }
  }
</style>



<?php include 'Components/Footer.php'; ?>
