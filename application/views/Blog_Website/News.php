<?php include 'Components/Header.php'; ?>

<main>
  

  
  <div class="container my-5">
    <h2 class="text-center mb-4" id="news">Latest News</h2>
    <div class="row row-cols-1 row-cols-md-3 g-4">
      <?php foreach ($news as $new): ?>
        <div class="col">
          <div class="card h-100">
            <img src="<?= base_url('uploads/news_images/' . $new['image']); ?>" class="card-img-top" alt="<?= $new['title']; ?>" style="object-fit: cover; height: 200px;">
            <div class="card-body">
              <h5 class="card-title"><?= $new['title']; ?></h5>
              <p class="card-text">
                <?php
                  
                  $firstLine = explode('.', $new['description']);
                  $firstLine = trim($firstLine[0]) ;
                  echo $firstLine;
                ?>
              </p>
            </div>
            <div class="card-footer">
              <a href="<?= site_url('news/view/' . $new['id']); ?>" class="btn btn-primary">Learn More</a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</main>

<?php include 'Components/Footer.php'; ?>
