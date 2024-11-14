<?php include 'Components/Header.php'; ?>

<main>
  <div class="container my-5">
    <h2 class="text-center mb-4" id="blogs">Our Blogs</h2>
    <div class="row row-cols-1 row-cols-md-3 g-4" id="blogs-container">
      <?php foreach ($users as $index => $user): ?>
        <div class="col featured" <?php if ($index >= 3) echo 'style="display: none;"'; ?>>
          <div class="card h-100 card-custom">
            <img src="<?= base_url('uploads/blog_images/' . $user['Image']); ?>" class="card-img-top" alt="<?= $user['Title']; ?>">
            <div class="card-body">
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
    <div class="text-center mt-4">
      <button id="load-more" class="btn btn-primary">Load More</button>
    </div>
  </div>
</main>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
  $(document).ready(function() {
      let itemsToShow = 3;
      let totalItems = $(".featured").length;

      $("#load-more").on("click", function(e) {
          e.preventDefault();

          $(".featured:hidden").slice(0, itemsToShow).slideDown();

          if ($(".featured:hidden").length === 0) {
              $("#load-more").text("No More Blogs").prop("disabled", true);
          }
      });
  });
</script>

<?php include 'Components/Footer.php'; ?>

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

  /* Main Container */
  main {
    width: 90%;
    max-width: 1100px;
    margin: 50px auto;
    padding: 20px;
  }

  /* Section Title */
  #blogs {
    font-size: 2rem;
    font-weight: 600;
    color: #111;
    margin-bottom: 20px;
  }

  /* Card Container */
  .card-custom {
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }

  .card-custom:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
  }

  /* Card Image */
  .card-img-top {
    object-fit: cover;
    height: 200px;
    border-top-left-radius: 12px;
    border-top-right-radius: 12px;
    transition: transform 0.3s ease;
  }

  .card-img-top:hover {
    transform: scale(1.1);
  }

  /* Card Body */
  .card-body {
    padding: 20px;
    background-color: #fff;
    border-bottom-left-radius: 12px;
    border-bottom-right-radius: 12px;
  }

  /* Title Styling */
  .card-title {
    font-size: 1.25rem;
    font-weight: 600;
    color: #333;
    margin-bottom: 15px;
    transition: color 0.3s ease;
  }

  /* Card Text */
  .card-text {
    font-size: 1rem;
    color: #555;
    line-height: 1.5;
    margin-bottom: 15px;
  }

  .card-body h5:hover {
    color: #52adbf;
    transition: all 0.3s ease;
  }

  .card-body p:hover {
    color: #52adbf;
    transition: all 0.3s ease;
  }

  /* Link Styling */
  a {
    text-decoration: none;
    color: inherit;
  }

  a:hover {
    color: inherit;
  }

  /* Responsive Design */
  @media (max-width: 768px) {
    .card-custom {
      margin-bottom: 20px;
    }

    .card-title {
      font-size: 1.1rem;
    }

    .card-text {
      font-size: 0.95rem;
    }
  }

  @media (max-width: 576px) {
    #blogs {
      font-size: 1.5rem;
    }

    .card-title {
      font-size: 1rem;
    }

    .card-text {
      font-size: 0.85rem;
    }
  }
</style>
