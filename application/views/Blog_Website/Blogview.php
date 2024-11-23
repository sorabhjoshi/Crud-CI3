<?php
include 'Components/Header.php';
?>
<div class="bread">
  <h3 style="text-self:right;">Blog Design</h3>
  <p><a href="<?php echo base_url('Blog_website/Home') ?>">Home</a> >> <a
      href="<?php echo base_url('Blog_website/Blogs') ?>">Blog Design</a> >> <a href="<?= base_url('Blog_website/Blog/' . $blog['category']); ?>" ><?= htmlspecialchars($blog['category']); ?></a>
    >> <a href="#"><?= htmlspecialchars($blog['Title']); ?></a></p>

</div>
<main>

  <div class="allcontainer">

    <div class="text-center">
      <?php if (!empty($blog['Image'])): ?>
        <img src="<?= base_url('uploads/blog_images/' . $blog['Image']); ?>" class="blog-image mb-4">
      <?php else: ?>
        <img src="default-image.jpg" class="blog-image mb-4" alt="No Image Available">
      <?php endif; ?>
    </div>
    <div class="container my-5">
      <div class="row">
        <div class="col-md-9">
          <h1 class="text-left mb-4"><?= htmlspecialchars($blog['Title']); ?></h1>
          <div class="blog-details">
            <p><strong>Author:</strong> <?= htmlspecialchars_decode($blog['Author_name']); ?></p>
            <p><strong>Published on:</strong> <?= date('F j, Y', strtotime($blog['Created_date'])); ?></p>
          </div>
          <div class="blog-content mb-4">
            <p class="drop-cap"><?= htmlspecialchars_decode($blog['Description']); ?></p>
          </div>
          <div class="text-center">
            <a href="<?php echo base_url('Blog_website/Blogs') ?>" class="btn-back mt-4">Back to Blogs</a>
          </div>
        </div>
        <div class="col-md-3">
          <img class="img" src="https://colorlib.com/wp/wp-content/uploads/sites/2/colorlib-custom-web-design.png.avif"
            alt="">
          <div class="socialtags">
            <h4>Follow Us</h4>
            <ul class="list-unstyled">
              <li><a href="#" aria-label="Follow us on Facebook"><i class="fab fa-facebook-f"></i></a></li>
              <li><a href="#" aria-label="Follow us on Twitter"><i class="fab fa-twitter"></i></a></li>
              <li><a href="#" aria-label="Follow us on Instagram"><i class="fab fa-instagram"></i></a></li>
              <li><a href="#" aria-label="Follow us on LinkedIn"><i class="fab fa-linkedin-in"></i></a></li>
              <li><a href="#" aria-label="Follow us on YouTube"><i class="fab fa-youtube"></i></a></li>
            </ul>
            <ul class="list">
              <?php foreach ($blogdata as $blog): ?>
                <li class="li-container">
                  <img src="<?= base_url('uploads/blog_images/' . $blog['Image']); ?>" loading="lazy"
                    class="card-img-top">
                  <a href="<?= base_url('Blog_website/Blog/View/' . $blog['id']); ?>">
                    <h5 class="card-title"><?= $blog['Title']; ?></h5>
                  </a>
                </li>
              <?php endforeach; ?>
            </ul>
          </div>
        </div>
      </div>

    </div>
  </div>
</main>

<style>
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }
  .bread a {
  color: black; 
  text-decoration: none; 
  font-weight: 600; 
  transition: color 0.3s ease; 
}

.bread a:hover {
  color: #282aa7; 
}
  body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f3f4f6;
    color: #333;
    line-height: 1.7;
  }

  main {
    display: flex;
    justify-content: center;
    align-items: center;
    background: #ffffff;
  }

  h1 {
    font-size: 2.5rem;
    font-weight: 700;
    color: #1e293b;
    margin-bottom: 25px;
    text-transform: capitalize;
  }

  .allcontainer {
    width: 90%;
  }

  .blog-image {
    width: 90%;
    margin-top: 40px;
    height: auto;
    border-radius: 12px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
    object-fit: cover;
  }

  .blog-details {
    font-size: 1rem;
    color: #475569;
    border-left: 3px solid #4f46e5;
    padding-left: 10px;
    margin-top: 25px;
  }

  .blog-details strong {
    color: #1e293b;
  }

  .blog-content {
    font-size: 1.15rem;
    color: #374151;
    line-height: 1.8;
    margin-top: 30px;
    text-align: justify;
    font-weight: 300;
  }

  .blog-content p {
    margin-bottom: 15px;
  }

  .drop-cap::first-letter {
    font-size: 3rem;
    font-weight: 700;
    color: #4f46e5;
    float: left;
    line-height: 1;
    margin-right: 10px;
  }

  .btn-back {
    display: inline-block;
    padding: 10px 30px;
    background-color: #6366f1;
    color: white;
    font-size: 1.1rem;
    font-weight: 600;
    border-radius: 25px;
    text-decoration: none;
    transition: background-color 0.3s ease, transform 0.3s ease;
    margin-top: 30px;
  }

  .btn-back:hover {
    background-color: #4f46e5;
    transform: translateY(-2px);
  }

  .img {
    height: 280px;
    width: 100%;
    margin: 0 auto;
  }

  .socialtags {
    padding: 20px 0;
  }

  .list-unstyled {
    display: flex;
    flex-direction: row;
    margin-bottom: 20px;
  }

  ul li a {
    font-size: 1.25rem;
    color: #333;
    text-decoration: none;
    margin-right: 10px;
  }

  ul li a:hover {
    color: #52adbf;
  }

  .card-title:hover {
    color: #52adbf;
  }


  ul li a i {
    margin-right: 10px;
  }

  .list {
    width: 100%;
    margin: 0;
    padding: 0;
  }

  .li-container {
    display: flex;
    align-items: center;
    text-align: left;
    width: 100%;
    border-top: 0.5px solid #e9e5e5;
    padding: 10px 0;
  }

  .li-container img {
    height: 50px;
    width: 50px;
    object-fit: cover;
    border-radius: 5px;
    margin-right: 10px;
  }

  .li-container h5 {
    font-size: 1rem;
    margin: 0;
    color: #333;
  }

  @media (max-width: 768px) {
    h1 {
      font-size: 2rem;
    }

    .blog-content {
      font-size: 1rem;
    }

    .btn-back {
      font-size: 1rem;
      padding: 8px 20px;
    }

    .col-md-3 {
      margin-top: 20px;
    }
  }

  @media (max-width: 576px) {
    h1 {
      font-size: 1.6rem;
    }

    .blog-content {
      font-size: 0.95rem;
    }

    .btn-back {
      padding: 8px 16px;
    }
  }

  .bread {
    width: 100%;
    background-color: #eeeeee;
    padding: 15px 120px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    cursor: pointer;
  }

  .bread h3 {
    margin: 0;
    text-align: left;
  }

  .bread p {
    margin: 0;
    text-align: right;
  }
</style>

<?php include 'Components/Footer.php'; ?>