<?php include 'Components/Header.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<main>
  <div class="container my-3">
    <h2 class="text-center mb-4" id="news">Latest News</h2>
    <div class="row row-cols-1 row-cols-md-3 g-4" id="news-container">
      <?php foreach ($news as $index => $new): ?>
        <div class="col featured" <?php if ($index >= 3) echo 'style="display: none;"'; ?>>
          <div class="card h-100 card-custom">
            <img src="<?= base_url('uploads/news_images/' . $new['image']); ?>" class="card-img-top" alt="<?= $new['title']; ?>">
            <div class="card-body">
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
    <div class="text-center mt-4">
      <button id="load-more" class="btn btn-primary">Load More</button>
    </div>
  </div>
</main>

<script>
  $(document).ready(function() {
      let itemsToShow = 3;
      let totalItems = $(".featured").length;

      $("#load-more").on("click", function(e) {
          e.preventDefault();

          $(".featured:hidden").slice(0, itemsToShow).slideDown();

          if ($(".featured:hidden").length === 0) {
              $("#load-more").text("No More News").prop("disabled", true);
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
  background-color: #f0f2f5;
  color: #333;
  line-height: 1.7;
}

/* Main Container */
main {
  width: 90%;
  max-width: 1100px;
  margin: 10px auto;
  padding: 20px;
}

/* Section Title */
#news {
  font-size: 2.5rem;
  font-weight: 700;
  color: #2c3e50;
  margin-bottom: 40px;
  text-align: center;
  position: relative;
}

#news::after {
  content: '';
  display: block;
  width: 80px;
  height: 4px;
  background-color: #007bff;
  margin: 10px auto 0;
  border-radius: 2px;
}

/* Card Container */
.card-custom {
  border: none;
  border-radius: 15px;
  box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
  overflow: hidden;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  background-color: #fff;
}

.card-custom:hover {
  transform: translateY(-8px);
  box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
}

/* Card Image */
.card-img-top {
  object-fit: cover;
  height: 200px;
  transition: transform 0.3s ease;
}

.card-img-top:hover {
  transform: scale(1.05);
}

/* Card Body */
.card-body {
  padding: 20px;
  background-color: #ffffff;
  border-bottom-left-radius: 15px;
  border-bottom-right-radius: 15px;
}

/* Title Styling */
.card-title {
  font-size: 1.4rem;
  font-weight: 700;
  color: #333;
  margin-bottom: 10px;
  transition: color 0.3s ease;
}

.card-title:hover {
  color: #007bff;
}

/* Card Text */
.card-text {
  font-size: 1rem;
  color: #555;
  line-height: 1.6;
  margin-bottom: 15px;
}

.card-body h5:hover,
.card-body p:hover {
  color: #0056b3;
  transition: color 0.3s ease;
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
  .card-title {
    font-size: 1.2rem;
  }

  .card-text {
    font-size: 0.95rem;
  }
}

@media (max-width: 576px) {
  #news {
    font-size: 1.8rem;
  }

  .card-title {
    font-size: 1rem;
  }

  .card-text {
    font-size: 0.85rem;
  }
}

</style>
